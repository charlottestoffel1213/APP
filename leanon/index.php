<?php
session_start();

include("modele/connexion_bdd.php");
include("modele/functions.php");
if(!isset($_GET['function']) || $_GET['function'] == '') {
    $function = "accueil";
} else {
    $function = $_GET['function'];
}

if(!isset($_SESSION['id'])){ // L'utilisateur n'est pas connecté
        $connecte=false;
        
    } else { 
        $connecte=true;
    }
if(isset($_GET['cible']) && $_GET['cible']) {
    $url = $_GET['cible']; //user ou  maintenance
} else {
    $url = 'users'; // User par defaut
}

include('controleurs/' . $url . '.php');




