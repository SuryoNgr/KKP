<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit;
}


include '../koneksi.php';
$user_id = $_SESSION['user_id'];

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
}


$user_query = mysqli_query($koneksi, "SELECT * FROM `login` WHERE id_user = '$user_id'") or die('query failed');
$user_data = mysqli_fetch_assoc($user_query);

$payment_query = mysqli_query($koneksi, "SELECT p.payment_date, p.amount, l.nama FROM login l JOIN payments p  ON  l.id_user = p.id_user" ) or die('query failed: ' . mysqli_error($koneksi));

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MASTER KOMPUTER</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/images/icon/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
         <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/ADMmain.css" rel="stylesheet" />
        <head>

    <style>
        section {
            margin-top: 20px;
        }

        h3 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>


    </head>
    <body class="d-flex flex-column min-vh-100" style="height: 100%">
        <?php include 'navbarADM.php' ?>
        
  <section>
    <center>
    <h3>Riwayat Transaksi:</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($payment_query)) {
                ?>
                <tr>
                    <td><?php echo $row['nama']; ?></td>                
                    <td><?php echo $row['payment_date']; ?></td>

                    <td>Rp.<?php echo number_format($row['amount'])  ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </center>
</section>


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




        <!-- Footer-->
<footer class="py-5 bg-dark mt-auto">

        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;MasterKomputer</p>
        </div>
</footer>
        <!-- Bootstrap core JS-->
        <script type="text/javascript">
            function pindah() {
            window.location.href = "tmbh_brgADM.php";}
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.sticky.js"></script>
        <script src="../assets/js/main2.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>

</body>
</html>
