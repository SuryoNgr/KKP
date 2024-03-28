<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>XYZ Hotel</title>
   <link rel="icon" href="images/iconLogo.png" >
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
   
   <!-- swiper js cdn link -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
   <!-- custom css link -->
   <link rel="stylesheet" href="assets/css/pemesanan.css">

</head>

<body>

   <!-- header -->

   <<header class="header">
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
                        <li><a style="text-decoration:none" href="artikel.php">About us</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

   <!-- end -->

   <!-- home -->

   <section class="home" id="home">

      <div class="swiper home-slider">

         <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background: url(assets/images/index/home-slide2.png) no-repeat;">
               <div class="content">
                  <h3>XYZ Hotel</h3>
               </div>
            </div>
            <div class="swiper-slide slide" style="background: url(assets/images/index/Pool-Aerial.png) no-repeat;">
               <div class="content">
                  <h3>XYZ Hotel</h3>
               </div>
            </div>
            <div class="swiper-slide slide" style="background: url(assets/images/index/kodePromo1.png) no-repeat;">
            </div>
            <div class="swiper-slide slide" style="background: url(assets/images/index/home-slide3.png) no-repeat;">
               <div class="content">
                  <h3>XYZ Hotel</h3>
               </div>
            </div>
            <div class="swiper-slide slide" style="background: url(assets/images/index/home-slide4.png) no-repeat;">
               <div class="content">
                  <h3>XYZ Hotel</h3>
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

  
   <!-- about -->

   <section class="about" id="about">

      <div class="row">

         <div class="image">
            <img src="assets/images/index/suites.png" alt="">
         </div>

         <div class="content">
            <h3> Room and Suites</h3>
            <p>Relax on your own private balcony overlooking our sparkling pools,
               tropical garden, or the Indian Ocean. Enjoy direct access to our lagoon pool from
               selected room types and choose to stay in our stylish suites for more space and comfort.
               Indulge in premium furnishings and amenities in our rooms and suites,
               tastefully decorated to match the tranquil surroundings.</p>
         </div>

      </div>

   </section>

   <!-- end -->

   <!-- room -->

   <section class="room" id="room">

      <h1 class="heading">our room</h1>

      <div class="swiper room-slider" id="room-slider">
   <div class="swiper-wrapper">

   <div class="swiper-slide slide">
         <div class="image">
            <span class="price">500.000/night</span>
            <img src="assets/images/index/room-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>basic room</h3>
            <p>designed to accommodate single person to just want to stay a night. With decent furnishings and decoration also with complete furniture.</p>
            <a href="#reservation" class="btn">book now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <span class="price">1.000.000/night</span>
            <img src="assets/images/index/room-3.jpg" alt="">
         </div>
         <div class="content">
            <h3>daily room</h3>
            <p>designed for everyday comfort. With complete facilities and soothing interior decoration, this room is suitable for guests who are looking for simple but comfortable accommodation during their stay.</p>
            <a href="#reservation" class="btn">book now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <span class="price">1.500.000/night</span>
            <img src="assets/images/index/room-4.jpg" alt="">
         </div>
         <div class="content">
            <h3>panoramic room</h3>
            <p>offers stunning panoramic views. Suitable for guests who want to enjoy beautiful views of the city from the comfort of their room.</p>
            <a href="#reservation" class="btn">book now</a>
         </div>
      </div>


      <div class="swiper-slide slide">
         <div class="image">
            <span class="price">2.000.000/night</span>
            <img src="assets/images/index/room-1.jpg" alt="">
         </div>
         <div class="content">
            <h3>exclusive room</h3>
            <p>offers a luxurious and exclusive stay experience. With 24-hour room service, luxurious interiors and premium amenities, this room is perfect for guests looking for an unparalleled stay.</p>
            <a href="pemesanan.php#reservation" class="btn">book now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <span class="price">2.500.000/night</span>
            <img src="assets/images/index/room-5.jpg" alt="">
         </div>
         <div class="content">
            <h3>honey room</h3>
            <p>This room is specially designed for couples on their honeymoon or celebrating romantic moments. With an intimate atmosphere and luxurious facilities, Honey Room promises an unforgettable experience.</p>
            <a href="#reservation" class="btn">book now</a>
         </div>
      </div>
   </div>

   <div class="swiper-pagination"></div>
</div>


   </section>

   <!-- end -->

   <!-- fasilitas -->

   <section class="fasilitas" id="fasilitas">

      <h1 class="heading">Resort amenities</h1>

      <div class="box-container">

         <div class="box">
            <img src="assets/images/index/fasilitas1.png" alt="">
            <h3>swimming pool</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas2.png" alt="">
            <h3>food & drink</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas3.png" alt="">
            <h3>restaurant</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas4.png" alt="">
            <h3>fitness center</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas5.png" alt="">
            <h3>beauty spa</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas6.png" alt="">
            <h3>resort beach</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas7.png" alt="">
            <h3>free parking</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas8.png" alt="">
            <h3>meeting room</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas9.png" alt="">
            <h3>no pets allowed</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas10.png" alt="">
            <h3>free wifi</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas11.png" alt="">
            <h3>room service</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas12.png" alt="">
            <h3>billiard</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas13.png" alt="">
            <h3>executive lounge</h3>
         </div>

         <div class="box">
            <img src="assets/images/index/fasilitas14.png" alt="">
            <h3>24 hours service</h3>
         </div>

      </div>

   </section>

   <!-- end -->



   <!-- reservation -->

   <section class="reservation" id="reservation">

      <h1 class="heading">book now</h1>

      <form method="POST" action="proses_pesan.php" id="pemesanan">

         <div class="container">

            <div class="box">
               <p>name <span>*</span></p>
               <input type="text" class="input" placeholder="Nama Anda" id="nama" name="nama">
            </div>

            <div class="box">
               <p>email <span>*</span></p>
               <input type="text" class="input" placeholder="Email Anda" id="email" name="email">
               <span class="error-message" id="email-error"></span>
            </div>

            <div class="box">
               <p>nomor telepon <span>*</span></p>
               <input type="number" class="input" placeholder="Nomor Telepon Anda" id="notelp" name="notelp">
               <span class="error-message" id="notelp-error"></span>
            </div>

            <div class="box">
               <p>nomor rekening <span>*</span></p>
               <input type="number" class="input" placeholder="Nomor Rekening Anda" id="norek" name="norek">
               <span class="error-message" id="norek-error"></span>
            </div>

            <div class="box">
               <p>check in <span>*</span></p>
               <input type="date" class="input" id="checkin" value="<?php echo $checkin_date; ?>" name="checkin">
            </div>

            <div class="box">
               <p>check out <span>*</span></p>
               <input type="date" class="input" id="checkout"value="<?php echo $checkout_date; ?>" name="checkout">
            </div>

            <div class="box">
               <p>pengunjung <span>*</span></p>
               <select name="jumlah_tamu" class="input" id="person">
                  <option value="None">None</option>
                  <option value="1">1 person</option>
                  <option value="2">2 person</option>
                  <option value="3">3 person</option>
                  <option value="4">4 person</option>
                  <option value="5">5 person</option>
                  <option value="6">6 person</option>
               </select>
            </div>

            <div class="box">
               <p>rooms <span>*</span></p>
               <select name="jumlah_kamar" class="input" id="rooms">
                  <option value="None">None</option>
                  <option value="1">1 rooms</option>
                  <option value="2">2 rooms</option>
                  <option value="3">3 rooms</option>
                  <option value="4">4 rooms</option>
                  <option value="5">5 rooms</option>
                  <option value="6">6 rooms</option>
               </select>
            </div>

            <div class="box">
                  <div class="room-type-container">
                     <p>room type <span>*</span></p>
                     <select name="type" class="input" id="type_room">
                        <option value="Exclusive">exclusive rooms</option>
                        <option value="Basic">basic room</option>
                        <option value="Daily">daily rooms</option>
                        <option value="Panoramic">panoramic rooms</option>
                        <option value="Honey">honey rooms</option>
                     </select>
                  </div>
            </div>

         </div>
         <div class="button-container">
            <input type="button" value="booking now" class="btn" onclick="showPopup()">
         </div>
          <div class="overlay" id="overlay"></div>
            <div class="popup" id="popup">
            <h2>Rincian Pilihan & Total Harga</h2>
            <br>
            <div id="rincian"></div>
            <div id="total"></div>
            <div id="btn-popup">
            <input type="button" value="Batal" class="btn" onclick="hidePopup()">
               <input type="submit" value="Submit" class="btn">
               </div>
            </div>
      </form>
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


   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/pscript.js"></script>



</body>

</html>