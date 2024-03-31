<?php require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();

       
  if($_SESSION['level']==""){
    header("location:../login.php?pesan=gagal");
  } 
    } 

//search
$filter = "";
if(isset($_POST['search_btn'])) {
    $search_input = $_POST['search_input'];
    $search_condition = "WHERE norek_pl LIKE '%$search_input%' OR nama_pl LIKE '%$search_input%'";
    if(empty($filter)) {
        $filter = $search_condition;
    } else {
        $filter .= " AND " . $search_condition;
    }
}


$sql = "SELECT * FROM payment $filter ORDER BY checkin ASC";
$result = $koneksi->query($sql);

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="referrer" content="no-referrer">
        <title>XYZ Hotel</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/images/icon/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
         <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        
         

    </head>
    <body class="d-flex flex-column min-vh-100" style="height: 100%">
       <?php include 'navbar.php' ?>


<section>
     <form method="post">
        <button class="btn-sm btn-outline float-right" type="submit" name="search_btn">Search</button>
        <input class="form-control-sm float-right" type="search" name="search_input" placeholder="Search" aria-label="Search">
    </form>
    <center>
    <h1>Laporan Pemesanan</h1>

    <table>
        <tr>
            <th>Nomor Telephone</th>
            <th>Nama</th>
            <th>Nomor Rekening</th>
            <th>Email</th>
            <th>CheckIn</th>
            <th>CheckOut</th>
            <th>Nomor Ruangan</th>
            <th>Total Bayaran</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['notelp_pl'] . "</td>";
                echo "<td>" . $row['nama_pl'] . "</td>";
                echo "<td>" . $row['norek_pl'] . "</td>";
                echo "<td>" . $row['email_pl'] . "</td>";
                echo "<td>" . $row['checkin'] . "</td>";
                echo "<td>" . $row['checkout'] . "</td>";
                echo "<td>" . $row['id_room'] . "</td>";
                echo "<td>" . $row['harga_total'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        $koneksi->close();
        ?>
    </table>
   
    </center>
    <div style="padding: 20px">
         <button class="btn btn-outline" onclick="printExternalPage()"><i class="fa-solid fa-print custom-icon"></i></button>
    </div>
</section>
      







        <!-- Footer-->
<footer class="foot">
<div class="footer-bottom">
            <p>&copy; 2024 XYZ Hotel. All rights reserved.</p>
          </div>
</footer>
        <!-- Bootstrap core JS-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.sticky.js"></script>
        <script src="../assets/js/main2.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
        <script>
    function printExternalPage() {
        const url = 'print_lapor.php';
        const externalWindow = window.open(url, '_blank');
        externalWindow.onload = function() {
            externalWindow.print();
        };
    }
</script>

    </body>
</html>
