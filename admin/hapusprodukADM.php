<?php 

include '../koneksi.php';

mysqli_query($koneksi,"delete from produk where id_produk='$_GET[id]'");
 

header("location:halaman_admin.php");
 
?>