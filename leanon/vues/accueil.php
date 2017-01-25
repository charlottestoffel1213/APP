<?php
	require "commun.php";

	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	ob_start();
	echo " <h1>Accueil</h1>  
	 <h2>Bienvenue sur notre site !</h2> " ;
	$contenu= ob_get_clean();

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
?>