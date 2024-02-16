<?php
include 'koneksi.php';

// Check database connection
if ($koneksi->connect_error) {
    // Log connection error
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
    $type_room = $_POST['type'];

    // Query to get room price based on room type
    $sql_room = "SELECT id_room, harga_room FROM room WHERE tipe_room = '$type_room' AND status = 'Available'";
    $result_room = $koneksi->query($sql_room);

    if ($result_room->num_rows > 0) {
        // If room data is available
        $row_room = $result_room->fetch_assoc();
        $id_room = $row_room['id_room'];
        $harga_kamar = $row_room['harga_room'];

        // Insert into 'payment' table
        $sql_insert_payment = "INSERT INTO payment (id_room, nama_pl, email_pl, notelp_pl, norek_pl, checkin, checkout, harga_total) VALUES ('$id_room', '$nama', '$email', '$notelp', '$norek', '$checkin', '$checkout', '$harga_kamar')";

        if ($koneksi->query($sql_insert_payment) === TRUE) {
            // If booking data is successfully inserted into 'payment' table
            echo "Pemesanan berhasil. Total harga: $" . $harga_kamar;
        } else {
            // If there's an error inserting booking data
            $error_message = "Error: " . $sql_insert_payment . "<br>" . $koneksi->error;
            // Log the error
            error_log($error_message);
            echo $error_message;
        }
    } else {
        // If room type is not found or not available
        $error_message = "Tipe kamar tidak valid atau tidak tersedia.";
        // Log the error
        error_log($error_message);
        echo $error_message;
    }

    // Close database connection
    $koneksi->close();
}
?>
