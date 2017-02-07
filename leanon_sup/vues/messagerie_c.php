<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/tableau.css">
	<?php if ($_SESSION['id_type_utilisateur'] == 3)
		{?>
			<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/typo_maintenance.css">
		<?php
		}?>
</head>
<body>
<?php if (isset($_GET['chat'])){ //Si on est dans une conversation?> 
	<?php if ($_SESSION['id_type_utilisateur'] == 1 OR $_SESSION['id_type_utilisateur'] == 2) {?>
			<a href = 'index.php?cible=users&function=messagerie'><button>Retour</button></a>
			<?php } else {?>
			<a href = 'index.php?cible=maintenance&function=messagerie'><button>Retour</button></a>
			<?php }?>
		<h1> <?= $titre_req['requete']?></h1>
		<table class='chat'>
			<tr class='header'>
				<th>Expediteur</th>
				<th>Message</th>
			</tr>
		<?php
			while($m= $msg->fetch()){
				$pseudo_exp=$bdd->prepare('SELECT username FROM utilisateur WHERE id = ?');
				$pseudo_exp->execute(array($m['id_expediteur']));
				$pseudo_exp=$pseudo_exp->fetch();
				$pseudo_exp=$pseudo_exp['username'];
				?>
				
				<tr >
					<td>
						<p><b><?= $pseudo_exp ?></b> 
						<br/>
						Le <?=$m['date'] ?></p>
					</td>
					
					<td class="message">
						<p> <?=$m['message'] ?></p>
					</td>
				</tr>
		
		<?php }?>
		</table>
		<!-- On créer un formulaire pour ecrire un nouveau message dans ce chat -->
		<form method="post" action="">
			<textarea name="message_chat" placeholder = "Votre message..." class='text'></textarea>
			<input type="submit" value="Répondre" class='submit' />
		</form>

<?php } elseif (isset($_POST['ajout'])){?>
<a href = 'index.php?cible=users&function=messagerie'><button>Retour</button></a>
			<h1>Vous souhaitez contacter la maintenance ?</h1>
				<br/>
			<h2>Quelle requête souhaitez vous faire?</h2>
				<form method="POST" action="">
				<br/>
	
				<select  name='requete' class='requete'>
					<option >Rajouter un capteur/actionneur dans une pièce</option>
					<option >J'ai un problème d'affichage avec une donnée de capteur/actionneur</option>
					<option >Un capteur/actionneur est defaillant dans ma maison</option>
					<option >Autres problèmes</option>
				</select>
				<br/><br/>
				<h2>Votre message</h2>
					<textarea placeholder="Tappez votre message" name="message" class='text'></textarea>
				<br /><br/><br/>
					<input type="submit" name="envoi" value="Envoyer" class='submit'>
				<br/><br/>
				<?php
					if(isset($error)){ 
							echo '<span style="color:red">' .($error). '</span>';
				}?>
				</form>
				<br/>
	
	
	
	
	
		
	<?php 
	
}else { //Si on est dans la page d'acceuil de la messagerie?>
	<h2>Boite de reception</h2>
	
	<table class='chat'>
		<tr class='header'>
			<th>Crée par </th>
			<th>Requete</th>
		</tr>
	
		<?php while($reponse= $liste_chat->fetch()) { // Affiche tous les chats cr�es 
				$pseudo_exp=$bdd->prepare('SELECT username FROM utilisateur WHERE id = ?');
				$pseudo_exp->execute(array($reponse['id_createur']));
				$pseudo_exp=$pseudo_exp->fetch();
				$pseudo_exp=$pseudo_exp['username'];?> 
				<tr>
					<td> 
						<?= $pseudo_exp?>
					</td>
					<td class='message'>
						<?php if ($_SESSION['id_type_utilisateur'] == 1 OR $_SESSION['id_type_utilisateur'] == 2) {?>
							<a href="index.php?cible=users&function=messagerie&chat=<?php echo $reponse['id'];?>"><?php echo $reponse['requete'];?> </a> 
						<?php } else {?>
							<a href="index.php?cible=maintenance&function=messagerie&chat=<?php echo $reponse['id'];?>"><?php echo $reponse['requete'];?> </a> 
						<?php }?>
					</td>
				</tr>
		<?php } ?>
	</table>
	
	<?php if ($_SESSION['id_type_utilisateur'] == 1 OR $_SESSION['id_type_utilisateur'] == 2) {?>
		<form action="" method="POST">
		<input type = 'submit' name ='ajout' value = "Creer un chat" class="submit">
		</form>
	<?php }?>
		

<?php }?>




</body>

</html>
