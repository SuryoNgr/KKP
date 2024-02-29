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
    $jmlorg = $_POST['jumlah_tamu'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $type_room = $_POST['type'];

    $sql_room = "SELECT id_room, harga_room FROM room WHERE tipe_room = '$type_room' AND status = 'Available'";
    $result_room = $koneksi->query($sql_room);

    if ($result_room && $result_room->num_rows > 0) {
        $row_room = $result_room->fetch_assoc();
        $id_room = $row_room['id_room'];
        $harga_kamar = $row_room['harga_room'];

        $sql_insert_payment = "INSERT INTO payment (id_room, nama_pl, email_pl, notelp_pl, norek_pl, checkin, checkout, jumlah_tamu, harga_total) VALUES ('$id_room', '$nama', '$email', '$notelp', '$norek', '$checkin', '$checkout', '$jmlorg', '$harga_kamar')";

        if ($koneksi->query($sql_insert_payment) === TRUE) {
            echo "Pemesanan berhasil. Total harga: $" . $harga_kamar;

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
        var_dump($_POST);
        error_log($error_message);
        echo $error_message;
    }

    $result_room->close();
} else {
    echo "Permintaan tidak valid.";
}

$koneksi->close();
?>
