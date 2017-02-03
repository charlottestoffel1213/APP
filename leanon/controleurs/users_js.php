<?php
//Liste des obj en disfonctionnement 

$etat = etat_obj($_SESSION['maison']);

$_GET['piece'] = htmlspecialchars($_GET['piece']);
// Liste des capteurs de chaque piece
$liste_obj_lum = liste_obj(2,$_GET['piece'],$_SESSION['maison']);
$liste_obj_secu = liste_obj(3,$_GET['piece'],$_SESSION['maison']);
?>