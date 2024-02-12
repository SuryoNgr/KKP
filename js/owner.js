
        function togglePopup() {
            var popup = document.getElementById("popup");
            if (popup.style.display === "block") {
                popup.style.display = "none";
            } else {
                popup.style.display = "block";
            }
        }

        function applyFilter() {
            var selectedType = document.getElementById("room-type").value;
            
            alert("Filter applied for " + selectedType + " room type.");
            
        }

        
        function resetFilter() {
           
            document.getElementById("room-type").value = "basic";
           
            alert("Filter reset.");
            
        }