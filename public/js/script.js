let imageInput = document.getElementById('imageInput');
let imageBtn = document.getElementById('imageBtn');

imageBtn.addEventListener('click', () => {
    imageInput.click();
});


function openModal() {
    let modal = document.getElementById("modal");
    modal.style.display = "block";
}

function closeModal() {
    let modal = document.getElementById("modal");
    modal.style.display = "none";
}

window.onclick = function(event) {
    let modal = document.getElementById("modal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
