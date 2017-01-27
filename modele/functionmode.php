<?php
// Requete SQL pour supprimer une ligne d'une table existante 
function delete($table, $nom){
	global $bdd, $_SESSION ; 

	$delete = $bdd-> prepare('DELETE FROM $table WHERE id_maison = :id_maison AND nom_modep = :nom_modep ');
	$delete->execute(array('id_maison' => $_SESSION['id_maison'], 'nom_modep' => $nom ));

	$retour = 'Le mode a bien été supprimé.' ;
	return $retour ; 
}
// Requete SQL pour modifier un mode déjà créé
function modification($bdd, $table, $values){

	$modif = $bdd -> prepare('UPDATE $table SET nom_modep = :nom_modep, temp = :temp, lumière = :lumière, caméra = :caméra, volets = :volets, portes = :portes, dateD = :dateD, heureD = :heureD, dateF = :dateF, heureF = :heureF  WHERE ');
	$modif->execute(array()); 
}

// Requete SQL permettant de créer un mode
function création(){

}
?>

