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
	if(isset($_POST['envoi']))
	{
		if(isset($_POST['destinataire'], $_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])){ //si les champs sont complétés.
			$destinataire = htmlspecialchars($_POST['destinataire']);
			$message = htmlspecialchars($_POST['message']);
			$date = date('Y-m-d H:i:s');
			//recuperer l'id du destinataire
			$id_destinataire = $bdd->prepare('SELECT id FROM utilisateur WHERE username = ?');
			$id_destinataire->execute(array($destinataire));
			$destinataire_exist = $id_destinataire->rowCount();
			//verifie si le destintaire existe dans la base de donnée, action sécurité.
			if ($destinataire_exist ==  1){
				$id_destinataire = $id_destinataire->fetch();
				$id_destinataire = $id_destinataire['id'];
				//envoyer le message, inserer dans la base de données "chat".
				$values = array('message' => $message, 'id_destinataire' => $id_destinataire, 'id_expediteur' => $_SESSION['id'], 'date' => $date, 'requette'=>$requette );
				$table = 'chat';
				$retour = insertion($bdd, $values, $table);
				if ($retour){
					$error = "Votre message a été envoyé";
				}
			}else{
				$error = "Cet utilisateur n'existe pas!";
			}
		}else{
			$error = "Veuillez completer tous les champs!";
		}
	}
	//met dans l'ordre les destinataires
	$destinataire = $bdd->query('SELECT username FROM utilisateur ORDER BY username');
	//affiche les messages
	$msg = $bdd->prepare('SELECT * FROM chat WHERE id_destinataire = ? ORDER BY id DESC');
	$msg->execute(array($_SESSION['id']));


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
	if (isset($_POST['submit'])){
		$_POST['adresse'] = htmlspecialchars($_POST['adresse']);
		$_POST['postal'] = htmlspecialchars($_POST['postal']);
		$_POST['ville'] = htmlspecialchars($_POST['ville']);
		//Enregistrement de la maison dans la bdd 
		$values = array('adresse' => $_POST['adresse'],
						'postal' => $_POST['postal'],
						'ville' => $_POST['ville'],
						'id_type_maison'=> 2);
		$table = 'maison';
		$retour = insertion($bdd,$values,$table);
		$last_id= $bdd->lastInsertId(); /*Recupere le dernier id inser�*/
	
		//Genere un code unique et aleatoire de 5 caract�es qu'on donnera au client
		$rand = openssl_random_pseudo_bytes(5);
		$rand = substr(bin2hex($rand ), 0, 5);
	
		//Hash le code pour le proteger puis on le met dans la bdd
		$code = md5($rand);
		//Relier le code client a la maison inscrit
		$values = array('code_client' => $code,
						'id_maison' => $last_id);
		$table = 'code_client';
		$retour1 = insertion($bdd,$values,$table);
	
	}
    


}


include('vues/' . $content . '.php');

?>