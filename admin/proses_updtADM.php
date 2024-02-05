<?php 
// koneksi database
include '../koneksi.php';
 

$id = $_POST['idbrg'];
$namabrg = $_POST['nmbrg'];
$description = $_POST['deskripsi'];
$stok = $_POST['stock'];
$harga = $_POST['hrgbrg'];

$query = mysqli_query($koneksi,"update  produk set nama='$namabrg',harga='$harga', deskripsi='$description', stok='$stok' where id_produk='$id'");

if ($query) {
echo "<script>alert('You have successfully update the data');</script>";
echo "<script type='text/javascript'> document.location ='halaman_admin.php'; </script>";
}
else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}

?>
