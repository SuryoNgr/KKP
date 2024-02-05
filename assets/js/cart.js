var cartButtons = document.querySelectorAll('.cart-button');
var card_value = document.querySelector(".add-to-cart");
var pqtplus = document.querySelector(".pqt-plus");
var pqtminus = document.querySelector(".pqt-minus");
var cartvalue = 0;

cartButtons.forEach(button => {
  button.addEventListener('click', cartClick);
});

function cartClick() {
  let button = this;
  button.classList.add('clicked');
  
  // Menggunakan innerText untuk mendapatkan nilai teks
  cartvalue = parseInt(card_value.innerText); 
  
  // Mengambil tanda + atau - dari classList untuk menentukan operasi penambahan atau pengurangan
  var sign = button.classList.contains('pqt-plus') ? 1 : -1;
  
  // Melakukan penambahan atau pengurangan sesuai dengan tanda
  cartvalue += sign;
  
  // Memastikan nilai tidak negatif
  cartvalue = Math.max(0, cartvalue);
  
  // Mengubah nilai pada elemen add-to-cart
  card_value.innerText = cartvalue;
}

pqtplus.addEventListener('click', cartClick);
pqtminus.addEventListener('click', cartClick);
