<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <link rel="icon" href="images/iconLogo.png" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/contact-us.css">
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
                <li><a style="text-decoration:none" href="pemesanan.php">Room</a></li>
                <li><a style="text-decoration:none" href="pemesanan.php">Book now</a></li>
                <li><a style="text-decoration:none" href="#information">Information</a>
                    <ul>
                        <li><a style="text-decoration:none" href="contact-us.php">Contact us</a></li>
                        <li><a style="text-decoration:none" href="about-us.php">About us</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

    <!-- end -->

    <h1 style="color: white;">Frequently Asked Questions</h1>

    <div class="faqs-container">
        <div class="faq active">
            <h3 class="faq-title">
                What is Blue Horizon?
            </h3>
            <p class="faq-text">
                a Hotel located in Depok, West Java, with views of the city.
                This hotel offers a variety of luxurious and traditional facilities, such as
                private room, restaurant, and wedding venue
            </p>
            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title">
                What types of Rooms Does Bali Horizon offer?
            </h3>
            <p class="faq-text">
                We Offer Basic, Daily, Panoramic, Exclusive and Honey. Each Designed To Cater To Different
                Preferences And Needs.
            </p>
            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="faq">
            <h3 class="faq-title">
                Can I Host Events Or Conferences At Blue Horizon?
            </h3>
            <p class="faq-text">
                Yes, Blue Horizon can hold weddings and other formal events.
                Contact our team to discuss your specifications and requests and make the moment memorable.
            </p>
            <button class="faq-toggle">
                <i class="fas fa-chevron-down"></i>
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- contact us -->
    <section>
        <div class="container">
            <div class="contactInfo">
                <div>
                    <img src="assets/images/index/Kids Pool and mini slide.png" alt="images">
                    <img src="assets/images/index/Aerial exterior 1.png" alt="images">
                    <img src="assets/images/index/Resort Overview-1.png" alt="images">
                </div>
            </div>
            <div class="contactForm">
                <h2>Contact with Us</h2>
                <div class="formBox">
                    <div class="inputBox w50">
                        <input type="text" name="" required="">
                        <span>First Name</span>
                    </div>
                    <div class="inputBox w50">
                        <input type="text" required="">
                        <span>Last Name</span>
                    </div>
                    <div class="inputBox w50">
                        <input type="email" required="">
                        <span>Email Address</span>
                    </div>
                    <div class="inputBox w50">
                        <input type="text" required="">
                        <span>Mobile Number</span>
                    </div>
                    <div class="inputBox w100">
                        <textarea required=""></textarea>
                        <span>Write your message here...</span>
                    </div>
                    <div class="inputBox w100">
                        <input type="submit" value="Send">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <br>
    <div class="aboutFooter">
        <img src="assets/images/index/blueHorizonlogoBlue.png" alt="Logo Resort" width="25%">
        <div class="footer-alamat">
            <div class="kantorPusat">
                <br>
                <p>Jl. Mt Al Muhsinin No.20, RT.2/RW.1, Sukamaju, Kec. Cilodong, Kota Depok, Jawa Barat 16415</p>
                <p>Contact center. (0360)161616</p>
            </div>
            <div class="services">
                <h3>Service</h3>
                <br>
                <a class="BlueHorizonProf" href="index.php#Facility">
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
    <script src="js/contact-us.js"></script>

</body>

</html>