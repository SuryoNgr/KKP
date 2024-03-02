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
        echo "Data pelanggan berhasil ditambahkan.";
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
