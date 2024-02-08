<?php
// Include file koneksi.php
require_once("../koneksi.php");

// Mengecek apakah ID ruangan dikirim melalui URL
if(isset($_GET['id'])) {
    // Mendapatkan ID ruangan yang akan dihapus
    $id_to_delete = $_GET['id'];

    // Query untuk menghapus ruangan berdasarkan ID
    $sql_delete_room = "DELETE FROM room WHERE id_room = '$id_to_delete'";

    // Eksekusi query
    if ($koneksi->query($sql_delete_room) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    // Mengarahkan kembali ke halaman ruang.php setelah penghapusan berhasil
    header("Location: ruang.php");
    exit();
} else {
    echo "Room ID not specified";
}

// Menutup koneksi database
$koneksi->close();
?>
