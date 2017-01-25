<?php
	require "commun.php";

	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	if ($_SESSION['id_type_utilisateur'] == 1) {
		$menu = menu('compte');
	}
	else
	{
		$menu=menu('compte');
	}
	ob_start();
	include ('editprofil_contenu.php') ;
	$contenu= ob_get_clean();
	
	if ($_SESSION['id_type_utilisateur'] == 3) {
		include "gabarit2.php";
	}
	else
	{
		include "gabarit.php";
	}
	
?>




