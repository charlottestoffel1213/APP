
<?php 
include 'modele/forum_addmessage.class.php';
?>
<link rel="stylesheet" href="/leanon/vues/styles/vue_forum.css"/>

<div id="Cforum">
	<?php 
	if (isset($_GET['categorie'])) { //Si on est dans une catégorie 
		$_GET['categorie'] = htmlspecialchars($_GET['categorie']);
		?>
		<a href = 'index.php?cible=users&function=forum'><button>Retour</button></a>
		<div class="categories">
			<h1><?php echo $_GET['categorie']; ?> </h1>  <!-- affiche la catégorie où on se situe -->
		</div>
		
		<?php
		// On veut afficher ce que contient la catégorie selectionnée
		 // On selectionne les infos dans la bdd sur la catégorie selectionnée car on veut l'id 
		$requete2= selection($bdd, 'categorie_forum','*','nom_forum', $_GET['categorie']);
		$categorie= $requete2->fetch();

		// On cherche les sujets provenants de la même categorie 
		$req = selection($bdd, 'sujet_du_forum','*', 'id_categorie', $categorie['id']);
		?>
		<br>
		<h2> Sujet : </h2>
		<?php
		while($reponse= $req->fetch()) { // Affiche tous les sujets contenues dans la catégorie selectionnée 
			?> 
			<div class ="sujet"> 
			<h2><a href="index.php?cible=users&function=forum&sujet=<?php echo $reponse['nom'];?>"><?php echo $reponse['nom'];?> </a> </h2>
			</div>
			<?php
		} 
		if (isset($_SESSION['id']))
		{?> 
			<br>
			<a href="index.php?cible=users&function=forum_addsuj&categorie=<?php echo $_GET['categorie'];?>"><button> Ajouter un sujet </button></a>
		<?php 
		}
	}
	else if (isset($_GET['sujet'])) { //Si on est dans un sujet 
		$_GET['sujet'] = htmlspecialchars($_GET['sujet']);
		?>
		<a href = "index.php?cible=users&function=forum"><button>Retour</button></a>
		<div class="sujet">
			<?php echo $_GET['sujet']; ?> 
		</div>
		<?php
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

		while($reponse = $requete2->fetch()){ //Afficher tous les messages de ce sujet
			?>
		<div class="message">
			<?php 
			// On affiche l'auteur des messages
			$requete1 = selection($bdd,'utilisateur','*', 'id', $reponse['auteur']);
			$utilisateur = $requete1 ->fetch();
			echo $utilisateur['username']; echo ' : ('. $reponse['date'] .')<br>';
			echo $reponse['message'];?> 
		</div>
			<?php
		} 
		if (isset($_SESSION['id']))
		{?> 
			<br>
		<!-- On créer un formulaire pour ecrire un nouveau message dans ce sujet -->
			<form method="post" action="index.php?cible=users&function=forum&sujet=<?php echo $_GET['sujet']; ?>">
				<textarea name="message" placehorlder = "Votre message..."></textarea>
				<input type="hidden" name=name value="<?php echo $_GET['sujet']; ?>"/>
				<input type="submit" value="Répondre" />
			<?php 
			
			if(isset($erreur)){ // S'il existe une erreur, on affiche un message d'erreur 
				echo $erreur;
			} ?>
			</form>

		<?php
		}
	}
	else { // Si on est dans la page général du forum, on affiche toutes les catégories ?> 
		<h1> Forum </h1> <br>
	<?php

		$requete= selection($bdd,'categorie_forum','*','','');
		while ($reponse= $requete->fetch()){
		?>
			<div class="categories">
				<h1><a href="index.php?cible=users&function=forum&categorie=<?php echo $reponse['nom_forum']; ?>"><?php echo $reponse['nom_forum']; ?></a></h1>
			</div>
		<?php 
		}
	}
?> 