<?php
// Include file koneksi.php
require_once("../koneksi.php");

// Mengecek apakah parameter ID ruangan telah diterima dari URL
if(isset($_GET['id'])) {
    // Mendapatkan ID ruangan dari parameter URL
    $id_room = $_GET['id'];

    // Mendapatkan data ruangan berdasarkan ID
    $sql_get_room = "SELECT * FROM room WHERE id_room = '$id_room'";
    $result_get_room = $koneksi->query($sql_get_room);

    // Mengecek apakah data ruangan ditemukan
    if ($result_get_room->num_rows > 0) {
        // Data ruangan ditemukan, maka ubah status ruangan
        $row = $result_get_room->fetch_assoc();
        $current_status = $row['status'];

        // Mengubah status ruangan menjadi berlawanan
        $new_status = ($current_status == 'Available') ? 'Booked' : 'Available';

        // Query untuk mengupdate status ruangan
        $sql_update_status = "UPDATE room SET status = '$new_status' WHERE id_room = '$id_room'";

        // Eksekusi query untuk mengupdate status ruangan
        if ($koneksi->query($sql_update_status) === TRUE) {
            echo "Status ruangan berhasil diubah menjadi: " . $new_status;
            // Kembali ke halaman ruang.php setelah pesan berhasil ditampilkan
            echo "<script>window.location.href = 'ruang.php';</script>";
        } else {
            echo "Error updating record: " . $koneksi->error;
        }
    } else {
        echo "Room not found";
    }
} else {
    echo "Room ID not specified";
}

// Menutup koneksi database
$koneksi->close();
?>
