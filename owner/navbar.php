<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/navbar.css">
</head>
<body>
    <div class="navbar">
        <h1>Blue <span>Horizon</span></h1>
        <div class="subnav">
            
            <ul>
                <li><a href="halaman_owner.php">Home</a></li>
                <li><a href="laporan.php">Laporan</a></li>
                <li><a href="regisAdm.php">Tambah Staff</a></li>
                <li><a href="ruang.php">Kamar</a></li>
            </ul>
            <div class="user-info">
                <img src="../assets/images/user.jpg" alt="User Icon" class="user-icon">
                <b class="user-name" ><?php echo $_SESSION['username'];  ?></b>
                <a href="../logout.php"  class="logout-btn" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </div>
    </div>
   


    
</body>
</html>