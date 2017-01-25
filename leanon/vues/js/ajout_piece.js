// AJOUT
//recupere le modal ajout
var modal_ajout = document.getElementById('modal_ajout');

//recupere le bouton ajout qui ouvrira le modal
var ajout_piece = document.getElementById("ajout_piece");

// recupere le bouton <span> qui fermera le modal
var span = document.getElementsByClassName("close")[0];

// RENOMMER
//recupere le modal ajout
var modal_renom = document.getElementById('modal_renom');

//recupere le bouton ajout qui ouvrira le modal
var renommer_piece = document.getElementById("renommer_piece");

//recupere le bouton <span> qui fermera le modal
var span1 = document.getElementsByClassName("close1")[0];


//AJOUT
//le curseur change quand on passe la souris dessus 
ajout_piece.style.cursor = "pointer";

//quand on clique sur le bouton ajout; le modal apparaitra
ajout_piece.onclick = function() {
    modal_ajout.style.display = "block";   
}

//quand on clique sur le bouton <span> (x), le modal fermera
span.onclick = function() {
    modal_ajout.style.display = "none";
}

//quand on clique en dehors du modal, il se fermera
window.onclick = function(event) {
    if (event.target == modal_ajout) {
        modal_ajout.style.display = "none";
    }
}

// RENOMMER 
//le curseur change quand on passe la souris dessus 
renommer_piece.style.cursor = "pointer";

//quand on clique sur le bouton ajout; le modal apparaitra
renommer_piece.onclick = function() {
    modal_renom.style.display = "block";   
}

//quand on clique sur le bouton <span> (x), le modal fermera
span1.onclick = function() {
    modal_renom.style.display = "none";
}

//quand on clique en dehors du modal, il se fermera
window.onclick = function(event1) {
    if (event1.target == modal_renom) {
        modal_renom.style.display = "none";
    }
}