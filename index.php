<?php
include("modele/connexion.php");
include("modele/functions.php");

if(isset($_GET['cible']) && $_GET['cible']) {
    $url = $_GET['cible']; //user, sensor, etc.
} else {
    $url = 'users';
}

include('controleurs/' . $url . '.php');
