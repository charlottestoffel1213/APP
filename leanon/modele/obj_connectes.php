<?php

function moyenne($categorie, $piece){
	global $bdd, $_SESSION;
	$reponse1 = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
	$reponse1->execute(array('maison'=>$_SESSION['maison'])); // On recupere les pieces de la maison en question 
	if ($piece == 'maison')
	{ $i=0; $avg=0;


		while ($key =  $reponse1->fetch())
		{
			$req = $bdd-> prepare("SELECT AVG(donnee_recue ) FROM obj_connectes WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece"); // Calcule la moyenne de chaque piece qui existe dans la maison 
			$req->execute(array('cat'=>$categorie, 'piece'=> $key['id']));
			$i= $i+1;
			while ($key2 = $req-> fetch())
			{
				$avg= $avg + $key2['AVG(donnee_recue )'];
			}
		}
		$req1= $avg/$i;
		$moyenne = substr($req1, 0,4 );
		$moyenne = $moyenne . 'C°';
	} else 
	{
		$req = $bdd->prepare('SELECT id FROM pieces WHERE nom = :nom AND id_maison = :maison');
		$req->execute(array('nom'=>$piece, 'maison'=>$_SESSION['maison']));
		$reponse = $req->fetch();

		$req1 = $bdd-> prepare('SELECT AVG( donnee_recue ) FROM obj_connectes WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$req1->execute(array('cat'=>$categorie, 'piece'=>$reponse['id']));
	
		while ($donnees  = $req1->fetch())
    	{
    		$moyenne = (string)$donnees ["AVG( donnee_recue )"];
    		$moyenne = substr($moyenne, 0,4 );
    		$moyenne .= 'C°';
    	}
	}
    return $moyenne;
}

function voulu($categorie,$piece,$valeurs){
	global $bdd,$_SESSION;
	$reponse1 = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
	$reponse1->execute(array('maison'=>$_SESSION['maison'])); // On recupere les pieces de la maison 
	if ($piece == 'maison'){

		while ($key =  $reponse1->fetch())
		{
			$req1 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donnee WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
			$req1-> execute(array('donnee'=>$valeurs,'cat'=>$categorie, 'piece'=> $key['id']));
		}
	} else 
	{
		$req = $bdd->prepare('SELECT id FROM pieces WHERE nom = :nom AND id_maison = :maison');
		$req->execute(array('nom'=>$piece, 'maison'=> $_SESSION['maison']));
		$reponse = $req->fetch();

		$req1 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donnee WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$req1-> execute(array('donnee'=>$valeurs,'cat'=>$categorie, 'piece'=>$reponse['id']));
	}
}

function liste_obj($categorie,$piece){
	global $bdd, $_SESSION;
	
		$req = $bdd->prepare('SELECT id FROM pieces WHERE nom = :nom AND id_maison = :maison');
		$req->execute(array('nom'=>$piece, 'maison'=> $_SESSION['maison']));
		$reponse = $req->fetch();
	
		$liste_obj = $bdd->prepare('SELECT * FROM obj_connectes WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$liste_obj-> execute(array('cat'=>$categorie, 'piece'=>$reponse['id']));
	

	return $liste_obj;
}

?>