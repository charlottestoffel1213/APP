<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/tableau.css">
<?php
	require "commun.php";
	
	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	$menu=menu('compte');
	
	
	
	ob_start();
	include('liste_c.php');
	$contenu= ob_get_clean();
	
	if ($_SESSION['id_type_utilisateur'] == 3) {
		include "gabarit2.php";
	}
	else
	{
		include "gabarit.php";
	}