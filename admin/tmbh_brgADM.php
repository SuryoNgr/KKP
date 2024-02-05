<?php
require_once("../koneksi.php");
if (!isset($_SESSION)) {
    session_start();
   
    if($_SESSION['level']==""){
        header("location:../login.php?pesan=gagal");
    } 
} 

// Auto Number ID
include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM produk");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

if ($kodeBarang) {
    $urutan = (int) substr($kodeBarang, 3);
    $urutan++;
} else {
    $urutan = 1;
}

$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%04d", $urutan);
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
        <!-- Core theme CSS (includes Bootstrap)-->
         <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/ADMmain.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column min-vh-100" style="height: 100%">
        <?php include 'navbarADM.php' ?>

    <header>
        <h1 align="center">Tambah Barang</h1>
        <form action="proses_tmbhADM.php" method="POST" enctype="multipart/form-data">
            <div class="container-md" style="padding-top: 5%" align="center">
                <div class="col-6 mb-3" align="left">
                    <label for="formGroupExampleInput" class="form-label">Id Barang</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="idbrg" required="required" value="<?php echo $kodeBarang ?>" readonly>
                </div>

                <div class="col-6 mb-3" align="left">
                    <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="nmbrg">
                </div>

                <div class="col-6 mb-3" align="left">
                    <label for="formGroupExampleInput" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" id="formGroupExampleInput" name="deskripsi"></textarea>
                </div>

                <div class="col-6 mb-3" align="left">
                    <label for="formGroupExampleInput" class="form-label">Stok</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="stock">
                </div>

                <div class="col-6 mb-3" align="left">
                    <label for="formGroupExampleInput" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="hrgbrg">
                </div>

                <div class="col-6 mb-3" align="left">
                    <label for="formFile" class="form-label">Masukan Gambar</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>

                <div class="col-6 mb-3">
                    <button type="submit" class="btn btn-outline-success " name="tambah" value="tambah">Tambah </button>
                </div>
            </div>
        </form>
    </header>

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
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;Master Komputer</p>
        </div>
    </footer>
</body>
</html>
