<?php

if(!isset($_GET['function']) || $_GET['function'] == '') {
    $function = "accueil";
} else {
    $function = $_GET['function'];
}

	if($function == "accueil") {
		$content = "accueil";
		$title = "Accueil";
        
    } elseif($function == "inscription") {
        $content = "inscription";
                $alerte = false;
        // Si l'utilisateur ne rentre pas le même mdp dans la case "Confirmation du mdp"
        if (isset ($_POST['password']) AND isset($_POST['password_verif']) AND $_POST['password'] != $_POST['password_verif']) { 
                $alerte = 'Les deux mots de passes entrés sont différents';
            }        
        
        if (isset($_POST['username']) AND isset($_POST['password']) AND ($_POST['password_verif'] == $_POST['password']) AND isset($_POST['mail']) AND isset($_POST['code'])) {

            $username = htmlspecialchars($_POST['username']);
            $password = md5($_POST['password']);
            $password_verif = md5($_POST['password_verif']);
            $mail = htmlspecialchars($_POST['mail']);
            $code = md5($_POST['code']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $naissance = htmlspecialchars($_POST['naissance']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $ville = htmlspecialchars($_POST['ville']);
            $postal = htmlspecialchars($_POST['postal']);
            $tel = htmlspecialchars($_POST['tel']);
            $date = date('Y-m-d');

            if (isset ($_GET['type']) AND $_GET['type'] == 'secondaire') { //pour preciser que l'utilisateur est secondaire
                $usertype=2 ;
                $id_principal=$_SESSION['id'];
                $_GET['type'] = htmlspecialchars($_GET['type']);
            }
             elseif (!isset ($_GET['type']) ) { // a la base, l'utilisateur est consideré comme principale 
                  $usertype=1 ;
                  $id_principal=0;
              }

            // On verifie que le pseudo n'est pas deja utilisé
            $req = selection($bdd,'utilisateur','count(*) as nb','username', $username);
            $requete = $req-> fetch();
            // On verifie que le code client est valide/existe
            $requser = selection($bdd,'code_client', '*','code_client',$code);
            $userexist = $requser->rowCount();
            
            if (isset($requete['nb']) && $requete['nb'] != 0) { // Si le pseudo existe deja 
                $alerte = 'Ce pseudo est deja utilisé';
            } elseif($userexist == 0) { //Si le code rentré n'existe pas, afficher message d'erreur
    
                $alerte = 'Ce code n\'est pas valide ';
            }
            else { // Si le pseudi est unique, l'user peut s'inscrire  
            $values = array('username' => $username, 'password' => $password, 'mail' => $mail, 'nom' => $nom, 'prenom' => $prenom, 'naissance' => $naissance, 'adresse' => $adresse, 'ville' => $ville, 'postal' => $postal, 'tel' => $tel, 'id_type_utilisateur' => $usertype,'id_principal'=> $id_principal, 'date_inscription'=>$date);
            $table = 'utilisateur';
            $retour = insertion($bdd, $values, $table);
            
           
            if ($retour AND $usertype==2){
                // On indique que le compte secondaire est relier à cette maison 
                $req= selection($bdd,'code_client', 'id_maison', 'code_client', $code);
                $maison=$req->fetch();
                $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE  username = :username AND password = :password");
                $requser->execute(array('username'=>$username, 'password'=> $password));
                $userinfo = $requser->fetch();
                $values = array('id_utilisateurs'=>$userinfo['id'], 'id_maison'=> $maison['id_maison']);
                $table = 'utilisateurs_maison';
                $req1 = insertion($bdd,$values,$table);
                header("location: index.php?cible=users&function=compte");
            }
            elseif($retour AND $usertype==1 ) {
                $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE  username = :username AND password = :password");
                $requser->execute(array('username'=>$username, 'password'=> $password));
                $userinfo = $requser->fetch();
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
                $req= selection($bdd,'code_client', 'id_maison', 'code_client', $code);
                $maison=$req->fetch();
                $values = array('id_utilisateurs'=>$_SESSION['id'], 'id_maison'=> $maison['id_maison']);
                $table = 'utilisateurs_maison';
                $req1 = insertion($bdd,$values,$table); /*Insert une entré dans la table utilisateurs_maison. Maintenant, l'utilisateur inscript a une maison qui lui est affecté */
                $_SESSION['maison'] =$maison['id_maison'];
                

                
                header("location: index.php?cible=users&function=compte");
            } elseif (!$retour) {
                $alerte = "L'inscription dans la BDD n'a pas fonctionné";
            } }
        }
        $title = "Inscription";





    } elseif($function == "connexion") {
    	$content = "connexion";
    	$alerte = false;
    	if(isset($_POST['submit']))
        {
        	$username= htmlspecialchars($_POST['username']);
            $password = md5($_POST['password']);
            if(!empty($username) AND !empty($password))
            {
            	$userexist = verif_connexion($bdd,$username,$password);
                if($userexist == 1)
                {
                	$userinfo = recup_connexion($bdd,$username,$password);
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
                	$req= selection($bdd,'utilisateurs_maison', 'id_maison', 'id_utilisateurs', $_SESSION['id']);
                	$maison=$req->fetch();
                	$_SESSION['maison'] =$maison['id_maison'];
                	header("location: index.php?cible=users&function=compte");
                } else{
                	$alerte = "Mauvais pseudo ou mauvais mot de passe!";
                }
            } else{
            	$alerte = "Veuillez remplir tous les champs";
            }
        }
        $title = "connexion";
        
    } elseif($function == "deconnexion") {
    	$content = "connexion";
    	$function="connexion";
    	$alerte = false;
    	$_SESSION = array();
    	if (isset($_COOKIE[session_name()])) {
    		setcookie(session_name(), '', time() - 42000, '/');
    	}
    	session_destroy();
    	setcookie('username', '');
    	setcookie('password', '');
    	header("location: index.php?cible=users&function=connexion");

     } elseif ($function == 'messagerie') {
     	$content = 'messagerie';
     	if(isset($_POST['envoi'])){
     		if(isset($_POST['message']) AND isset($_POST['requette']) AND !empty($_POST['message'])){ //si les champs sont complétés.
     			$message = htmlspecialchars($_POST['message']);
                $requette = htmlspecialchars($_POST['requette']);
                $date = date('Y-m-d H:i:s');
                //recuperer l'id du destinataire
                $id_destinataire = $bdd->prepare('SELECT id FROM utilisateur WHERE id = 83');
                $id_destinataire->execute(array('id'));
                $id_destinataire = $id_destinataire->fetch();
                $id_destinataire = $id_destinataire['id'];
                
                //envoyer le message, inserer dans la base de données "chat" en mvc.
                $values = array('message' => $message, 'id_destinataire' => $id_destinataire, 'id_expediteur' => $_SESSION['id'], 'requette' => $requette, 'date' => $date);
                $table = 'chat';
                $retour = insertion($bdd, $values, $table);
                if ($retour){
                	$error = "Votre message a été envoyé !";
                }
             }else
             {
             	$error = "Veuillez completer tous les champs!";
             }
     	}//affiche les messages
     	$msg = $bdd->prepare('SELECT * FROM chat WHERE id_destinataire = ? ORDER BY id DESC');
        $msg->execute(array($_SESSION['id']));

                

   
    } elseif ($function == "maintenance"){
        $content = 'maintenance';
        
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
        	header('Location: index.php?cible=users&function=compte');
        }
        $content = 'editprofil';
    } elseif ($function == "cgu"){
        $content = 'cgu';
        
    } elseif ($function == 'gerer_compte') {
        $content = 'gerer_compte';
        
        if (isset($_POST['secondaire'])){
            foreach ($_POST['a'] as $element) {
                $requete3 = $bdd->prepare('UPDATE utilisateur SET id_type_utilisateur=2 WHERE id=:id');
                $requete3->execute(array('id'=>$element));  
            }
        } elseif (isset($_POST['principal'])){
            foreach ($_POST['a'] as $element) {
                $requete3 = $bdd->prepare('UPDATE utilisateur SET id_type_utilisateur=1 WHERE id=:id');
                $requete3->execute(array('id'=>$element)); 
            } 
        }
        $requete2 = selection($bdd,'utilisateur','id, username, id_type_utilisateur', 'id_principal', $_SESSION['id']);
		
		
        
    } elseif ($function == 'forum_addsuj'){
        $content = 'forum_addsuj';
        
    } elseif ($function == 'pilotage') {
    	include 'modele/obj_connectes.php';
    	$_GET['piece'] = htmlspecialchars($_GET['piece']);
    	$content = 'pilotage';
    	
    	//Si remplit le formulaire pour regler la temperature
    	if (isset($_POST['submittemp'])){
    		$req = voulu(1,$_GET['piece'], $_POST['temp1']);
    	}
    	
    	$moyenne = moyenne(1,$_GET['piece']);
    	
    	
        $liste_obj = liste_obj(2,$_GET['piece']);
        // contrôle de la lumière
        if (isset($_POST['check2'])){
        	$req2 = $bdd->prepare("UPDATE obj_connectes SET  `donnee_recue`= 1 WHERE `id_categorie_objets_connectes`=2");
        	$req2->execute();
        }elseif(!isset($_POST['check2'])) {
        	$req2 = $bdd->prepare("UPDATE obj_connectes SET  `donnee_recue`= 0 WHERE `id_categorie_objets_connectes`=2");
        	$req2->execute(); }
        //  contrôle de la sécurité
        if (isset($_POST['check3'])){
        	$req2 = $bdd->prepare("UPDATE obj_connectes SET  `donnee_recue`= 1 WHERE `id_categorie_objets_connectes`=3");
        	$req2->execute();
        }elseif(!isset($_POST['check3'])) {
        	$req2 = $bdd->prepare("UPDATE obj_connectes SET  `donnee_recue`= 0 WHERE `id_categorie_objets_connectes`=3");
        	$req2->execute(); 
        }
        
        $req = selection($bdd,'obj_connectes','donnee_recue', '`id_categorie_objets_connectes`',1);
        $temperature= $req->fetch();
        $req1 = selection($bdd,'obj_connectes','donnee_recue', '`id_categorie_objets_connectes`',2);
        $lumiere= $req1->fetch();
        $req1 = selection($bdd,'obj_connectes','donnee_recue', '`id_categorie_objets_connectes`',3);
        $securite= $req1->fetch();
        
    }elseif($function == 'config'){
    	$content = 'config';
    	//Si une pi�ce a �t� choisie, on l'insert dans la bdd
    	if (isset($_POST['choix']) AND isset($_POST['enregistrer'])){
    		$values = array('nom'=> $_POST['choix'], 'id_maison'=>$_SESSION['maison']);
    		$table ='pieces';
    		$stm = insertion($bdd,$values,$table);
    		
	    } //Si un nouveau nom a �t� donn� a la pi�ce, on l'insert dans la bdd 
	    elseif (!empty($_POST['renommer'])){
    		$nom= htmlspecialchars($_POST['renommer']);
    		$values = array('nom'=> $nom, 'id_maison'=>$_SESSION['maison']);
    		$table ='pieces';
    		$stm = insertion($bdd,$values,$table);
	    }
	    $nombre = selection($bdd,'pieces','count(*) as nb', 'id_maison', $_SESSION['maison']);
    	$req = $nombre -> fetch();
	    	
    	

        
        
    

   
    
        
    } else {
        $content = "error404";
    }
    


include('vues/' . $content . '.php');

