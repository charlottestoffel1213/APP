<?php 
	
	require "commun.php";
	$header = entete($connecte);
	$pied = pied();
	$connexion = connexion($connecte);
	

	$contenu= '

	<body>

	<h1> Boutique </h1> 
	<h2><div align="center"> Bienvenue sur l\'espace commercial de Lean On</div> </h2>
	<div id="case">
	<div class="boite offres"><a>Nos offres</a></div>
	<div class="boite produit"><a>Produits conseillés</a></div>
	
	</body>';
	
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