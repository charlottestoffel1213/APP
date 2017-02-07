<?php

function edit($attribut,$value){
	global $bdd, $_SESSION;

	$new = htmlspecialchars($value);
	$new= "'" . $new . "'";
	$query = ' UPDATE utilisateur 
			SET ' . $attribut . ' = ' . $new . 
			' WHERE id = ' . $_SESSION['id'];

	$donnees = $bdd->prepare($query);
	return $donnees->execute();
}
function verif_mdp($password) {
	global $bdd, $_SESSION;
	
	$password = md5($password);
	$requser = $bdd->prepare("SELECT * FROM utilisateur WHERE  id = :id AND password = :password");
	$requser->execute(array('id'=>$_SESSION['id'], 'password'=>$password));
	$userexist = $requser->rowCount();
	if ($userexist == 1){
		$verif = 'ok';
	} else {
		$verif = 'Le mot de passe est incorrecte';
	}
	return $verif ;
}


