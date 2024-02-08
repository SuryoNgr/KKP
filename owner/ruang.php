<?php
require_once("../koneksi.php");
if (!isset($_SESSION)) {
    session_start();
    if ($_SESSION['level'] == "") {
        header("location:../login.php?pesan=gagal");
    }
}

if(isset($_POST['hapus_btn'])) {
    $hapus_id = $_POST['hapus_id'];
    // Lakukan proses penghapusan data dengan query DELETE sesuai dengan kebutuhan
    $sql_delete = "DELETE FROM room WHERE id_room = '$hapus_id'";
    if ($koneksi->query($sql_delete) === TRUE) {
        // Redirect back to the same page or any page you desire
        header("Location: ruang.php");
        exit();
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Room Data</h2>
    <button onclick="window.location.href='add_room.php'">Add Room</button>
    
    <table>
        <tr>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Harga/malam</th>
            <th>Status</th>
            <th colspan="2">Action</th> 
        </tr>
        <?php
        $sql = "SELECT * FROM room ORDER BY harga_room desc";
        $result = $koneksi->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_room"] . "</td>";
                echo "<td>" . $row["tipe_room"] . "</td>";
                echo "<td>" . $row["harga_room"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td><a href='ubah_status.php?id=" . $row["id_room"] . "'>Ubah Status</a></td>"; 
                echo "<td>
                        <form method='post'> <input type='hidden' name='hapus_id' value='" . $row["id_room"] . "'>
                        <button type='submit' name='hapus_btn'>Hapus</button>
                        </form> 
                     </td>";

            }
        } else {
            echo "<tr><td colspan='6'>No rooms found</td></tr>";
        }
        $koneksi->close();
        ?>
    </table>
</body>
</html>
