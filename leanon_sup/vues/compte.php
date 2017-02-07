<?php
	require "commun.php";

	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	if ($_SESSION['id_type_utilisateur'] == 1 OR ($_SESSION['id_type_utilisateur'] == 3) ) {
		$menu = menu($function);
	}
	
	ob_start();
	include('vues/compte_contenu.php');
	$contenu= ob_get_clean();

	if ($_SESSION['id_type_utilisateur'] == 3) {
		include "gabarit2.php";
	}
	else
	{
		include "gabarit.php";
	}

?>