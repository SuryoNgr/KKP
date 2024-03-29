const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(toggle => {
	toggle.addEventListener('click', () => {
		toggle.parentNode.classList.toggle('active');
	});
});

// Skrip untuk mengelola formulir dan pesan
const scriptURL = 'https://script.google.com/macros/s/AKfycbz7FgWt4kfc-B6MD3m2s9_ZHZtgUHOLX2Xa4_WGEmvXMjkcRfmrTDdTfXkIH-URl_q7NQ/exec';
const form = document.querySelector('.submit-to-google-sheet');
const msg = document.getElementById("msg");

form.addEventListener('submit', e => {
    e.preventDefault();
    fetch(scriptURL, { method: 'POST', body: new FormData(form) })
        .then(response => {
            msg.innerHTML = "Message sent successfully";
            setTimeout(function () {
                msg.innerHTML = "";
            }, 5000);
            form.reset();
        })
        .catch(error => console.error('Error!', error.message));
});