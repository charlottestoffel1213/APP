
<link rel="stylesheet" href="vues/styles/maison_vue.css" />
<?php
	require "commun.php";

	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	$menu= menu($function);
	ob_start();
	echo '<h1>'. $_GET['piece'] . '</h1>' ;
	include "vues/pilotage_contenu.php";
	$contenu= ob_get_clean();

	include "gabarit.php";
?>