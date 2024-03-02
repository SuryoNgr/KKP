<?php

require_once("../koneksi.php");

if(isset($_GET['id'])) {
    
    $id_room = $_GET['id'];

    $sql_get_room = "SELECT * FROM room WHERE id_room = '$id_room'";
    $result_get_room = $koneksi->query($sql_get_room);

    if ($result_get_room->num_rows > 0) {
        $row = $result_get_room->fetch_assoc();
        $current_status = $row['status'];
        $new_status = ($current_status == 'Available') ? 'Booked' : 'Available';

        $sql_update_status = "UPDATE room SET status = '$new_status' WHERE id_room = '$id_room'";

        if ($koneksi->query($sql_update_status) === TRUE) {
            echo "Status ruangan berhasil diubah menjadi: " . $new_status;
            
            // Hapus data dari tabel payment yang terkait dengan id_room yang diubah statusnya
            $sql_delete_payment = "DELETE FROM payment WHERE id_room = '$id_room'";
            if ($koneksi->query($sql_delete_payment) === TRUE) {
                echo "Data dari tabel payment yang terkait dengan ruangan ini berhasil dihapus.";
            } else {
                echo "Error deleting payment data: " . $koneksi->error;
            }

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

$koneksi->close();
?>
