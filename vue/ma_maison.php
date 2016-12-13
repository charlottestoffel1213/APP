<?php
	require "commun.php";
	$header = entete(true);
	$connexion= connexion(true);
	$pied = pied();
	$menu= menu("Ma Maison");
	$contenu= '<h1> Ma Maison </h1> 
	<h2> Bienvenue </h2>';

	include "gabarit.php";
?>