 <?php  
if(!isset($_GET['function']) || $_GET['function'] == '') {
	$function = "accueil";
} else {
	$function = $_GET['function'];
}

if($function == "accueil") {
	$content = "accueil";
	$title = "Accueil";
	
} elseif ($function == "connexion") {
	$content = "maintenance";
	$usertype=3;
	$alerte = false;
	if(isset($_POST['submit']))
	{
		$username= htmlspecialchars($_POST['username']);
		$password = md5($_POST['password']);
		
		if(!empty($username) AND !empty($password))
		{
			$userexist = verif_connexion($bdd,$username,$password);
			$userinfo = recup_connexion($bdd,$username,$password);
			if($userexist == 1 AND $userinfo['id_type_utilisateur'] == 3)
			{
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['username'] = $userinfo['username'];
				$_SESSION['password'] = $userinfo['password'];
				$_SESSION['id_type_utilisateur'] = $userinfo['id_type_utilisateur'];
				$_SESSION['mail'] = $userinfo['mail'];
				$_SESSION['nom'] = $userinfo['nom'];
				$_SESSION['prenom'] = $userinfo['prenom'];
				$_SESSION['naissance'] = $userinfo['naissance'];
				$_SESSION['adresse'] = $userinfo['adresse'];
				$_SESSION['ville'] = $userinfo[''];
				$_SESSION['postal'] = $userinfo['postal'];
				$_SESSION['tel'] = $userinfo['tel'];
				header("location: index.php?cible=maintenance&function=compte");
			}else{
				$alerte = "Mauvais pseudo ou mauvais mot de passe!";
			}
		}
	}
	
}elseif($function == "liste") { 
	$content = "liste";
	$title = "Liste des utilisateurs inscrits";
	$liste = selection($bdd, 'utilisateur','*','','');
	
} elseif ($function == 'messagerie') {
	$content = 'messagerie';
	
	// On cherche tout les chats qui existent
	$liste_chat = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
	if (isset($_GET['chat'])){
		//affiche la requete du client
		$titre_req= selection($bdd,'chat','requete','id',$_GET['chat']);
		$titre_req = $titre_req->fetch();
		//Si le formulaire pour rentrer un nv message est remplie
		if(!empty($_POST['message_chat'])){
			$id_createur = selection($bdd,'chat','id_createur','id',$_GET['chat']);
			$id_createur = $id_createur->fetch();
			
			$valeur = array('id_expediteur' => $_SESSION['id'], 'id_destinataire'=> $id_createur['id_createur'], 'id_chat'=> $_GET['chat'], 'message' => $_POST['message_chat'], 'date' => date('Y-m-d H:i:s'));
			$table ='chat_msg';
			$add = insertion($bdd,$valeur,$table);
			if ($add){
				$error = "Votre message a été envoyé !";
			}
		}else
		{
			$error = "Veuillez completer tous les champs!";
		}
	
	
		//affiche les messages
		$msg = $bdd->prepare('SELECT * FROM chat_msg WHERE id_chat = :id_chat ');
		$msg->execute(array('id_chat'=>$_GET['chat']));
	}
	
	


} elseif ($function == "boutique"){
	$content = 'boutique';

} elseif ($function == "compte"){
	$content = 'compte';
	$requser = selection($bdd, 'utilisateur', '*', 'id', $_SESSION['id']);
	$userinfo = $requser->fetch();

} elseif ($function == "forum") {
        $content = 'forum';
        
	
} elseif ($function == "contacter") {
	$content = 'contacter';
	
} elseif ($function == 'editprofil') {
	$requser = selection($bdd,'utilisateur','*','id',$_SESSION['id']);
	$user = $requser->fetch();
	include 'modele/edit_profil.php';
	if (isset($_POST['newusername'])){
		$edit=edit('username',$_POST['newusername']);
	}if (isset($_POST['newmail'])){
		$edit=edit('mail',$_POST['newmail']);
	}if (isset($_POST['newnom'])){
		$edit=edit('nom',$_POST['newnom']);
	}if (isset($_POST['newprenom'])){
		$edit=edit('prenom',$_POST['newprenom']);
	}if (isset($_POST['newnaissance'])){
		$edit=edit('naissance',$_POST['newnaissance']);
	}if (isset($_POST['newadresse'])){
		$edit=edit('adresse',$_POST['newadresse']);
	}if (isset($_POST['newville'])){
		$edit=edit('ville',$_POST['newville']);
	}if (isset($_POST['newpostal'])){
		$edit=edit('postal',$_POST['newpostal']);
	}if (isset($_POST['newtel'])){
		$edit=edit('tel',$_POST['newtel']);
	}if (!empty($_POST['password'])) {
		$verif = verif_mdp($_POST['password']);
		if (isset($_POST['newpassword']) AND isset($_POST['newpassword2']) AND $_POST['newpassword'] == $_POST['newpassword2'] AND $verif == 'ok') {
			$_POST['newpassword'] = md5($_POST['newpassword']);
			$edit = edit('password', $_POST['newpassword']);
		} elseif ($_POST['newpassword'] != $_POST['newpassword2']){
			$erreur = 'Les deux mots de passes sont differents';
		} elseif ($verif != 'ok'){
			$erreur = $verif ;
		}
	}
	if (isset($_POST['submit']) AND !isset($erreur)){
		header('Location: index.php?cible=maintenance&function=compte');
	}
	$content = 'editprofil';
	
} elseif ($function == 'gerer_compte') {
	$content = 'gerer_compte';
	
} elseif ($function == "cgu"){
	$content = 'cgu';

} elseif($function == "ajout_client"){
	$content = 'ajout_client';
	$rand = '';
	
	if (isset($_POST['submit']) AND isset($_POST['check'])){
		$_POST['adresse'] = htmlspecialchars($_POST['adresse']);
		$_POST['postal'] = htmlspecialchars($_POST['postal']);
		$_POST['ville'] = htmlspecialchars($_POST['ville']);
		
		//Genere un code unique et aleatoire de 5 caract�es qu'on donnera au client
		$rand = openssl_random_pseudo_bytes(5);
		$rand = substr(bin2hex($rand ), 0, 5);
		
		//Hash le code pour le proteger puis on le met dans la bdd
		$code = md5($rand);
		//Enregistrement de la maison dans la bdd 
		$values = array('adresse' => $_POST['adresse'],
						'postal' => $_POST['postal'],
						'ville' => $_POST['ville'],
						'code_client' => $code,
						'id_type_maison'=> 2);
		$table = 'maison';
		$retour = insertion($bdd,$values,$table);
		$last_id= $bdd->lastInsertId(); /*Recupere le dernier id inseré*/
		
		//Pour chaque pi�ce choisie, elle est associé a la maison qui vient d'etre inserer
		
		foreach ($_POST['check'] as $element) 
		{
			$values = array('nom'=> $element, 'id_maison'=>$last_id);
			$table ='pieces';
			$stm = insertion($bdd,$values,$table);
		}
		
	} elseif(isset($_POST['submit']) AND !isset($_POST['check'])) {
		$alerte = 'Veuillez completer tous les champs!';
	}
		
	
} elseif($function == "nb_capteur") {
        $content = "ajout_capteur";
     include("modele/obj_connectes.php");
        
        
        $id=$_GET['id'];
        

		$req1 = $bdd->query("SELECT pieces.id_maison  FROM pieces JOIN utilisateurs_maison ON utilisateurs_maison.id_maison=pieces.id_maison  WHERE '".$id."'=id_utilisateurs" );
		while ($req=$req1->fetch()){
			if (isset($req['id_maison'])){
				$maison=$req['id_maison'];
		}}
		
    	
		
			$liste_obj=liste_obj('global','global',$maison);
        
			

} elseif($function == "ajout_capteur") {
       				$content = "ajt_cap";
       				$maison=$_GET['maison'];
       				



       				if (isset($_POST['ajouter'])){
        				$nom=$_POST['nom_cap'];
        				$id_p=$_POST['piece'];
        			
        				$code=$_POST['id_cap'];
        				if (!isset($id_p)){
        					$alerte5 = 'Pour ajouter un capteur il faut d\'abord ajouter une pi�ce';
        				}
        				$query = $bdd->prepare('SELECT count(*) as nb FROM obj_connectes JOIN pieces ON pieces.id=obj_connectes.id_piece  WHERE obj_connectes.nom  =? and pieces.id_maison =  ?');
        				$query->execute(array($_POST['nom_cap'],$maison));
        		 	

            			$requete = $query->fetch(); // on parcours ligne par ligne l'ensemble de la base donnée
            			if (isset($requete['nb']) && $requete['nb'] != 0) 
            			{
                		$alerte1 = 'Ce nom de capteur a déj&agrave; été utilisé';
               			
            			} 
            		

            		
            			else {
            			$code=$_POST['id_cap'];
            			$query =$bdd->prepare( 'SELECT count(*) as nb FROM obj_connectes JOIN pieces ON pieces.id=obj_connectes.id_piece  WHERE obj_connectes.code= ? and pieces.id_maison=? ');
            		 	$query->execute(array($code,$maison)); 
            			$requete = $query->fetch(); // on parcours ligne par ligne l'ensemble de la base donnée
            				if (isset($requete['nb']) && $requete['nb'] !=0) 
            				{
                				$alerte2 = 'Ce capteur a déja été rentré. ';
               					
            				} 
            			$query2 =$bdd->prepare( 'SELECT id FROM obj_connectes WHERE code = ? ');
            		 	$query2->execute(array($code)); 
            			$requete2 = $query2->fetch(); // on parcours ligne par ligne l'ensemble de la base donnée
            				if (!isset($requete2['id'])){
            					$alerte3 = 'Code non valide';
               					
            				}
            			$query4 =$bdd->prepare('SELECT id_piece FROM obj_connectes WHERE code= ? ');
            			$query4->execute(array($code)); 
            			$requete4 = $query4->fetch();		
            				if ($requete4['id_piece']!=0){
            					$alerte4 = 'Ce capteur n\'est pas disponible';
               			
            				}
            				if ($requete4['id_piece'] == 0  and isset($requete2['id'])) {
            					
            								
		            						$nom = htmlspecialchars($_POST['nom_cap']);
		            						$code = htmlspecialchars($_POST['id_cap']);
		            						$id_p=htmlspecialchars($_POST['piece']);

				                		
				                		
				                		$query3 = $bdd->prepare('UPDATE obj_connectes SET nom = :nom , id_piece = :id_piece WHERE code = :code');
										
										$query3 ->execute(array(
										'nom' => $nom,
										'id_piece' => $id_p,
										'code' => $code));
										echo 'Ajout du capteur effectué';

				                		include("modele/obj_connectes.php");
				                		
				                			
				                			$req1 = selection($bdd, 'pieces', 'id', 'id_maison', $maison);
				                			$liste_obj=liste_obj('global','global',$maison);
				                			$content="ajout_capteur";
		        		 			}
        				}
        			}
}		
	



include('vues/' . $content . '.php');

?>