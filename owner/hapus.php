<?php
// Periksa apakah ada sesi yang dimulai
session_start();

// Periksa apakah pengguna memiliki izin untuk mengakses halaman ini
if (empty($_SESSION['level'])) {
    header("location:../login.php?pesan=gagal");
    exit(); // Hentikan eksekusi skrip setelah pengalihan header
}

// Periksa apakah ada ID kamar yang akan dihapus yang diterima melalui permintaan POST
if (isset($_POST['hapus_id'])) {
    // Sertakan file koneksi
    require_once("../koneksi.php");

    // Persiapkan pernyataan hapus
    $hapus_id = $_POST['hapus_id'];
    $sql = "DELETE FROM room WHERE id_room = ?";

    // Persiapkan pernyataan SQL
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        // Bind parameter ke pernyataan
        $stmt->bind_param("i", $hapus_id);

        // Lakukan eksekusi pernyataan
        if ($stmt->execute()) {
            // Jika penghapusan berhasil, kembalikan ke halaman sebelumnya dengan pesan sukses
            header("location:room_data.php?pesan=hapus_sukses");
        } else {
            // Jika terjadi kesalahan saat menghapus, kembalikan ke halaman sebelumnya dengan pesan gagal
            header("location:room_data.php?pesan=hapus_gagal");
        }

        // Tutup pernyataan
        $stmt->close();
    } else {
        // Jika pernyataan tidak dapat disiapkan, kembalikan ke halaman sebelumnya dengan pesan gagal
        header("location:room_data.php?pesan=hapus_gagal");
    }

    // Tutup koneksi database
    $koneksi->close();
} else {
    // Jika tidak ada ID kamar yang diterima melalui permintaan POST, kembalikan ke halaman sebelumnya dengan pesan gagal
    header("location:room_data.php?pesan=hapus_gagal");
}

?>
