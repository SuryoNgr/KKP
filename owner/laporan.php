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
    <h1>Laporan Pemesanan</h1>
    <button class="btn btn-outline" onclick="printExternalPage()"><i class="fa-solid fa-print custom-icon"></i></button>

</section>
      







        <!-- Footer-->
<footer class="foot">
<div class="footer-bottom">
            <p>&copy; 2023 Your Company. All rights reserved.</p>
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
