<?php
include '../koneksi.php';
session_start();
if (isset($_SESSION['id_user'])) {
    $user_id = $_SESSION['id_user'];
}

if ($_SESSION['level'] == "") {
    header("location:../login.php?pesan=gagal");
    exit;
}

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:../login.php');
    exit;
}


if (isset($_GET['delete_cart'])) {
    $delete_query = mysqli_query($koneksi, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('Query failed: ' . mysqli_error($koneksi));

}
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MASTER KOMPUTER -- Pembayaran Berhasil</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/images/icon/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
   <link href="../assets/css/ADMmain.css" rel="stylesheet" />
    <link href="../assets/css/detail.css" rel="stylesheet" />
    <link href="../assets/css/success.css" rel="stylesheet" />
    

</head>

<body class="d-flex flex-column min-vh-100" style="height: 100%">
  <?php include 'navbarUSER.php' ?>
<section class="py-5">
    </div>
        <div class="payment-success">
            <div class="print-btn-container" >
            <form  action="print.php" method="post">
                <button type="submit" name="delete_cart" value="1" class="btn btn-outline-primary print-btn" target="_blank"><i class="fa fa-print"></i></button>
            </form>
            </div>
            <center>

            <h2>Payment Successful!</h2>
            <p>Thank you for your payment.</p>
            <p>Your payment has been processed successfully.</p>
            <a href="halaman_user.php" class="btn btn-success back-btn">Kembali Ke Halaman Utama</a>
           </center>
        </div>
</section>
         <!-- Footer-->
   <footer class="bg-dark py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">MASTER KOMPUTER &copy; 2023</div>
        </div>
    </footer>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Tekan "Logout" dibawah  jika kamu yakin ingin keluar dari akun.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.sticky.js"></script>
        <script src="../assets/js/main2.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
        <script>
      
    </script>

    </body>

    </html>
