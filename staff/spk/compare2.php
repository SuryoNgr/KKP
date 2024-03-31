<?php
// Include koneksi.php
include 'config.php';

// Ambil pilihan ruangan dan kriteria dari form (gunakan isset() untuk memastikan variabel telah didefinisikan)
if(isset($_POST['rooms']) && isset($_POST['criteria'])){
    $selectedRooms = $_POST['rooms'];
    $criteria = $_POST['criteria'];

    // Query untuk mendapatkan data ruangan dari tabel rooms
    $sql = "SELECT * FROM rooms WHERE type IN ('" . implode("','", $selectedRooms) . "')";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Inisialisasi variabel untuk menampung hasil perbandingan
        $bestRoom = "";
        $maxValue = -1;

        // Loop melalui setiap baris data ruangan
        while($row = mysqli_fetch_assoc($result)) {
            // Bandingkan nilai kriteria untuk setiap ruangan
            if ($row[$criteria] > $maxValue) {
                $maxValue = $row[$criteria];
                $bestRoom = $row['type'];
            }
        }

        // Output tipe ruangan terbaik berdasarkan kriteria yang dipilih
        echo "The best room type based on selected criteria ($criteria) is: $bestRoom";
    } else {
        echo "No room data found";
    }
} else {
    echo "Please select at least one room and one criteria";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
