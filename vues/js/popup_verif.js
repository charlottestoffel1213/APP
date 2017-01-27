// recupere le modal
var modal = document.getElementById('myModal');

// recupere le bouton qui ouvrira le modal
var btn = document.getElementById("myBtn");

// recupere le bouton <span> qui fermera le modal
var span = document.getElementsByClassName("close")[0];

// quand on clique sur le bouton; le modal apparaitra
btn.onclick = function() {
    modal.style.display = "block";
}

// quand on clique sur le bouton <span> (x), le modal fermera
span.onclick = function() {
    modal.style.display = "none";
}

// quand on clique en dehors du modal, il se fermera
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}