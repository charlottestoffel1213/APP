// LUMINOSITE 
//recupere le modal lum
var modal_lum = document.getElementById('modal_lum');

//recupere l'img lum qui ouvrira le modal
var lum = document.getElementById("lum");

// recupere le bouton <span> qui fermera le modal
var span1 = document.getElementsByClassName("close1")[0];

//SECURITE 

//recupere le modal secu
var modal_secu = document.getElementById('modal_secu');

//recupere l'img secu qui ouvrira le modal
var secu = document.getElementById("secu");

//recupere le bouton <span> qui fermera le modal
var span2 = document.getElementsByClassName("close2")[0];


//le curseur change quand on passe la souris dessus 
lum.style.cursor = "pointer";

//quand on clique sur l'img lum; le modal apparaitra
lum.onclick = function() {
    modal_lum.style.display = "block";
    
}

//quand on clique sur le bouton <span> (x), le modal fermera
span1.onclick = function() {
    modal_lum.style.display = "none";
}

//quand on clique en dehors du modal, il se fermera
window.onclick = function(event2) {
    if (event2.target == modal_lum) {
        modal_lum.style.display = "none";
    }
}
//SECURITE 

//le curseur change quand on passe la souris dessus 
secu.style.cursor = "pointer";

//quand on clique sur l'img lum; le modal apparaitra
secu.onclick = function() {
    modal_secu.style.display = "block";
}

//quand on clique sur le bouton <span> (x), le modal fermera
span2.onclick = function() {
    modal_secu.style.display = "none";
}

//quand on clique en dehors du modal, il se fermera
window.onclick = function(event2) {
    if (event2.target == modal_lum) {
        modal_lum.style.display = "none";
    }
}