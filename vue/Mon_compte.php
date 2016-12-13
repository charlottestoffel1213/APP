<?php
	require "commun.php";
	$header = entete(false);
	$pied = pied();
	$menu= menu("Mon Compte");
	$connexion = connexion(false);
	$contenu= '<h1> Mon compte </h1> 
	<h2> Bienvenue sur votre compte Mlle. Gaëlle </h2>';

	include "gabarit.php";
?>