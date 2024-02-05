<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit;
}

include '../koneksi.php';
$user_id = $_SESSION['user_id'];

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
}


$user_query = mysqli_query($koneksi, "SELECT * FROM `login` WHERE id_user = '$user_id'") or die('query failed');
$user_data = mysqli_fetch_assoc($user_query);

$cart_query = mysqli_query($koneksi, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
$grand_total = 0;

if (mysqli_num_rows($cart_query) === 0) {
    header('location: cart.php');
    exit;
}

while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
    $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
    $grand_total += $sub_total;
}


if (isset($_POST['delete_cart'])) {
    include '../koneksi.php';
    $user_id = $_SESSION['user_id'];

    $delete_query = mysqli_query($koneksi, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('Query failed: ' . mysqli_error($koneksi));
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .receipt-title {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-bottom: 5px;
        }

        .receipt-subtitle {
            font-size: 18px;
            color: #50C878;
            margin-bottom: 20px;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
        }

        .receipt-table th,
        .receipt-table td {
            border: 2px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .receipt-table th {
            background-color: #f2f2f2;
        }

        .receipt-total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .receipt-info {
            margin-bottom: 20px;
        }

        .receipt-info-title {
            font-weight: bold;
        }

        .receipt-info-item {
            display: flex;
            align-items: baseline;
            margin-bottom: 5px;
        }

        .receipt-info-label {
            width: 100px;
            font-weight: bold;
        }

        .receipt-info-value {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="receipt-header">
        <div class="receipt-title"><span style="color: #50c878">N</span>ota</div>
        <div class="receipt-subtitle"> <strong>MASTER <span style="color: black">KOMPUTER</span> </strong></div>
    </div>

    <div class="receipt-info">
        <div class="receipt-info-title">Informasi Pengguna:</div>
        <div class="receipt-info-item">
            <div class="receipt-info-label">Nama</div>
            <div class="receipt-info-value"><strong>:</strong> <?php echo $user_data['nama']; ?></div>
        </div>
        <div class="receipt-info-item">
            <div class="receipt-info-label">No Telepon</div>
            <div class="receipt-info-value"><strong>:</strong> <?php echo $user_data['no_telp']; ?></div>
        </div>
        <div class="receipt-info-item">
            <div class="receipt-info-label">Alamat</div>
            <div class="receipt-info-value"><strong>:</strong> <?php echo $user_data['alamat']; ?></div>
        </div>
    </div>
    
    <table class="receipt-table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            mysqli_data_seek($cart_query, 0); 
            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
                ?>
                <tr>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td>Rp <?php echo number_format($fetch_cart['price']); ?></td>
                    <td><?php echo $fetch_cart['quantity']; ?></td>
                    <td>Rp <?php echo number_format($sub_total); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="receipt-total">
        Total Keseluruhan: Rp <?php echo number_format($grand_total); ?>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>
