<?php

require_once("../koneksi.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $tipe_room = $_POST['tipe_kamar'];
    $harga_room = $_POST['harga_room'];
    $status = $_POST['status'];

    $prefix = '';
    switch ($tipe_room) {
        case 'Exclusive':
            $prefix = 'ER';
            break;
        case 'Basic':
            $prefix = 'BR';
            break;
        case 'Daily':
            $prefix = 'DR';
            break;
        case 'Panoramic':
            $prefix = 'PR';
            break;
        case 'Honey':
            $prefix = 'HR';
            break;
        default:
            $prefix = '';
            break;
    }

    // ambil ruangan yang sudah ada untuk tipe kamar yang dipilih
    $sql_room_count = "SELECT COUNT(*) AS room_count FROM room WHERE tipe_room = '$tipe_room'";
    $result_room_count = $koneksi->query($sql_room_count);
    $row_room_count = $result_room_count->fetch_assoc();
    $room_count = intval($row_room_count['room_count']);

    // Maksimum 5 ruangan/kamar 
    if ($room_count >= 5) {
        echo "Maaf, jumlah ruangan untuk tipe kamar ini sudah mencapai batas maksimal (5 ruangan).";
    } else {
        // ambil ID terakhir dari tabel room dengan tanda prefix yang sama
        $sql_last_id = "SELECT MAX(SUBSTRING(id_room, 3)) AS max_id FROM room WHERE id_room LIKE '$prefix%'";
        $result_last_id = $koneksi->query($sql_last_id);
        $row_last_id = $result_last_id->fetch_assoc();
        if ($result_last_id->num_rows > 0) {
            $last_id = intval($row_last_id['max_id']);
            $new_id = $prefix . str_pad(($last_id + 1), 3, '0', STR_PAD_LEFT);
        } else {
            
            $new_id = $prefix . '001';
        }

        // tambah ruangan baru dengan ID otomatis
        $sql_add_room = "INSERT INTO room (id_room, tipe_room, harga_room, status) VALUES ('$new_id', '$tipe_room', '$harga_room', '$status')";
        
        if ($koneksi->query($sql_add_room) === TRUE) {
            echo "New record created successfully";
            header("Location: ruang.php");
            exit();
        } else {
            echo "Error: " . $sql_add_room . "<br>" . $koneksi->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Blue Horizon</title>
</head>
<body>
     <a href="ruang.php">kembali</a><br>
    <h2>Add Room</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
       

        <label for="tipe_room">Room Type:</label>
        <select name="tipe_kamar" class="input" id="type_room">
               <option value="Exclusive">exclusive rooms</option>
               <option value="Basic">basic rooms</option>
               <option value="Daily">daily rooms</option>
               <option value="Panoramic">panoramic rooms</option>
               <option value="Honey">honey rooms</option>
        </select><br><br>

        <label for="harga_room">Price per Night:</label>
        <input type="number" id="harga_room" name="harga_room" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Available">Available</option>
            <option value="Booked">Booked</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
