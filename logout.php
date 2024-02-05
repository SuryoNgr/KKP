<?php
session_start();
include 'koneksi.php';



if (isset($_SESSION['user_id'])) {


    $userId = $_SESSION['user_id'];
    $shoppingCart = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : [];

    foreach ($shoppingCart as $productId => $quantity) {

        $query = "INSERT INTO keranjang (id_user, id_produk, quantity) VALUES ($userId, $productId, $quantity)
                  ON DUPLICATE KEY UPDATE quantity = $quantity";

        mysqli_query($koneksi, $query);
    }
}


unset($_SESSION['shopping_cart']);
$_SESSION['cart_count'] = 0;


session_destroy();


header("Location: login.php");
exit();
?>
