<?php
require_once '../koneksi.php';

if (isset($_POST['submit'])) {
    $name = strip_tags($_POST['nama']);
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $phone = strip_tags($_POST['phone']);
    

    if (empty($name) || empty($password) || empty($username) || empty($phone)) {
        echo '<b>Warning!</b> Silahkan isi data yang diperlukan.';
    } elseif (count((array)$koneksi->query('SELECT username FROM login WHERE username = "' . $username . '"')->fetch_array()) > 1) {
        echo '<b>Warning!</b> Username telah terdaftar';
    } else {
        $insert = $koneksi->query('INSERT INTO `login`(`nama_admin`, `username`, `password`, `notelp_admin`, `level`) VALUES("' . $name . '","' . $username . '", "' . 
     $password . '", "' . $phone . '", "staff")');

        if ($insert) {
           echo '<script>alert("Pendaftaran berhasil!");</script>';
            echo '<script>window.location.href = "halaman_owner.php";</script>';
            exit;
        } else {
            echo 'Pendaftaran gagal!';
        }
    }
}
?>
