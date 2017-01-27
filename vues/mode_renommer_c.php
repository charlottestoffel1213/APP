
<?php
require "commun.php";

$header = entete($connecte);
$pied = pied();
$connexion = connexion($connecte);
$menu= menu('pilotage');
$mode= mode('mode');
ob_start();
echo '<h1>Modifier mes modes </h1>' ;
include "vues/mode_renommer.php";
$contenu= ob_get_clean();

include "gabarit.php";
?>