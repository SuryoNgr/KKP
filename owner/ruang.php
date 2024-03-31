<?php
require_once("../koneksi.php");
if (!isset($_SESSION)) {
    session_start();
    if ($_SESSION['level'] == "") {
        header("location:../login.php?pesan=gagal");
    }
}

$filter = "";

if (isset($_SESSION['room_filter'])) {
    $filter = $_SESSION['room_filter'];
}

$search_input = "";

if(isset($_POST['search_btn'])) {
    $search_input = $_POST['search_input'];
    $search_condition = "WHERE id_room LIKE '%$search_input%' OR tipe_room LIKE '%$search_input%' OR harga_room LIKE '%$search_input%'";
    if(empty($filter)) {
        $filter = $search_condition;
    } else {
        $filter .= " AND " . $search_condition;
    }
}

if(isset($_POST['reset_filter'])) {
    unset($_SESSION['room_filter']);
    $filter = "";
}

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
    
</head>
<body>
<?php include 'navbar.php' ?>
    <h2>Room Data</h2>

    <button class="btn btn-outline" onclick="window.location.href='add_room.php'">Add Room</button>
    <button class="btn btn-outline" onclick="togglePopup()">Filter</button>
        
    <form method="post">
        <button class="btn-sm btn-outline float-right" type="submit" name="search_btn">Search</button>
        <input class="form-control-sm float-right" type="search" name="search_input" placeholder="Search" aria-label="Search">
    </form>

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
        <p>&copy; 2024 XYZ Hotel. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
