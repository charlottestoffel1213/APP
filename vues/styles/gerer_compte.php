<?php 

include '../modele/connexion_bdd.php';


$requete2= $bdd->prepare('SELECT username,id_type_utilisateur FROM utilisateur WHERE id_principal= :id_principal');
$requete2->execute(array('id_principal'=>23/*$_SESSION['id']*/));
while ($key=$requete2->fetch()) {
	echo $key ;
}

?>