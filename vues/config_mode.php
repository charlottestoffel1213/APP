<?php
require "commun.php";

$header = entete($connecte);
$pied = pied();
$connexion = connexion($connecte);
$menu= menu('pilotage');
$mode= mode('mode');
ob_start();
echo '<h1>Configurer un mode </h1>' ;
include "vues/config_mode_c.php";
$contenu= ob_get_clean();

include "gabarit.php";
?>