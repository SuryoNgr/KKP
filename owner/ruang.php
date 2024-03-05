<?php
require_once("../koneksi.php");
if (!isset($_SESSION)) {
    session_start();
    if ($_SESSION['level'] == "") {
        header("location:../login.php?pesan=gagal");
    }
}

// Inisialisasi variabel filter
$filter = "";
// Periksa apakah filter disimpan dalam session
if (isset($_SESSION['room_filter'])) {
    $filter = $_SESSION['room_filter'];
}

if(isset($_POST['apply_filter'])) {
    $selected_type = $_POST['room_type']; // Mengambil nilai yang benar dari dropdown
    if ($selected_type != "all") {
        $filter = "WHERE tipe_room = '$selected_type'";
        // Simpan filter dalam session
        $_SESSION['room_filter'] = $filter;
    } else {
        // Jika opsi "all" dipilih, hapus filter dari session
        unset($_SESSION['room_filter']);
    }
}

// Check if the "Reset Filter" button is clicked
if(isset($_POST['reset_filter'])) {
    // Hapus filter dari session
    unset($_SESSION['room_filter']);
    // Set filter ke string kosong
    $filter = "";
}

// Menyusun kueri SQL dengan filter yang disimpan dalam session
$sql = "SELECT * FROM room $filter ORDER BY harga_room ASC, id_room ASC";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Data</title>
    
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
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
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            padding: 20px;
            z-index: 9999;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php' ?>
    <h2>Room Data</h2>

    <button onclick="window.location.href='add_room.php'">Add Room</button>
    <button class="fa fa-filter" onclick="togglePopup()">Filter</button>

    <!-- Pop up -->
    <div id="popup" class="popup">
        <form method="post">
            <div class="dropdown">
                <label for="room-type">Room Type:</label>
                <select id="room-type" name="room_type">
                    <option value="all">All</option>
                    <option value="basic">Basic</option>
                    <option value="daily">Daily</option>
                    <option value="panoramic">Panoramic</option>
                    <option value="exclusive">Exclusive</option>
                    <option value="honey">Honey</option>
                </select>
            </div>
            <button type="submit" name="apply_filter">Apply Filter</button>
            <button type="submit" name="reset_filter">Reset Filter</button>
            <button type="button" onclick="togglePopup()">Close</button>
        </form>
    </div>

    <table>
        <tr>
            <th>Room Number</th>
            <th>Room Type</th>
            <th>Price/Night</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_room"] . "</td>";
                echo "<td>" . $row["tipe_room"] . "</td>";
                echo "<td>" . $row["harga_room"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td><a href='ubah_status.php?id=" . $row["id_room"] . "' class='status-change-link'>Change Status</a></td>";
                echo "<td>
                        <form method='post'> <input type='hidden' name='hapus_id' value='" . $row["id_room"] . "'>
                        <button type='submit' name='hapus_btn'>Delete</button>
                        </form> 
                     </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No rooms found</td></tr>";
        }
        $koneksi->close();
        ?>
    </table>
    

    <script src="../js/owner.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var statusChangeLinks = document.querySelectorAll('.status-change-link');
    statusChangeLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm("Are you sure you want to change the status of this room?")) {
                window.location.href = event.target.href;
            }
        });
    });
});
</script>

<footer class="foot">
<div class="footer-bottom">
            <p>&copy; 2023 Your Company. All rights reserved.</p>
          </div>
</footer>
</body>
</html>
