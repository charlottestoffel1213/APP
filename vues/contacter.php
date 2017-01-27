
<?php

	require "commun.php";
	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	$menu= menu($function);

	$contenu= '
	
	<h1> Qui sommes nous? </h1>
	<h2> Lean On, Here for you </h2>';
	

	
	if ($connecte){
		if ($_SESSION['id_type_utilisateur'] == 3) {
			include "gabarit2.php";
		}
		else
		{
			include "gabarit.php";
		}
	}else{
		include "gabarit.php";
	}