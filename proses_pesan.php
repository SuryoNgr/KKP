<?php
include 'koneksi.php' ;

// Memproses data yang dikirim dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $notelp = $_POST["notelp"];
    $norek = $_POST["norek"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $jumlah_tamu = $_POST["jumlah_tamu"];
    $jumlah_kamar = $_POST["jumlah_kamar"];
    $tipe_kamar = $_POST["tipe_kamar"];

    // Menyiapkan query SQL untuk menyimpan data pelanggan
    $sql_pelanggan = "INSERT INTO pelanggan (norek_pl, nama_pl, harga_keseluruhan)
                      VALUES ('$norek', '$nama', 0)"; // Harga keseluruhan akan dihitung kemudian

    // Memasukkan data pelanggan ke dalam tabel pelanggan
    if ($conn->query($sql_pelanggan) === TRUE) {
        // Mendapatkan ID pelanggan yang baru saja dimasukkan
        $id_pelanggan = $conn->insert_id;

        // Menghitung harga keseluruhan berdasarkan jumlah kamar dan harga per kamar
        // Anda perlu menyesuaikan ini dengan logika perhitungan harga yang sesuai dengan bisnis Anda
        $sql_harga_keseluruhan = "SELECT harga_room FROM room WHERE tipe_room = '$tipe_kamar'";
        $result = $conn->query($sql_harga_keseluruhan);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $harga_per_kamar = $row["harga_room"];
            $harga_keseluruhan = $jumlah_kamar * $harga_per_kamar;

            // Menyimpan harga keseluruhan ke dalam tabel pelanggan
            $sql_update_harga = "UPDATE pelanggan SET harga_keseluruhan = '$harga_keseluruhan' WHERE norek_pl = '$norek'";
            $conn->query($sql_update_harga);
        }

        // Menyiapkan query SQL untuk menyimpan data pesanan
        $sql_payment = "INSERT INTO payment (nama_pl, notelp_pl, norek_pl, checkin, checkout, jumlah_tamu, tipe_room, harga_total, id_pelanggan)
                        VALUES ('$nama', '$notelp', '$norek', '$checkin', '$checkout', '$jumlah_tamu', '$tipe_kamar', '$harga_keseluruhan', '$id_pelanggan')";

        // Memasukkan data pesanan ke dalam tabel payment
        if ($conn->query($sql_payment) === TRUE) {
            echo "Pesanan Anda berhasil disimpan.";
        } else {
            echo "Error: " . $sql_payment . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_pelanggan . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>
