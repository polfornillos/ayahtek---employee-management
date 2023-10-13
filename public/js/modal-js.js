// Get the modal
var addModal = document.getElementById("add-modal");

// Get the button that opens the modal
var addbtn = document.getElementById("add-employee-button");

var addcancelbtn = document.getElementById("add-cancel-btn");

var editcancelbtn = document.getElementById("edit-cancel-btn");

var editModal = document.getElementById("edit-modal");

// When the user clicks on the button, open the modal
addbtn.onclick = function() {
    addModal.style.display = "flex";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == addModal) {
    addModal.style.display = "none";
}
}

addcancelbtn.onclick = function() {
    addModal.style.display = "none";
}

editcancelbtn.onclick = function() {
    editModal.style.display = "none";
}