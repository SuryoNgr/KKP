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
                    <select name="type${i + 1}" class="input" id="type_room_${i + 1}">
                        <option value="Exclusive">exclusive rooms</option>
                        <option value="family">family rooms</option>
                        <option value="daily">daily rooms</option>
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