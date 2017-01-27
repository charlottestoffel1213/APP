<?php
try
{
   $bdd = new PDO ('mysql:host=127.0.0.1; dbname=leanon','root','');
}
  catch(PDOException $e)
{
   die('Erreur : '.$e->getMessage());
}

?>

<html>
<form action="" method="POST" >
<input type="submit" name="submit" value="MODE JOUR">
</form>
</html>

<?php
/*if(isset($_SESSION['id']))*/

		if(isset($_POST['submit']))
		{
			$tempN = $bdd->query('SELECT temperature FROM mode_obj WHERE id = 2 ');
			$requete1 = $tempN -> fetch();
			echo $requete1[0] . ' et ' ;
      		
      		// $req1 = value();

			$lumN = $bdd->query('SELECT luminosite FROM mode_obj WHERE id= 2');
			$requete2 = $lumN->fetch();
			echo $requete2[0] . ' et ';

			$secuN = $bdd->query('SELECT securite FROM mode_obj WHERE id= 2');
			$requete3 = $secuN->fetch();
			// Ceci nous permet d'aller chercher les valeurs des modes dérsirés dans la base de donnée

			echo $requete3[0] . ' et ';

			$query = $bdd->query('SELECT id_maison FROM utilisateurs_maison WHERE id_utilisateurs = 33 '/* $_SESSION['id']*/);
			$reponse = $query->fetch();
			// Permet de trouver l'id de la maison en fonction de l'utilisateur connecté 
			echo $reponse[0] . ' et ' ; 

			$query2 = $bdd->prepare('SELECT id FROM pieces WHERE id_maison = :maison ');
			$query2->execute(array('maison'=>$reponse[0] /* $SESSION['maison']*/));
			// On peut directement avoir l'id de la maison en utilisant la commande $SESSION['maison']
			

			while($reponse2 = $query2->fetch()){

				echo $reponse2['id'] . ' , ';
			
				$modif1 = $bdd->prepare('UPDATE obj_connectes SET donnee_demandee = :donnee1 WHERE id_categorie_objets_connectes = 1 AND id_piece = :piece1 ');
				$modif1->execute(array('donnee1'=>$requete1[0], 'piece1'=> $reponse2['id']));

				$modif2 = $bdd->prepare('UPDATE obj_connectes SET donnee_demandee = :donnee2 WHERE id_categorie_objets_connectes = 2 AND id_piece = :piece2');
				$modif2->execute(array('donnee2'=>$requete2[0],'piece2'=>$reponse2['id']));

				$modif3 = $bdd->prepare('UPDATE obj_connectes SET donnee_demandee = :donnee3 WHERE id_categorie_objets_connectes = 3 AND id_piece = :piece3');
				$modif3->execute(array('donnee3'=>$requete3[0], 'piece3'=>$reponse2['id']));
			}


				
			
    	}

?>