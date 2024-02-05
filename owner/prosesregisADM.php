<?php
require_once '../koneksi.php';

if (isset($_POST['submit'])) {
    $name = strip_tags($_POST['nama']);
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $phone = strip_tags($_POST['phone']);
    $address = strip_tags($_POST['address']);

    if (empty($name) || empty($password) || empty($username) || empty($phone) || empty($address)) {
        echo '<b>Warning!</b> Silahkan isi data yang diperlukan.';
    } elseif (count((array)$koneksi->query('SELECT username FROM login WHERE username = "' . $username . '"')->fetch_array()) > 1) {
        echo '<b>Warning!</b> Username telah terdaftar';
    } else {
        $insert = $koneksi->query('INSERT INTO `login`(`nama`, `username`, `password`, `no_telp`, `alamat`, `level`) VALUES("' . $name . '","' . $username . '", "' . $password . '", "' . $phone . '", "' . $address . '", "admin")');
        if ($insert) {
            header("location: halaman_owner.php");
        } else {
            echo 'Pendaftaran gagal!';
        }
    }
}
?>
