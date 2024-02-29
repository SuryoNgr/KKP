let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".header .navbar");

menu.onclick = () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
};

window.onscroll = () => {
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
};

var swiper = new Swiper(".home-slider", {
  grabCursor: true,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

var swiper = new Swiper(".room-slider", {
  spaceBetween: 20,
  grabCursor: true,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 7500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});

const CodeForm = document.getElementById("code-form");
const ReedemButton = document.getElementById("code-form-submit");
const CodeAccMsg = document.getElementById("code-acc-msg");

ReedemButton.addEventListener("click", async (e) => {
  e.preventDefault();

  const code = CodeForm.code.value;
  if (code === "hotel" || code === "BANDUNG16") {
    alert("You Successfully Redeemed Code");
    location.reload();
  } else {
    CodeAccMsg.style.opacity = 1;
  }
});

//tambah ruang pilihan ruang bertambah
document.addEventListener("DOMContentLoaded", function() {
        var roomsSelect = document.getElementById("rooms");
        var roomTypeContainer = document.querySelector(".room-type-container");

        // Fungsi untuk menambahkan kotak room type sesuai dengan jumlah kamar yang dipilih
        function addRoomTypeBoxes(numRooms) {
            // Kosongkan container terlebih dahulu
            roomTypeContainer.innerHTML = "";
            for (var i = 0; i < numRooms; i++) {
                var roomTypeBox = document.createElement("div");
                roomTypeBox.classList.add("box");
                roomTypeBox.innerHTML = `
                    <p>room type ${i + 1} <span>*</span></p>
                     <select name="type" class="input" id="type_room">
                        <option value="Exclusive">exclusive rooms</option>
                        <option value="Basic">basic rooms</option>
                        <option value="Daily">daily rooms</option>
                        <option value="Panoramic">panoramic rooms</option>
                        <option value="Honey">honey rooms</option>
                    </select>
                `;
                roomTypeContainer.appendChild(roomTypeBox);
            }
        }

        // Panggil fungsi untuk pertama kali
        addRoomTypeBoxes(parseInt(roomsSelect.value));

        // Tambahkan event listener untuk perubahan pada pilihan 'rooms'
        roomsSelect.addEventListener("change", function() {
            var numRooms = parseInt(this.value);
            addRoomTypeBoxes(numRooms);
        });
    });

    // membatasi pengunjung
    document.addEventListener("DOMContentLoaded", function() {
        var personSelect = document.getElementById("person");
        var roomsSelect = document.getElementById("rooms");

        // Nonaktifkan opsi 'rooms' saat halaman dimuat
        roomsSelect.disabled = true;

        // Tambahkan event listener untuk perubahan pada pilihan 'pengunjung'
        personSelect.addEventListener("change", function() {
            var selectedPerson = parseInt(this.value);
            // Jika pengunjung dipilih selain "None person", maka aktifkan opsi 'rooms'
            if (selectedPerson !== "NONE") {
                roomsSelect.disabled = false;
                // Panggil fungsi untuk membatasi opsi 'rooms'
                limitRoomOptions(selectedPerson);
            } else {
                roomsSelect.value = "NONE"; // Set kembali opsi 'rooms' menjadi "Pilih Room"
                roomsSelect.disabled = true;
            }
        });

        // Fungsi untuk membatasi opsi 'rooms' berdasarkan jumlah pengunjung
        function limitRoomOptions(selectedPerson) {
            var selectedRooms = parseInt(roomsSelect.value);
            // Jika pengunjung berjumlah 3-4, maka opsi 'rooms' dengan value 1 akan dinonaktifkan
            if (selectedPerson >= 3 && selectedPerson <= 4) {
                disableOptions(roomsSelect, 1);
            }
            // Jika pengunjung berjumlah 5-6, maka opsi 'rooms' dengan value 1-3 akan dinonaktifkan
            else if (selectedPerson >= 5 && selectedPerson <= 6) {
                disableOptions(roomsSelect, 1);
                disableOptions(roomsSelect, 2);
            }
            // Jika jumlah pengunjung lainnya, aktifkan kembali semua opsi 'rooms'
            else {
                enableAllOptions(roomsSelect);
            }
        }

        // Fungsi untuk menonaktifkan opsi pada elemen select
        function disableOptions(selectElement, value) {
            var option = selectElement.querySelector("option[value='" + value + "']");
            if (option) {
                option.disabled = true;
            }
        }

        // Fungsi untuk mengaktifkan kembali semua opsi pada elemen select
        function enableAllOptions(selectElement) {
            for (var i = 0; i < selectElement.options.length; i++) {
                selectElement.options[i].disabled = false;
            }
        }
    });

     // mengatur tanggal
  document.addEventListener("DOMContentLoaded", function() {
    var checkinInput = document.getElementById("checkin");
    var checkoutInput = document.getElementById("checkout");

    // Mendapatkan tanggal saat ini
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // Januari dimulai dari 0
    var yyyy = today.getFullYear();
    var tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    // Mengatur nilai tanggal pada input 'check in' dan 'check out'
    checkinInput.value = yyyy + '-' + mm + '-' + dd;
    checkoutInput.value = tomorrow.toISOString().slice(0, 10);

    // Memeriksa perubahan pada input 'check in' dan 'check out'
    checkinInput.addEventListener("change", function() {
        var checkinDate = new Date(this.value);
        var checkoutDate = new Date(checkoutInput.value);

        // Memeriksa apakah tanggal 'check out' lebih awal dari tanggal 'check in'
        if (checkinDate >= checkoutDate) {
            // Jika ya, atur tanggal 'check out' menjadi satu hari setelah tanggal 'check in'
            checkoutDate.setDate(checkinDate.getDate() + 1);
            checkoutInput.value = checkoutDate.toISOString().slice(0, 10);
        }

        // Memeriksa apakah tanggal 'check in' lebih kecil atau sama dengan tanggal hari ini
        var todayDate = new Date();
        if (checkinDate <= todayDate) {
            // Jika ya, atur tanggal 'check in' menjadi tanggal hari ini
            this.value = todayDate.toISOString().slice(0, 10);
        }
    });

    checkoutInput.addEventListener("change", function() {
        var checkinDate = new Date(checkinInput.value);
        var checkoutDate = new Date(this.value);

        // Memeriksa apakah tanggal 'check out' lebih awal dari tanggal 'check in'
        if (checkoutDate <= checkinDate) {
            // Jika ya, atur tanggal 'check in' menjadi satu hari sebelum tanggal 'check out'
            checkinDate.setDate(checkoutDate.getDate() - 1);
            checkinInput.value = checkinDate.toISOString().slice(0, 10);
        }
    });
});

// Function untuk menampilkan popup
function showPopup() {
  var nama = document.getElementById('nama').value;
  var email = document.getElementById('email').value;
  var notelp = document.getElementById('notelp').value;
  var norek = document.getElementById('norek').value;
  var checkin = new Date(document.getElementById('checkin').value);
  var checkout = new Date(document.getElementById('checkout').value);
  var person = document.getElementById('person').value;
  var rooms = document.getElementById('rooms').value;

  // Mengambil semua inputan dari elemen dengan id 'type_room' dan mengembalikan array yang berisi nilai-nilai tersebut
    function getAllTypeRoomInputs() {
  var typeRoomInputs = document.querySelectorAll('[id^="type_room_"]'); // Mengambil elemen-elemen select dengan id yang dimulai dengan 'type_room_'
  var type_room_values = [];
  typeRoomInputs.forEach(function(input) {
      type_room_values.push(input.value);
  });
  return type_room_values;
}

  // Mendapatkan semua inputan dari type_room
  var type_room_inputs = getAllTypeRoomInputs();

  // Mendefinisikan harga untuk setiap tipe kamar
  var harga = {
      'Basic': 500000,
      'Daily': 1000000,
      'Panoramic': 1500000,
      'Exclusive': 2000000,
      'Honey': 2500000
  };

  // Menghitung total harga berdasarkan inputan type_room
var total_harga = 0;
type_room_inputs.forEach(function(type) {
  total_harga += harga[type];
});

 // Menghitung jumlah hari antara check-in dan check-out
 var oneDay = 24 * 60 * 60 * 1000; // Satu hari dalam milidetik
 var jumlah_hari = Math.round(Math.abs((checkout - checkin) / oneDay));

 // Mengalikan jumlah hari dengan total harga
 total_harga *= jumlah_hari;


  var rincian = `
      <p>Nama:<b> ${nama}</b></p>
      <p>Email: <b>${email}</b></p>
      <p>Nomor Telepon: <b>${notelp}</b></p>
      <p>Nomor Rekening: <b>${norek}</b></p>
      <p>Check In: <b>${checkin.toLocaleDateString()}</b></p>
      <p>Check Out: <b>${checkout.toLocaleDateString()}</b></p>
      <p>Jumlah Pengunjung:<b> ${person}</b></p>
      <p>Jumlah Kamar: <b>${rooms}</b></p>
      <p>Tipe Kamar: <b>${type_room_inputs.join(', ')}</b></p>
  `;
  
  document.getElementById('rincian').innerHTML = rincian;
  document.getElementById('total').innerHTML = '<p>Total Harga: <b>Rp.' + total_harga + '</b> </p>';

  document.getElementById('overlay').style.display = 'block';
  document.getElementById('popup').style.display = 'block';
}



// Function untuk menyembunyikan popup
function hidePopup() {
document.getElementById('overlay').style.display = 'none';
document.getElementById('popup').style.display = 'none';
}
