<?php

if(!isset($_GET['function']) || $_GET['function'] == '') {
    $function = "accueil";
} else {
    $function = $_GET['function'];
}

    if($function == "accueil") {
        $content = "accueil";
        $title = "Accueil";
        
    } elseif($function == "inscription") {
        $content = "inscription";
                $alerte = false;
                
        if (isset($_POST['username']) AND isset($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $values = array('username' => $username, 'password' => $password);
            $table = 'mvc';
            $retour = insertion($bdd, $values, $table);
            if($retour) {
                $alerte = "Inscription réussie";
            } else {
                $alerte = "L'inscription dans la BDD n'a pas fonctionné";
            }
        }
        $title = "Inscription";
    } elseif($function == "liste") { 
        
        $content = "liste";
        $title = "Liste des utilisateurs inscrits";
        
        $liste = selection($bdd, 'mvc');
        
    } else {
        $content = "error404";
    }
    


include('vues/header.php');
include('vues/' . $content . '.php');
include('vues/footer.php');
