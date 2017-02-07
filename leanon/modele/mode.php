<?php
function activer_mode($mode){
	global $bdd, $_SESSION;
	
	//On recupere les valeurs du mode 
	$req = $bdd-> prepare('SELECT * FROM mode_obj WHERE id = :id ');
	$req->execute(array('id'=> $mode));
	$valeurs = $req->fetch();
	
	// On recupere les pieces de la maison
	$reponse1 = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
	$reponse1->execute(array('maison'=>$_SESSION['maison'])); 
	
	while ($key =  $reponse1->fetch())
	{
		$req1 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donnee WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$req1-> execute(array('donnee'=>$valeurs['temperature'],'cat'=>1, 'piece'=> $key['id']));
		
		$req1 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donnee WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$req1-> execute(array('donnee'=>$valeurs['luminosite'],'cat'=>2, 'piece'=> $key['id']));
		
		$req1 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donnee WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$req1-> execute(array('donnee'=>$valeurs['securite'],'cat'=>3, 'piece'=> $key['id']));
	}
	
	

}

function modifier_mode($newnom,$temp,$lum,$secu,$nom){
	global $bdd, $_SESSION;
	
	$req = $bdd-> prepare('UPDATE mode_obj SET nom_mode = :newnom, temperature = :temp, luminosite = :lum, securite = :secu WHERE nom_mode= :nom');
	$req -> execute(array('newnom'=>$newnom,'temp'=>$temp,'lum'=>$lum,'secu'=>$secu,'nom'=>$nom));
}

function supprimer_mode ($nom){
	global $bdd, $_SESSION;
	
	$req = $bdd->prepare('DELETE FROM mode_obj WHERE nom_mode = :nom AND id_maison = :id');
	$req -> execute(array('nom'=>$nom,'id'=>$_SESSION['maison']));
}