<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="/leanon/vues/styles/vue_forum.css"/>
</head>
<body>
<div id="Cforum">
	<?php 
	if (isset($_GET['categorie'])) { //Si on est dans une catégorie 
		
		?>
		<a href = 'index.php?cible=users&function=forum'><button>Retour</button></a>
		<div class="categories">
			<h1><?php echo $_GET['categorie']; ?> </h1>  <!-- affiche la catégorie où on se situe -->
		</div>
			
		<!-- On veut afficher ce que contient la catégorie selectionnée -->
		
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
	}elseif (isset($_GET['sujet'])) { ?> <!-- Si on est dans un sujet  -->
		
		<a href = "index.php?cible=users&function=forum"><button>Retour</button></a>
		<div class="sujet">
			<?php echo $_GET['sujet']; ?> 
		</div>
		<?php
		//On affiche tous les messages de ce sujet
		while($reponse = $requete2->fetch()){ 
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
				<textarea name="message" placeholder = "Votre message..."></textarea>
				<input type="hidden" name=name value="<?php echo $_GET['sujet']; ?>"/>
				<input type="submit" value="Répondre" />
			<?php 
			
			if(isset($erreur)){ // S'il existe une erreur, on affiche un message d'erreur 
				echo $erreur;
			} ?>
			</form>

		<?php
		}
			
	}else { // Si on est dans la page général du forum, on affiche toutes les catégories ?> 
		<h1> Forum </h1> <br>
	<?php

		while ($reponse= $requete->fetch()){
		?>
			<div class="categories">
				<h1><a href="index.php?cible=users&function=forum&categorie=<?php echo $reponse['nom_forum']; ?>"><?php echo $reponse['nom_forum']; ?></a></h1>
			</div>
		<?php 
		}
	} ?>
</div>
</body>
</html>