<?php
include '../koneksi.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $select_cart = mysqli_query($koneksi, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart!';
    } else {
        mysqli_query($koneksi, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '1')") or die('query failed');
        $message[] = 'product added to cart!';
    }
}

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($koneksi, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($koneksi, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($koneksi, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MASTER KOMPUTER -- Keranjang</title>
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
    <style>
        .product-image {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100" style="height: 100%">
   <?php include 'navbarUSER.php' ?>

    <!-- Page Content-->
    <div class="container-fluid flex-grow-1">
        <center>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="mt-4">Keranjang Belanja</h3>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cart_query = mysqli_query($koneksi, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                        $grand_total = 0;
                        if (mysqli_num_rows($cart_query) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                                $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
                                $grand_total += $sub_total;
                        ?>
                                <tr>
                                    <td><img src="../images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>

                                    <td><?php echo $fetch_cart['name']; ?></td>
                                    <td>Rp <?php echo number_format($fetch_cart['price']); ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" class="form-control">
                                            <button type="submit" name="update_cart" class="btn btn-primary mt-2">Update</button>
                                        </form>
                                    </td>
                                    <td>Rp <?php echo $sub_total; ?></td>
                                    <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Remove item from cart?');"><i class="fa fa-trash-alt"></i></a>
                                   </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No items added</td></tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="table-bottom">
                            <td colspan="4">Grand Total:</td>
                            <td>Rp <?php echo number_format ($grand_total); ?></td>
                            <td><a href="cart.php?delete_all" onclick="return confirm('Delete all items from cart?');" class="btn btn-outline-danger <?php echo number_format($grand_total > 0) ? '' : 'disabled'; ?>">Delete All</a>
                                <a href="payment.php" class="btn btn-outline-primary <?php echo number_format($grand_total > 0) ? '' : 'disabled'; ?>">Proceed to Payment</a>
                           </td>
                        </tr>
                    </tfoot>
                </table>
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
