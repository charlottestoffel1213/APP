
<?php
require "commun.php";

$header = entete($connecte);
$pied = pied();
$connexion = connexion($connecte);
$menu= menu('pilotage');
$mode= mode('mode');
ob_start();
echo '<h1>Mode '. $_GET['type'] . '</h1>' ;
	
include "vues/mode_c.php";
$contenu= ob_get_clean();

include "gabarit.php";
?>