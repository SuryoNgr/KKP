   <?php require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
       
  if($_SESSION['level']==""){
    header("location:../login.php?pesan=gagal");
  } 
    } ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MASTER KOMPUTER</title>
     
        <link rel="icon" type="image/x-icon" href="../assets/images/icon/favicon.ico" />
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
       
         <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/ADMmain.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column min-vh-100" style="height: 100%">
        <?php include 'navbarADM.php' ?>

<h1 align="center">Update Barang</h1>

<?php
  include '../koneksi.php';

  $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk ='$_GET[id]'");
  $data  = mysqli_fetch_array($query);
    ?>

<form  action="proses_updtADM.php" method="POST" enctype="multipart/form-data">
<div class=" container-md" style=" padding-top: 15px " align="center">
<div class="col-6 mb-3" align="left">
  <input type="hidden" class="form-control" id="formGroupExampleInput" name="idbrg" value="<?php echo $data['id_produk']; ?>" >
</div>

<div class="col-6 mb-3" align="left">
  <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
  <input type="text" class="form-control" id="formGroupExampleInput" name="nmbrg" value="<?php echo $data['nama']; ?>">
</div>

<div class="col-6 mb-3" align="left">
  <label for="formGroupExampleInput" class="form-label">Deskripsi</label>
  <textarea type="text" class="form-control" id="formGroupExampleInput" name="deskripsi"> <?php echo $data['deskripsi']; ?> </textarea>
</div>

<div class="col-6 mb-3" align="left">
  <label for="formGroupExampleInput" class="form-label">Stok</label>
  <input type="text" class="form-control" id="formGroupExampleInput" name="stock" value="<?php echo $data['stok']; ?>">
</div>

<div class="col-6 mb-3" align="left">
  <label for="formGroupExampleInput" class="form-label">Harga</label>
  <input type="text" class="form-control" id="formGroupExampleInput" name="hrgbrg" value="<?php echo $data['harga']; ?>">
</div>

<div class="col-6 mb-3" align="left">
  <label for="formFile" class="form-label">Gambar</label>
  <div><img src="<?php echo $data['gambar']; ?>" width="200" height="150"></div>
</div>

<div class="col-6 mb-3">
  <button type="submit" class="btn btn-outline-primary" name="edit" value="edit" >Update</button>
</div>

</div>
</form>
<footer class="py-5 bg-dark mt-auto">

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

        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Master Komputer</p>
        </div>
</footer>                

      
  </body>

</html>