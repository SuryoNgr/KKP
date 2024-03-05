<?php
include 'koneksi.php';

if ($koneksi->connect_error) {
    error_log("Koneksi gagal: " . $koneksi->connect_error);
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $norek = $_POST['norek'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $jumlah_tamu = $_POST['jumlah_tamu'];
    $jumlah_kamar = $_POST['jumlah_kamar'];
    $type_room = $_POST['type'];

    // Hitung total harga keseluruhan
    $total_harga_keseluruhan = 0;
    $rincian_kamar = "";
    for ($i = 0; $i < $jumlah_kamar; $i++) {
        // Ambil tipe kamar untuk kamar ke-$i
        $type = $type_room[$i];

        $sql_room = "SELECT id_room, harga_room FROM room WHERE tipe_room = '$type' AND status = 'Available'";
        $result_room = $koneksi->query($sql_room);

        if ($result_room && $result_room->num_rows > 0) {
            $row_room = $result_room->fetch_assoc();
            $id_room = $row_room['id_room'];
            $harga_kamar = $row_room['harga_room'];

            // Menghitung selisih hari antara check-in dan check-out
            $selisih_hari = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);

            // Menghitung harga total dengan mengalikan harga kamar dengan selisih hari
            $harga_total = $harga_kamar * $selisih_hari;

            // Tambahkan harga kamar ke total harga keseluruhan
            $total_harga_keseluruhan += $harga_total;

            // Insert data ke tabel payment
            $sql_insert_payment = "INSERT INTO payment (id_room, nama_pl, email_pl, notelp_pl, norek_pl, checkin, checkout, jumlah_tamu, harga_total) VALUES ('$id_room', '$nama', '$email', '$notelp', '$norek', '$checkin', '$checkout', '$jumlah_tamu', '$harga_total')";

            if ($koneksi->query($sql_insert_payment) === TRUE) {
                // Update status kamar menjadi 'Booked'
                $sql_update_status = "UPDATE room SET status = 'Booked' WHERE id_room = '$id_room'";
                if ($koneksi->query($sql_update_status) === false) {
                    $error_message = "Error updating room status: " . $koneksi->error;
                    error_log($error_message);
                    echo $error_message;
                }

                // Tambahkan rincian kamar ke nota
                $rincian_kamar .= "Kamar " . ($i+1) . ": " . $type . " - Rp." . number_format($harga_total) . "<br>";
            } else {
                $error_message = "Error: " . $sql_insert_payment . "<br>" . $koneksi->error;
                error_log($error_message);
                echo $error_message;
            }
        } else {
            $error_message = "Tipe kamar tidak valid atau tidak tersedia.";
            error_log($error_message);
            echo $error_message;
        }

        // Reset result set untuk query selanjutnya
        $result_room->free();
    }

    // Insert data ke tabel pelanggan
    $sql_insert_customer = "INSERT INTO pelanggan (norek_pl, nama_pl, harga_keseluruhan) VALUES ('$norek', '$nama', '$total_harga_keseluruhan')";

    if ($koneksi->query($sql_insert_customer) === TRUE) {
        // Menampilkan rincian dan tombol print serta tombol home
        echo "
        <div style='background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin: 0 auto; max-width: 600px;'>
            <h2 style='text-align: center; color: #333;'>Nota Pemesanan</h2>
            <div style='margin-bottom: 20px;'>
                <p>Nama: $nama</p>
                <p>Email: $email</p>
                <p>Nomor Telepon: $notelp</p>
                <p>Nomor Rekening: $norek</p>
                <p>Check-in: $checkin</p>
                <p>Check-out: $checkout</p>
                <p>Jumlah Tamu: $jumlah_tamu</p>
                <p>Jumlah Kamar: $jumlah_kamar</p>
                <p>Rincian Kamar: <br>$rincian_kamar</p>
                <p>Total Harga: Rp." . number_format($total_harga_keseluruhan) . "</p>
            </div>
            <div style='text-align: center;'>
                <!-- Tombol untuk print nota -->
                <button style='background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px;' onclick='window.print()'>Cetak</button>
                <!-- Tombol untuk kembali ke halaman utama -->
                <button style='background-color: #f44336; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px;' onclick='window.location.href=\"index.php\"'>Home</button>
            </div>
        </div>
        ";
    } else {
        $error_message = "Error: " . $sql_insert_customer . "<br>" . $koneksi->error;
        error_log($error_message);
        echo $error_message;
    }
} else {
    echo "Permintaan tidak valid.";
}

$koneksi->close();
?>
