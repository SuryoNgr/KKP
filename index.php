<!doctype html>
<html lang="en">
    <head>
        <title>Nama Hotelnya</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <!-- swiper js cdn link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <!-- custom css link -->
        <link rel="stylesheet" href="assets/css/global.css">
    </head>

    <body> 
    <!-- 👇 ini header navigasibar 👇 -->
    <!-- header -->
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
    <!-- end -->

    <!-- Slide Home -->
    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide" style="background: url(assets/images/index/kodePromo1.png) no-repeat;">
                    <div class="content">
                    </div>
                </div>
                <div class="swiper-slide slide" style="background: url(assets/images/index/Pool-Aerial.png) no-repeat;">
                    <div class="content">
                        <h3>Blue Horizon</h3>
                    </div>
                </div>
                <div class="swiper-slide slide" style="background: url(assets/images/index/Swim.png) no-repeat;">
                    <div class="content">
                        <h3>Blue Horizon</h3>
                    </div>
                </div>
                <div class="swiper-slide slide" style="background: url(assets/images/index/home-slide3.png) no-repeat;">
                    <div class="content">
                        <h3>Blue Horizon</h3>
                    </div>
                </div>
                <div class="swiper-slide slide" style="background: url(assets/images/index/home-slide4.png) no-repeat;">
                    <div class="content">
                        <h3>Blue Horizon</h3>
                    </div>
                </div>
                <div class="swiper-slide slide" style="background: url(assets/images/index/kodePromo2.png) no-repeat;">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!-- end -->

    <!-- About home -->
    <div class="about" id="about-home">
        <span class="title">
            <p>Welcome, embrace the day with joy!</p>
        </span>
        <div class="text">
            Discover a haven of tranquility nestled in the heart of Bali. Experience the perfect
            blend of luxury and cultural richness at Blue Horizon. Explore the allure of our exquisite
            accommodations and embrace the beauty of Bali. Your extraordinary journey begins
            here.
        </div>
    </div>
    <div class="fasilitas" id="Facility">
        <div class="keterangan">
            <img src="assets/images/index/ruang tamu.jpg" alt="Room and Suites" />
            <div class="offer">Rooms and Suites</div>
        </div>
        <div class="keterangan">
            <img src="assets/images/index/Aerial exterior 1.png" alt="Villas" />
            <div class="offer">Villas</div>
        </div>
    </div>
    <div class="deskFasilitas">
        <div class="deskFasilitasTop">
            <img src="assets/images/index/ocean-front-dinning.png" alt="ocean-front-dinning" />
            <div class="textFasilitas">
                <h1>Oceanfront Dining</h1>
                <br />
                <p class="text">
                    "Secure your spot in our inviting dining room for a memorable
                    dining experience. Our cozy and elegant atmosphere sets the
                    stage for a delightful meal, perfect for intimate gatherings or
                    special celebrations.
                    Reserve your table now to savor exquisite cuisine in a
                    welcoming environment."
                </p>
                <br />
                <div class="kotakFasilitas">Explore Dining & Drink</div>
            </div>
        </div>
        <div class="deskFasilitasBot">
            <div class="textFasilitas">
                <h1>Meeting Event and Weedings</h1>
                <br />
                <p class="text">
                    "Host your next event in Bali. Our versatile spaces allow all combinations,
                    from small meetings, regional conferences, and international gatherings to gala dinners,
                    spectacular oceanfront weddings, and large beachside dinners for up to 500 people."
                </p>
                <br />
                <div class="kotakFasilitas">Plant Your Event</div>
            </div>
            <img src="assets/images/index/event-wedding.png" alt="event-wedding" />
        </div>
    </div>
    <div class="explore">
        <img src="assets/images/index/at-our-ressort.png" alt="at-our-ressort" />
        <div class="teksExplore">
            <h1>At Our Resort</h1>
            <br />
            <p class="text">
                "Explore the facilities and amenities of Hilton Bali Resort.
                Discover the popular Kids Club and a full-service Mandara Spa offering a wide selection of relaxing
                treatments.
                Make a splash at one of our four pools, or relax on the white sandy beach.
                Hilton Bali Resort is the perfect place for a relaxing tropical getaway."
            </p>
            <br />
            <div class="kotakExplore">Explore Our Resort</div>
        </div>
    </div>
    <!-- end -->

    <!-- map -->
    <div class="containerMap">
        <div class="deskMap">
            <div>
                <div class="titleMap"><img src="assets/images/index/BlueHorizonWhite.png" alt="logo resort" width="100%"></div>
                <br><br>
                <div class="alamatMap">Found us at.</div>
                <br>
                <div class="noTelpMap">Call us <br> (0360)161616</div>
                <br>
                <div class="btnMap">
                    <a href="contact-us.html"><button class="emailMap">Contact Us</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- footer -->
    <br>
    <div class="aboutFooter">
        <img src="assets/images/index/blueHorizonlogoBlue.png" alt="Logo Resort" width="25%">
        <div class="footer-alamat">
            <div class="kantorPusat">
                <h3>KANTOR PUSAT</h3>
                <br>
                <p>PT. Cakrawala Biru</p>
                <p>Jl. Asik, Daerah Khusus Ibukota Jakarta</p>
                <p>Contact center. (0360)161616</p>
            </div>
            <div class="tentangBlue Horizon">
                <h3>Tentang Blue Horizon</h3>
                <br>
                <a class="BlueHorizonProf" href="home.html">
                    <p>Profil Perusahaan</p>
                </a>
            </div>
            <div class="services">
                <h3>Service</h3>
                <br>
                <a class="BlueHorizonProf" href="#">
                    <p>Fasilitas Kami</p>
                </a>
            </div>
        </div>
    </div>

    </div>
    <div class="footer">
        <p>Copyright © 2024</p>
    </div>
    </div>

    <!-- end -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/pscript.js"></script>


</body>

</html>