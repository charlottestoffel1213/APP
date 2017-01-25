
<?php
    require "commun.php";
    $header = entete($connecte);
    $pied = pied();
    $connexion = connexion($connecte);
    //$menu= menu("Qui");
    ob_start();
    include("vues/inscription_contenu.php");

    $contenu= ob_get_clean();
    include "gabarit.php";
?>