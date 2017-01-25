
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/tableau.css">
	<?php
	require "commun.php";

	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	$menu=menu('compte');
	ob_start();
	include 'gerer_compte_contenu.php' ;
	$contenu= ob_get_clean();

	include "gabarit.php";
?>