<?php
	require "commun.php";

	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	$menu = menu('compte');
	
	
	ob_start();
	include('vues/formu_cap.php');
	$contenu= ob_get_clean();

	
		include "gabarit2.php";
	