<?php 
require "commun.php";
	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	$menu = menu('contacter');
	ob_start();
	include("vues/forum_addsuj_contenu.php");

	$contenu= ob_get_clean();
	if ($_SESSION['id_type_utilisateur'] == 3) {
		include "gabarit2.php";
	}
	else
	{
		include "gabarit.php";
	}
?>