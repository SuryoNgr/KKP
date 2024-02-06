<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
 <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #50C878">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="halaman_admin.php">MASTER <span style="color:#008000">KOMPUTER</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><b><a class="nav-link active" aria-current="page" href="halaman_admin.php">Home</a></b></li>
                        <li class="nav-item"><a class="nav-link" href="tmbh_brgADM.php">Tambah Barang</a></li>
                        <li class="nav-item"><a class="nav-link" href="ruang.php">Daftar Ruangan</a></li>
                        <li class="nav-item"><a class="nav-link" href="riwayat.php">Riwayat Transaksi</a></li>
                    </ul>

                   </div>
                    <!-- Navbar Search -->
      <form action="halaman_admin.php" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" name="cari" class="form-control border-right-0" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
          <span class="input-group-addon bg-white border-left-0"></span>
          <button class="btn btn-success" type="button" ><i class="fas fa-search"></i></button>
        </div>
      </form>
                    <form class="d-flex">
                        <ul class="navbar-nav ml-auto ml-md-0">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <b class="fas fa-user-circle fa-fw" style="color : black;"></b>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>

                                </div>
                            </li>
                            <li class="nav-item no-arrow mx-1">
                                <i class="nav-link " href="#" id="username">
                                    <b class="" style="color : black;"><?php echo $_SESSION['username'];  ?></b>
                                </i >
                            </li>
                        </ul>
                    </form>
                    
                </div>

            </div>

        </nav>

</body>
</html>