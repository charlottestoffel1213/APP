
<?php
require "commun.php";

$header = entete($connecte);
$pied = pied();
$connexion = connexion($connecte);
$menu= menu('pilotage');
$mode= mode('mode');
ob_start();
echo '<h1>Ajouter un mode</h1>' ;
include "vues/mode_ajout.php";
$contenu= ob_get_clean();

include "gabarit.php";
?>