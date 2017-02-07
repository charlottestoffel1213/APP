<?php
require "commun.php";

$header = entete($connecte);
$pied = pied();
$connexion = connexion($connecte);
$menu= menu('pilotage');
ob_start();
include "vues/mode_affichage_c.php";
$contenu= ob_get_clean();

include "gabarit.php";
?>