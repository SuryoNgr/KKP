<?php require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();

       
  if($_SESSION['level']==""){
    header("location:../login.php?pesan=gagal");
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
            <th rowspan="1">Action</th> 
        </tr>
        <?php
    
        $sql = "SELECT * FROM room";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_room"] . "</td>";
                echo "<td>" . $row["tipe_room"] . "</td>";
                echo "<td>" . $row["harga_room"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td><a href='ubah_status.php?id=" . $row["id_room"] . "'>Ubah Status</a></td>"; 
                 echo "<td><form method='post'><input type='hidden' name='hapus_id' value='" . $row["id_room"] . "'><button type='submit'>Hapus</button></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No rooms found</td></tr>";
        }
        $koneksi->close();
        ?>
    </table>
</body>
</html>
