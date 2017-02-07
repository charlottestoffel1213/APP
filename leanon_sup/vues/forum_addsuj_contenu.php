<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/leanon/vues/styles/vue_forum.css"/>
</head>
<body>
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
		
			if (isset($erreur)){ // S'il existe une erreur, on affiche le message d'erreur
				echo $erreur;
			}
			?>
		</p>
	</form>
</div>
</body>
</html>

