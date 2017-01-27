<?php
	

	require "commun.php";
    
	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	
	ob_start();
    include('maintenance_controle.php');
	$contenu= ob_get_clean();

	include "gabarit.php";
?>