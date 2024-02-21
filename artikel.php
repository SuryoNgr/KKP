<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hotel Blue Horizon</title>
   <link rel="icon" href="images/iconLogo.png" >
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
   
   <!-- swiper js cdn link -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
   <!-- custom css link -->
   <link rel="stylesheet" href="assets/css/artikel.css">
   <style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #87CEEB; /* Warna biru langit */
    position: relative;
}

    body::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0; /* Memindahkan shape ke bagian kanan */
    width: 50vw; /* Ukuran shape mengikuti lebar viewport */
    height: 100vh; /* Ukuran shape mengikuti tinggi viewport */
    background-color: rgb(255, 204, 0); /* Warna kuning */
    z-index: -1; /* Mengatur z-index untuk menempatkan shape di belakang konten */
    clip-path: polygon(100% 0, 100% 100%, 0 50%); /* Bentuk polygon "<" */
}

h1 {
    font-family: 'Times New Roman', Times, serif;
    font-size: 48px; /* Ukuran judul disesuaikan */
    color: #fff; /* Warna teks putih */
    text-align: center;
    position: absolute;
    top: 80px; /* Jarak judul dari atas (sesuaikan dengan tinggi navigasi) */
    left: 0;
    right: 0;
    z-index: 1;
}

.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color:  #00008B; /* Warna latar belakang navigasi */
    z-index: 2;
    padding: 10px 20px; /* Padding untuk navigasi */
}
   </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="assets/images/index/BlueHorizonWhite.png" alt="LogoResort" width="75%">
        </div>
        <nav class="navbar">
            <ul>
                <li><a style="text-decoration:none" href="index.php#home">Home</a></li>
                <li><a style="text-decoration:none" href="index.php#Facility">Facility</a></li>
                <li><a style="text-decoration:none" href="pemesanan.html">Room</a></li>
                <li><a style="text-decoration:none" href="pemesanan.html">Book now</a></li>
                <li><a style="text-decoration:none" href="#information">Information</a>
                    <ul>
                        <li><a style="text-decoration:none" href="contact-us.html">Contact us</a></li>
                        <li><a style="text-decoration:none" href="about-us.html">About us</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <h1>Blue Horizon</h1>
</body>

</html>
