<?php

include '../koneksi.php';
session_start();
if (isset($_SESSION['id_user'])) {
    $user_id = $_SESSION['id_user'];
}

 if($_SESSION['level']==""){
    header("location:../login.php?pesan=gagal");
  } 

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login.php');
};

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
    <link href="../assets/css/cart.css" rel="stylesheet" />
    <link href="../assets/css/banner.css" rel="stylesheet" />
    
    
    


</head>

<body class="d-flex flex-column min-vh-100" style="height: 100%">
    <?php include 'navbarUSER.php' ?>

       <section class="py-3">
        <?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    
}
?>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5">
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $sql = mysqli_query($koneksi,"select * from produk where nama like '%".$cari."%'");
            }else{
            $sql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk ASC LIMIT 9");
            }
            $count = 0;
            while ($data = mysqli_fetch_assoc($sql)) {
            $count++;
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <form style="height: 390px" method="post" class="box" action="cart.php?action=add&id=<?php echo $data["id_produk"]; ?>">
                    <div class="card h-100">
                        <!-- Product image-->
                        <div class="card-img-container">
                            <img src="<?php echo $data['gambar']; ?>" class="card-img" alt="<?php echo $data['nama']; ?>">
                        </div>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <div class="title">
                                    <h5><?php echo $data['nama']; ?></h5>
                                </div>
                                
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="text-center">
                            <!-- Product price-->
                                <div>
                                    <h6>Rp.<?php echo number_format($data['harga']); ?></h6>
                                </div>
                            <input type="hidden" name="product_image" value="<?php echo $data['gambar']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo  $data['nama']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $data['harga']; ?>">
                            <div style="padding-bottom: 10px">
                            <button  type="submit" class="btn btn-outline-primary" name="add_to_cart"><i class="fas fa-shopping-cart"></i> Masukan Keranjang</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                    }
                
            
            ?>
        </div>
    </div>
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
