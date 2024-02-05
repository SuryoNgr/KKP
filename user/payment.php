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

$cart_query = mysqli_query($koneksi, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
$grand_total = 0;


if (mysqli_num_rows($cart_query) === 0) {
    header('location: cart.php');
    exit;
}


while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
    $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
    $grand_total += $sub_total;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    date_default_timezone_set('Asia/Jakarta');

    $payment_date = date('Y-m-d H:i:s');
    $insert_payment = mysqli_query($koneksi, "INSERT INTO `payments` (id_user, payment_date, amount) VALUES ('$user_id', '$payment_date', '$grand_total')");

    if ($insert_payment && mysqli_affected_rows($koneksi) > 0) {
      
        
        header('location: payment_success.php');
        exit;
    } else {
        die('Insert payment failed');
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
    <title>MASTER KOMPUTER -- Pembayaran</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/images/icon/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
   <link href="../assets/css/ADMmain.css" rel="stylesheet" />
    <link href="../assets/css/detail.css" rel="stylesheet" />
    <link href="../assets/css/cart.css" rel="stylesheet" />
    

</head>

<body class="d-flex flex-column min-vh-100" style="height: 100%">
  <?php include 'navbarUSER.php' ?>

    <!-- Page Content-->
    <div class="container-fluid flex-grow-1">
        <center><h3 class="mt-4">Pembayaran</h3>
        <hr></center>
            <div class="user-info">
                <table  class="table">
                    <tbody>
                        <tr>
                            <td style="border-bottom: none; width: 10%"><strong>Nama</strong></td>
                            <td style="border-bottom: none;">: <?php echo $user_data['nama']; ?></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: none; width: 10%"><strong>Nomor Telepon</strong></td>
                            <td style="border-bottom: none;">: <?php echo $user_data['no_telp']; ?></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: none; width: 10%"><strong>Alamat</strong></td>
                            <td style="border-bottom: none;">: <?php echo $user_data['alamat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>


        <center>
            <div class="row">
                <div class="col-lg-12">
                    
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            mysqli_data_seek($cart_query, 0); // Reset the pointer to the beginning of the result set
                            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                                $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
                            ?>
                                <tr>
                                    <td>
                                        <img src="../image/<?php echo $fetch_cart['image']; ?>" alt="Product Image" width="100">
                                    </td>
                                    <td><?php echo $fetch_cart['name']; ?></td>
                                    <td>Rp <?php echo number_format($fetch_cart['price']); ?></td>
                                    <td><?php echo $fetch_cart['quantity']; ?></td>
                                    <td>Rp <?php echo number_format($sub_total); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Grand Total:</td>
                                <td>Rp <?php echo number_format($grand_total); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <form method="POST" action="">
                        <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                    </form>
                    
                </div>
            </div>
        </center>
    </div>

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
   <footer class="bg-dark py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">MASTER KOMPUTER &copy; 2023</div>
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

   
</body>

</html>
