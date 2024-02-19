<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation Form</title>
<style>
/* Styling untuk popup */
.popup {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fefefe;
  padding: 20px;
  border: 1px solid #888;
  width: 300px;
  text-align: center;
}
.overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
}

.container {
  width: 80%;
  margin: 0 auto;
}

.input {
  width: 100%;
  padding: 8px;
  margin: 5px 0;
  box-sizing: border-box;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
}

.btn:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<section class="reservation">

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
</div>

<div class="box">
   <p>nomor telepon <span>*</span></p>
   <input type="text" class="input" placeholder="Nomor Telepon Anda" id="notelp" name="notelp">
</div>

<div class="box">
   <p>nomor rekening <span>*</span></p>
   <input type="text" class="input" placeholder="Nomor Rekening Anda" id="norek" name="norek">
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
  
<input type="button" value="booking now" class="btn" onclick="showPopup()">


</form>

</section>

<!-- Popup -->
<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
  <h2>Rincian Pilihan & Total Harga</h2>
  <div id="rincian"></div>
  <div id="total"></div>
  <a href="proses_pesan.php" id="konfirmasi" class="btn">Konfirmasi</a>
</div>

<script>
// Function untuk menampilkan popup
function showPopup() {
  var nama = document.getElementById('nama').value;
  var email = document.getElementById('email').value;
  var notelp = document.getElementById('notelp').value;
  var norek = document.getElementById('norek').value;
  var checkin = document.getElementById('checkin').value;
  var checkout = document.getElementById('checkout').value;
  var person = document.getElementById('person').value;
  var rooms = document.getElementById('rooms').value;
  var type_room = document.getElementById('type_room').value;

  var harga = {
    'Basic': 500000,
    'Daily': 1000000,
    'Panoramic': 1500000,
    'Exclusive': 2000000,
    'Honey': 2500000
  };

  var total_harga = harga[type_room] * parseInt(rooms);

  var rincian = `
    <p>Nama: ${nama}</p>
    <p>Email: ${email}</p>
    <p>Nomor Telepon: ${notelp}</p>
    <p>Nomor Rekening: ${norek}</p>
    <p>Check In: ${checkin}</p>
    <p>Check Out: ${checkout}</p>
    <p>Jumlah Pengunjung: ${person}</p>
    <p>Jumlah Kamar: ${rooms}</p>
    <p>Tipe Kamar: ${type_room}</p>
  `;
  
  document.getElementById('rincian').innerHTML = rincian;
  document.getElementById('total').innerHTML = '<p>Total Harga: Rp.' + total_harga + '</p>';

  document.getElementById('overlay').style.display = 'block';
  document.getElementById('popup').style.display = 'block';
}

// Function untuk menyembunyikan popup
function hidePopup() {
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('popup').style.display = 'none';
}
</script>
<script src="js/pscript.js"></script>
</body>
</html>
