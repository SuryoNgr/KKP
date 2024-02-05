<?php require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    
  if($_SESSION['level']==""){
    header("location:../login.php?pesan=gagal");
  } 
    } ?>
<!DOCTYPE html>
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
        <!-- Core theme CSS (includes Bootstrap)-->
         <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/ADMmain.css" rel="stylesheet" />
        <link href="../assets/css/detail.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column min-vh-100" style="height: 100%">
       <?php include 'navbarADM.php' ?>

        
        <div class="row justify-content-center mt-5">

            <div class="col-md-9">
                <?php 
                $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
                $data  = mysqli_fetch_array($query);
                ?>
                <div class="card bg-light">
                    <div >
                        <div class="col-md-4">
                        <img style="margin: 10px" src="<?php echo $data['gambar']; ?>" class="card-img-top product-image" alt="Product Image">
                        </div>
                        <div class="col-md-6 product-details">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['nama']; ?></h5>
                                <p class="card-text"><strong>Harga:</strong> Rp. <?php echo number_format($data['harga'], 2, ",", "."); ?></p>
                                <p class="card-text"><strong>Stock:</strong> 
                                    <?php 
                                    if ($data['stok'] >= 1) {
                                        echo '<b><span class="text-success">In Stock</span></b>';
                                    } else {
                                        echo '<b><span class="text-danger">Out Of Stock</span></b>';
                                    }
                                    ?>
                                </p>
                                <p class="card-text"><strong>Keterangan:</strong> <?php echo $data['deskripsi']; ?></p>
                                <a href="updateprodukADM.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-outline-primary">Update &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<footer class="py-5 bg-dark mt-auto">

        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Komputer</p>
        </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    </body>
      
    </html>