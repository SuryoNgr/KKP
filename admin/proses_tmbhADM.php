<?php 
// koneksi database
include '../koneksi.php';
 

$id = $_POST['idbrg'];
$namabrg = $_POST['nmbrg'];
$description = $_POST['deskripsi'];
$stok = $_POST['stock'];
$harga = $_POST['hrgbrg'];

$namafolder="../assets/images/"; 
if (!empty($_FILES["file"]["tmp_name"]))
{
$jenis_gambar=$_FILES['file']['type']; 
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
{
$lampiran = $namafolder . basename($_FILES['file']['name']);


if (move_uploaded_file($_FILES['file']['tmp_name'], $lampiran)) {

		$query = mysqli_query($koneksi,"insert into produk values('$id','$namabrg','$harga','$description','$stok','$lampiran')");
 		
} else {
echo "Gambar gagal dikirim";
}
} else {
echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
}
} else {
echo "Anda belum memilih gambar";
}


header("location:halaman_admin.php");

?>