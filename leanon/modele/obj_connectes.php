<?php

function moyenne($categorie, $piece){
	global $bdd, $_SESSION;
	$reponse1 = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
	$reponse1->execute(array('maison'=>$_SESSION['maison'])); // On recupere les pieces de la maison en question 
	if ($piece == 'Maison')
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
    	}
	}
    return $moyenne;
}

function voulu($categorie,$piece,$valeurs){
	global $bdd,$_SESSION;
	$reponse1 = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
	$reponse1->execute(array('maison'=>$_SESSION['maison'])); // On recupere les pieces de la maison 
	if ($piece == 'Maison'){

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

//Fonction qui liste les obj_connectés par catégorie et par piece
function liste_obj($categorie,$piece,$maison){
	global $bdd, $_SESSION;

	if ($categorie =='global' AND $piece == 'global'){
		$req = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
		$req->execute(array('maison'=> $maison));
		$liste_obj = array();

		while ($key =  $req->fetch())
		{
			$liste1 = $bdd->prepare('SELECT * FROM obj_connectes WHERE id_piece = :piece');
			$liste1-> execute(array('piece'=>$key['id']));
			foreach($liste1 as $element)
			{
				$liste_obj[] = $element;
			}
		}

	}elseif ($piece == 'Maison'){
		$req = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
		$req->execute(array('maison'=> $maison));
		$liste_obj = array();
		while ($key =  $req->fetch())
		{
				
			$liste1 = $bdd->prepare('SELECT * FROM obj_connectes WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
			$liste1-> execute(array('cat'=>$categorie, 'piece'=>$key['id']));
			foreach($liste1 as $element){
				$liste_obj[] = $element;
			}
		}

	} else{

		$req = $bdd->prepare('SELECT id FROM pieces WHERE nom = :nom AND id_maison = :maison');
		$req->execute(array('nom'=>$piece, 'maison'=> $maison));
		$reponse = $req->fetch();

		$liste_obj = $bdd->prepare('SELECT * FROM obj_connectes WHERE id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$liste_obj-> execute(array('cat'=>$categorie, 'piece'=>$reponse['id']));
	}

	return $liste_obj;
}


function detection($donnee,$categorie,$piece){
	global $bdd,$_SESSION;
	
	
	if ($piece == 'Maison'){
		$requete = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
		$requete->execute(array('maison'=> $_SESSION['maison']));
		$detection = 0;
		while ($key =  $requete->fetch() )
		{
			$detection1 = $bdd -> prepare('SELECT COUNT(*) as nb FROM obj_connectes WHERE donnee_recue = :donnee AND id_categorie_objets_connectes = :cat AND id_piece = :piece');
			$detection1 -> execute(array('donnee'=>$donnee, 'cat'=>$categorie,'piece'=> $key['id']));
			$detection1= $detection1->fetch();
			if ($detection1['nb'] != 0){
				$detection = $detection + intval($detection1);
			}
			
		}
		
	} else{
		$req1 = $bdd->prepare('SELECT id FROM pieces WHERE nom = :nom AND id_maison = :maison');
		$req1->execute(array('nom'=>$piece, 'maison'=> $_SESSION['maison']));
		$reponse = $req1->fetch();
		
		$req = $bdd-> prepare('SELECT COUNT(*) as nb FROM obj_connectes WHERE donnee_recue = :donnee AND id_categorie_objets_connectes = :cat AND id_piece = :piece');
		$req -> execute(array('donnee'=>$donnee, 'cat'=>$categorie,'piece'=> $reponse['id']));
		$detection = $req->fetch();
		$req -> closeCursor();
	}
	
	return $detection;
	
}

function etat_obj($maison){
	global $bdd, $_SESSION;

	$req = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison');
	$req->execute(array('maison'=> $maison));
	$etat=array();
	while ($key = $req->fetch()){
		$reponse1 = $bdd-> prepare('SELECT * FROM obj_connectes WHERE id_piece = :piece');
		$reponse1 -> execute(array('piece'=> $key['id'] ));
		while ($donnees1 = $reponse1->fetch())
		{
			// c'est la condition des catÃ©gorie (1=temperature , 2= lumiere ,3 = securite)
			if ($donnees1['id_categorie_objets_connectes'] == 1)
			{
				//cette condition est ssentielle pour ne pas diviser par un denominateur plus grand que le numerateur ce qui fausserait la condtion suivante , de meme on ne divise pas par 0
				if ($donnees1['donnee_recue'] == $donnees1['donnee_demandee']){
					$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
					$requete -> execute(array('etat'=> 'fonctionne', 'id'=> $donnees1['id']));
				} else {
		
			        if ((($donnees1['seuil_erreur']+$donnees1['donnee_demandee'])/$donnees1['donnee_recue']) >1 and (($donnees1['donnee_demandee']-$donnees1['seuil_erreur'])/$donnees1['donnee_recue']) <1)
			        {

			        	$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
			        	$requete -> execute(array('etat'=> 'fonctionne', 'id'=> $donnees1['id']));	
			        	
			        }
		         	else
		         	{
		         		$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
		         		$requete -> execute(array('etat'=> 'dysfonctionnement', 'id'=> $donnees1['id']));
		         		$requete1 = $bdd ->prepare('SELECT * FROM obj_connectes WHERE id = :id');
		         		$requete1 -> execute(array('id' => $donnees1['id']));
		         		$etat[] = $requete1->fetch();
		         		
		         	}
				}
			}
			if ($donnees1['id_categorie_objets_connectes'] == 2)
			{
				//cette condition est ssentielle pour ne pas diviser par un denominateur plus grand que le numerateur ce qui fausserait la condtion suivante , de meme on ne divise pas par 0
				if ($donnees1['donnee_recue'] == $donnees1['donnee_demandee']){
					$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
					$requete -> execute(array('etat'=> 'fonctionne', 'id'=> $donnees1['id']));
				} else {
			
					if ((($donnees1['seuil_erreur']+$donnees1['donnee_demandee'])/$donnees1['donnee_recue']) >1 and (($donnees1['donnee_demandee']-$donnees1['seuil_erreur'])/$donnees1['donnee_recue']) <1)
					{
			
						$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
						$requete -> execute(array('etat'=> 'fonctionne', 'id'=> $donnees1['id']));
			
					}
					else
					{
						$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
						$requete -> execute(array('etat'=> 'dysfonctionnement', 'id'=> $donnees1['id']));
						$requete1 = $bdd ->prepare('SELECT * FROM obj_connectes WHERE id = :id');
						$requete1 -> execute(array('id' => $donnees1['id']));
						$etat[] = $requete1->fetch();
						 
					}
				}
			}if ($donnees1['id_categorie_objets_connectes'] == 3)
			{
				//cette condition est ssentielle pour ne pas diviser par un denominateur plus grand que le numerateur ce qui fausserait la condtion suivante , de meme on ne divise pas par 0
				if ($donnees1['donnee_recue'] == $donnees1['donnee_demandee']){
					$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
					$requete -> execute(array('etat'=> 'fonctionne', 'id'=> $donnees1['id']));
				} else {
		
			        if ((($donnees1['seuil_erreur']+$donnees1['donnee_demandee'])/$donnees1['donnee_recue']) >1 and (($donnees1['donnee_demandee']-$donnees1['seuil_erreur'])/$donnees1['donnee_recue']) <1)
			        {

			        	$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
			        	$requete -> execute(array('etat'=> 'fonctionne', 'id'=> $donnees1['id']));	
			        	
			        }
		         	else
		         	{
		         		$requete = $bdd -> prepare('UPDATE obj_connectes SET etat = :etat WHERE id = :id');
		         		$requete -> execute(array('etat'=> 'dysfonctionnement', 'id'=> $donnees1['id']));
		         		$requete1 = $bdd ->prepare('SELECT * FROM obj_connectes WHERE id = :id');
		         		$requete1 -> execute(array('id' => $donnees1['id']));
		         		$etat[] = $requete1->fetch();
		         		
		         	}
				}
			}
		}
		
	}
	return $etat;
	
}
?>