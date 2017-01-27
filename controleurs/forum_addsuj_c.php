<?php include "modele/forum_addsuj.class.php" ?>
<link rel="stylesheet" href="/leanon/vues/styles/vue_forum.css"/>
<div id="Cforum">
<div class="categories">
<h1> Ajouter un sujet </h1>
</div>

	<!-- On créer des formultaires, le premier pour inserer le titre du sujet, le deuxieme contien le premier message du sujet et le dernier est un bouton d'envoie-->
	<form method="post" action="index.php?cible=users&function=forum_addsuj&categorie= <?php echo $_GET['caterogie'];?>">
		<p>
			<input type="text" name="name" placeholder="Nom du sujet..." required/><br>
			<textarea name="sujet" placeholder="Contenu du sujet..."></textarea><br>
			<input type="hidden" value="<?php echo $_GET['categorie'];?>" name="categorie" />
			<input type="submit" value="Ajouter le sujet"/>
			<?php 
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
			if (isset($erreur)){ // S'il existe une erreur, on affiche le message d'erreur
				echo $erreur;
			}
			?>
		</p>
	</form>
</div>
