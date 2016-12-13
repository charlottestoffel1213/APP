<?php
	require "commun.php";
	$header = entete(true);
	$pied = pied();
	$menu= menu("Ma Boutique");
	$connexion = connexion(true);
	$contenu= '<h1> Coucou </h1> 
	<h2> Aller,achete </h2>
	<body> Ecriture Roboto <br/> Nos offres</body>';

	include "gabarit.php";
?>