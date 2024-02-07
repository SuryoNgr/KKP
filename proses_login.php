<?php 

session_start();
 

include 'koneksi.php';
 

$username = $_POST['username'];
$password = $_POST['password'];
 
 

$login = mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($login);
 

if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    $_SESSION['user_id'] = $data['id_admin'];


    if($data['level'] == "admin"){

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        

        header("location:admin/halaman_admin.php");
        exit();
    }
    else if($data['level'] == "owner"){

        $_SESSION['username'] = $username;
        $_SESSION['level'] = "owner";


        header("location:owner/halaman_owner.php");
        exit();
    }
    else{

        header("location:login.php?pesan=gagal");
        exit();
    }	
}
else{
    header("location:login.php?pesan=gagal");
    exit();
}
 
?>
