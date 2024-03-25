<?php
require_once("../koneksi.php");

$query = "SELECT * FROM payment";
$result = mysqli_query($koneksi, $query);

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo '<meta name="referrer" content="no-referrer">';
echo "<title>Cetak Laporan</title>";
echo "</head>";
echo "<body>";

echo "<center><h1>Laporan Pemesanan</h1></center>";
echo "<table cellspacing='0' cellpadding='5' border='1'>";
echo "<tr><th>Nomor Telephone</th><th>Nama</th><th>Nomor Rekening</th><th>Email</th><th>CheckIn</th><th>CheckOut</th><th>Nomor Ruangan</th><th>Total Bayaran</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    
    echo "<td>" . $row['notelp_pl'] . "</td>";
    echo "<td>" . $row['nama_pl'] . "</td>";
    echo "<td>" . $row['norek_pl'] . "</td>";
    echo "<td>" . $row['email_pl'] . "</td>";
    echo "<td>" . $row['checkin'] . "</td>";
    echo "<td>" . $row['checkout'] . "</td>";
    echo "<td>" . $row['id_room'] . "</td>";
    echo "<td>" . $row['harga_total'] . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "</body>";
echo "</html>";

mysqli_free_result($result);
mysqli_close($koneksi);
?>
