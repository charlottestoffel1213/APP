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
        
        if (isset($_POST['username']) AND isset($_POST['password']) AND ($_POST['password_verif'] == $_POST['password']) AND isset($_POST['mail'])) {

            $username = htmlspecialchars($_POST['username']);
            $password = md5($_POST['password']);
            $password_verif = md5($_POST['password_verif']);
            $mail = htmlspecialchars($_POST['mail']);
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
                  $code = md5($_POST['code']);
                  // On verifie que le code client est valide/existe
                  $requser = selection($bdd,'maison', 'code_client','code_client',$code);
                  $userexist = $requser->rowCount();
              }

            // On verifie que le pseudo n'est pas deja utilisé
            $req = selection($bdd,'utilisateur','count(*) as nb','username', $username);
            $requete = $req-> fetch();
            
            
            if (isset($requete['nb']) && $requete['nb'] != 0) { // Si le pseudo existe deja 
                $alerte = 'Ce pseudo est deja utilisé';
            }elseif (filter_var($mail, FILTER_VALIDATE_EMAIL) == FALSE) {
            	$alerte = 'Cette adresse email n\'est pas valide ';
            } elseif(!isset($_GET['type']) AND $userexist == 0) { //Si le code rentré n'existe pas, afficher message d'erreur
    
                $alerte = 'Ce code n\'est pas valide ';
           
            }
            else { // Si le pseudi est unique, l'user peut s'inscrire  
            $values = array('username' => $username, 'password' => $password, 'mail' => $mail, 'nom' => $nom, 'prenom' => $prenom, 'naissance' => $naissance, 'adresse' => $adresse, 'ville' => $ville, 'postal' => $postal, 'tel' => $tel, 'id_type_utilisateur' => $usertype,'id_principal'=> $id_principal, 'date_inscription'=>$date);
            $table = 'utilisateur';
            $retour = insertion($bdd, $values, $table);
            
           
            if ($retour AND $usertype==2){
                
                $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE  username = :username AND password = :password");
                $requser->execute(array('username'=>$username, 'password'=> $password));
                $userinfo = $requser->fetch();
                $values = array('id_utilisateurs'=>$userinfo['id'], 'id_maison'=> $_SESSION['maison']);
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
                $_SESSION['ville'] = $userinfo['ville'];
                $_SESSION['postal'] = $userinfo['postal'];
                $_SESSION['tel'] = $userinfo['tel'];
                $req= selection($bdd,'maison', 'id', 'code_client', $code);
                $maison=$req->fetch();
                $values = array('id_utilisateurs'=>$_SESSION['id'], 'id_maison'=> $maison['id']);
                $table = 'utilisateurs_maison';
                $req1 = insertion($bdd,$values,$table); /*Insert une entré dans la table utilisateurs_maison. Maintenant, l'utilisateur inscript a une maison qui lui est affecté */
                $_SESSION['maison'] =$maison['id'];
                

                
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
     		if(isset($_POST['message']) AND isset($_POST['requete']) AND !empty($_POST['message'])){ //si les champs sont complétés.
     			$message = htmlspecialchars($_POST['message']);
                $requette = htmlspecialchars($_POST['requete']);
                $date = date('Y-m-d H:i:s');
                //recuperer l'id du destinataire(la maintenance)
                $id_destinataire = $bdd->prepare('SELECT id FROM utilisateur WHERE id = 83');
                $id_destinataire->execute(array('id'));
                $id_destinataire = $id_destinataire->fetch();
                $id_destinataire = $id_destinataire['id'];
                //Creation du chat 
                $values = array('requete' => $requette,'id_createur' => $_SESSION['id']);
                $table = 'chat';
                $requ = insertion($bdd,$values,$table);
                $id_chat= $bdd->lastInsertId(); /*Recupere le dernier id inser�*/
                //envoyer le message, inserer dans la base de données "chat".
                $values = array('message' => $message, 'id_destinataire' => $id_destinataire, 'id_expediteur' => $_SESSION['id'], 'id_chat' => $id_chat, 'date' => $date);
                $table = 'chat_msg';
                $retour = insertion($bdd, $values, $table);
                if ($retour AND $requ){
                	$error = "Votre message a été envoyé !";
                }
             }else
             {
             	$error = "Veuillez completer tous les champs!";
             }
     	}

     	// On cherche les chats cr�er par l'utilisateur
     	$liste_chat = $bdd->prepare('SELECT * FROM chat WHERE id_createur = :id ORDER BY id DESC');
     	$liste_chat -> execute(array('id'=> $_SESSION['id'])); 
     	if (isset($_GET['chat'])){

     		//affiche la requete du client
     		$titre_req= selection($bdd,'chat','requete','id',$_GET['chat']);
     		$titre_req = $titre_req->fetch();
     		//Si le formulaire pour rentrer un nv message est remplie
     		if(!empty($_POST['message_chat'])){
     			$valeur = array('id_expediteur' => $_SESSION['id'], 'id_destinataire'=> 83, 'id_chat'=> $_GET['chat'], 'message' => $_POST['message_chat'], 'date' => date('Y-m-d H:i:s'));
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
     		 
     		
     	

                

   
    } elseif ($function == "maintenance"){
        $content = 'maintenance';
        
    } elseif ($function == "boutique"){
        $content = 'boutique';
        
    } elseif ($function == "compte"){
        $content = 'compte';
        $requser = selection($bdd, 'utilisateur', '*', 'id', $_SESSION['id']);
        $userinfo = $requser->fetch();
        
    
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
		
		
    } elseif ($function == "forum") {
        $content = 'forum';
        include 'modele/forum_addmessage.class.php';
        if (isset($_GET['categorie'])){
	        $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
	        // On selectionne les infos dans la bdd sur la catégorie selectionnée car on veut l'id
	        $requete2= selection($bdd, 'categorie_forum','*','nom_forum', $_GET['categorie']);
	        $categorie= $requete2->fetch();
	        
	        // On cherche les sujets provenants de la même categorie
	        $req = selection($bdd, 'sujet_du_forum','*', 'id_categorie', $categorie['id']);
        }if (isset($_GET['sujet'])){
	        $_GET['sujet'] = htmlspecialchars($_GET['sujet']);
	        //Si le formulaire pour rentrer un nv message est remplie
	        if(isset($_POST['name']) AND isset($_POST['message'])){
	        	$addmessage = new addmessage($_POST['name'],$_POST['message'],$bdd); // Alors on utilise la class addmessage
	        	$verif=$addmessage->verif();
	        	if ($verif =='ok'){
	        		if($addmessage->insert()){}
	        	}
	        	else {
	        		$erreur=$verif;
	        	}
	        }
	        

	        // On selectionne les infos dans la bdd sur le sujet selectionné car on veut l'id
	        $req= $bdd-> prepare('SELECT * FROM sujet_du_forum WHERE nom = :sujet');
	        $req->execute(array('sujet'=>$_GET['sujet']));
	        $sujet = $req->fetch();
	        
	        // On selectionne tout les messages de ce sujet
	        $requete2= selection($bdd, 'messages', '*', 'id_sujet_du_forum', $sujet['id']);
	        

	        
        } 
		// Selection toute les cat�gories qui existe (pour la page d'accueil du forum)
        $requete= selection($bdd,'categorie_forum','*','','');
    
    } elseif ($function == 'forum_addsuj'){
        $content = 'forum_addsuj';
        include "modele/forum_addsuj.class.php";
        //Si le formulaire est remplie
        if(isset($_POST['name']) AND isset($_POST['sujet'])){
        	// Alors on utilise la class addsuj
        	$addsuj = new addsuj($_POST['name'],$_POST['sujet'],$_POST['categorie']);
        	$verif=$addsuj->verif();
        	if ($verif =='ok'){
        		if($addsuj->insert()){
        			header('Location: index.php?cible=users&function=forum&sujet='.$_POST['name']);
        		}
        	}
        	else {
        		$erreur=$verif;
        	}
        }
        
        
    } elseif ($function == 'pilotage') {
    	include 'modele/obj_connectes.php';
    	$_GET['piece'] = htmlspecialchars($_GET['piece']);
    	$content = 'pilotage';
    	
    	//Si remplit le formulaire pour regler la temperature
    	if (isset($_POST['submittemp'])){
    		$req = voulu(1,$_GET['piece'], $_POST['temp1']);
    	}
    	$moyenne_humi = moyenne(4,$_GET['piece']) . ' %';
    	$moyenne = moyenne(1,$_GET['piece']) . ' C°';
    	$tempactuelle = (float) $moyenne;
    	
    	//controle lumiere par piece
    	
    	if (isset($_POST['Desactiver_lumiere'])) {
    		$Activation_lumiere = 0;
    		$req=voulu(2,$_GET['piece'], $Activation_lumiere);
    	}
    	
    	
    	if (isset($_POST['Activer_lumiere'])) {
    		$Activation_lumiere = 1;
    		$req=voulu(2,$_GET['piece'], $Activation_lumiere);
    	}
    	
    	//controle securite par piece
    	
    	if (isset($_POST['Desactiver_securite'])) {
    		$Activation_securite = 0;
    		$req=voulu(3,$_GET['piece'], $Activation_securite);
    	}
    	
    	if (isset($_POST['Activer_securite'])) {
    		$Activation_securite = 1;
    		$req=voulu(3,$_GET['piece'], $Activation_securite);
    	}
    	 
    	
    	// Liste des capteurs de chaque piece 
        $liste_obj_lum = liste_obj(2,$_GET['piece'],$_SESSION['maison']);
        $liste_obj_secu = liste_obj(3,$_GET['piece'],$_SESSION['maison']);
    	
        // controle de chaque lumiere de la piece 
        if (isset($_POST['submit_lum'])){
        	//On genere la liste des obj_lum de la salle
        	$liste_obj_lum = liste_obj(2,$_GET['piece'],$_SESSION['maison']);
        	//On met automatiquement toute les lumieres eteintes
        	foreach ($liste_obj_lum as $obj){
        		$requete3 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donne WHERE id=:id');
        		$requete3->execute(array('donne'=> 0 ,'id'=>$obj['id']));
        	}
        	// Si un des obj est coch�, on lui affecte 1 
	        if (isset($_POST['check2'])){
	        	foreach ($_POST['check2'] as $element) {
	        		$requete3 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donne WHERE id=:id');
	        		$requete3->execute(array('donne'=> 1 ,'id'=>$element));
	        	}
	        }
	        
        }
        
        // controle de chaque obj_secu de la piece 
        if (isset($_POST['submit_secu'])){
        	//On genere la liste des obj_lum de la salle
        	$liste_obj_secu = liste_obj(3,$_GET['piece'],$_SESSION['maison']);
        	//On met automatiquement toute les lumieres eteintes
        	foreach ($liste_obj_secu as $obj){
        		$requete3 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donne WHERE id=:id');
        		$requete3->execute(array('donne'=> 0 ,'id'=>$obj['id']));
        	}
        	// Si un des obj est coch�, on lui affecte 1
        	if (isset($_POST['check3'])){
        		foreach ($_POST['check3'] as $element) {
        			$requete3 = $bdd->prepare('UPDATE obj_connectes SET donnee_recue = :donne WHERE id=:id');
        			$requete3->execute(array('donne'=> 1 ,'id'=>$element));
        		}
        	}
        	 
        }
        $req = selection($bdd,'obj_connectes','donnee_recue', '`id_categorie_objets_connectes`',1);
        $temperature= $req->fetch();
        $req1 = selection($bdd,'obj_connectes','donnee_recue', '`id_categorie_objets_connectes`',2);
        $lumiere= $req1->fetch();
        $req1 = selection($bdd,'obj_connectes','donnee_recue', '`id_categorie_objets_connectes`',3);
        $securite= $req1->fetch();
        

        $detection_lum = detection(1,2,$_GET['piece']);
        $detection_secu = detection(0,3,$_GET['piece']);
        
    } elseif($function == "mode") {
        $content = "mode";
        include 'modele/mode.php';

        if (isset($_POST['modif_mode']) AND isset($_POST['ancien_mode'])){
        	$nom=htmlspecialchars($_POST['ancien_mode']);
        	$newnom=htmlspecialchars($_POST['nom_mode_modif']);
        	$temp=htmlspecialchars($_POST['temp_modif']);
        	if (!isset($_POST['secu_modif'])){
        		$secu = 0 ;
        	}else {
        		$secu = htmlspecialchars($_POST['secu_modif']);
        	}
        	if (!isset($_POST['lum_modif'])){
        		$lum = 0 ;
        	}else {
        		$lum = htmlspecialchars($_POST['lum_modif']);
        	}
        	 
        	$modif=modifier_mode($newnom,$temp,$lum,$secu,$nom);
        }
        if (isset($_POST['mode_nuit'])) {
        	$activer = activer_mode(1);
        	$alerte='Mode nuit activé';
        }
        if (isset($_POST['mode_jour'])) {
        	$activer = activer_mode(2);
        	$alerte='Mode jour activé';
        }

        if (isset($_POST['ajout'])) {
        	$nom = htmlspecialchars($_POST['nom_mode']);
        	$temperature = htmlspecialchars($_POST['temp']);
        	if (!isset($_POST['secu'])){
        		$securite = 0 ;
        	}else {
        		$securite = htmlspecialchars($_POST['secu']);
        	}
        	if (!isset($_POST['lum'])){
        		$luminosite = 0 ;
        	}else {
        		$luminosite = htmlspecialchars($_POST['lum']);
        	}
        	$valeur = array('nom_mode'=> $nom,'temperature'=>$temperature, 
        			'luminosite'=> $luminosite, 'securite'=> $securite, 'id_maison'=>$_SESSION['maison']);
        	$table='mode_obj';
        	$ajouter = insertion($bdd,$valeur,$table);
        }
        $requete = selection($bdd,'mode_obj','*','id_maison',$_SESSION['maison']);
        if (isset($_POST['mode_perso'])){
        	$id_mode = selection($bdd,'mode_obj','id','nom_mode',$_POST['mode_perso']);
        	$id_mode = $id_mode->fetch();
        	$activer = activer_mode($id_mode['id']);
        	$alerte= $_POST['mode_perso'] .' activé';
        }
        
    }elseif($function == 'config'){
    	$content = 'config';
    	//Si une pi�ce a �t� choisie, on l'insert dans la bdd
    	if (isset($_POST['check']) AND isset($_POST['enregistrer'])){
    		foreach ($_POST['check'] as $element)
    		{
    			$values = array('nom'=> $element, 'id_maison'=>$_SESSION['maison']);
    			$table ='pieces';
    			$stm = insertion($bdd,$values,$table);
    		}
    		
	    } //Si un nouveau nom a �t� donn� a la pi�ce, on l'insert dans la bdd 
	    elseif (isset($_POST['renommer_ma_piece'])){
    		$nom= htmlspecialchars($_POST['renommer']);
    		$renom= $bdd->prepare('UPDATE pieces SET nom = :nom WHERE id= :id');
    		$renom->execute(array('nom'=> $nom, 'id'=>$_POST['choix']));
	    }
	    $nombre = selection($bdd,'pieces','count(*) as nb', 'id_maison', $_SESSION['maison']);
    	$req = $nombre -> fetch();
    	
    	$requser = selection($bdd,'pieces','*','id_maison', $_SESSION['maison']);
    	
    	
    } elseif($function == "trouver") {
	$content = "trouver";    	

        
        
    

   
    
        
   
}else {
        $content = "error404";
    }
    


include('vues/' . $content . '.php');

