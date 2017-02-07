
<?php
require "commun.php";

$header = entete($connecte);
$pied = pied();
$connexion = connexion($connecte);
$menu = menu('contacter');
ob_start();

include("vues/trouver_contenu.html");
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