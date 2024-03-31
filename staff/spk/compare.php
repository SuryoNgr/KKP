<?php
// Include koneksi.php
include 'config.php';

// Ambil pilihan dari form (gunakan isset() untuk memastikan variabel options telah didefinisikan)
if(isset($_POST['options'])){
    $options = $_POST['options'];

    // Query untuk mendapatkan data ruangan dari tabel rooms
    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Inisialisasi array untuk menampung tipe ruangan terbaik
        $bestRooms = array();
        $maxPoints = -1;

        // Loop melalui setiap baris data ruangan
        while($row = mysqli_fetch_assoc($result)) {
            // Hitung total poin berdasarkan pilihan pengguna
            $totalPoints = 0;
            foreach($options as $option) {
                $totalPoints += $row[$option];
            }

            // Bandingkan dengan nilai maksimum yang sudah ada
            if ($totalPoints > $maxPoints) {
                $maxPoints = $totalPoints;
                // Kosongkan array bestRooms dan tambahkan tipe ruangan baru
                $bestRooms = array();
                $bestRooms[] = $row['type'];
            } elseif ($totalPoints == $maxPoints) {
                // Jika total poin sama dengan nilai maksimum, tambahkan tipe ruangan ke array bestRooms
                $bestRooms[] = $row['type'];
            }
        }

        // Output tipe ruangan terbaik
        echo "The best room types based on selected options are: " . implode(', ', $bestRooms);
    } else {
        echo "No room data found";
    }
} else {
    echo "Please select at least one option";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
