<?php

if (isset( $_SESSION['id']))
{
	
	$requser = $bdd->prepare('SELECT * FROM utilisateur WHERE id = :id');
	$requser->execute(array('id'=>$_SESSION['id']));
	$userinfo = $requser->fetch();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<?php
		if (isset($userinfo['id']) AND ($userinfo['id_type_utilisateur'] == 3))
		{
		?>
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/typo_maintenance.css">
	<?php
	}
	else{?>
		<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
	<?php }
	?>
	
</head>
<body>
<div align="center">


	<!--Si l'utilisateur est la maintenance afficher : -->
	<?php

		if (isset($_GET['cible']) AND ($_GET['cible']=='maintenance')){?>


				<h1>Contacter les utilisateurs Domisep</h1>
				<br/>
				<h2>Quelle destinataire ?</h2>
				<form method="POST" action="">
				
				Destinataire :
				<select  name='destinataire' > <?php
				
					while($d = $destinataire->fetch()){ ?>
				<option><?=$d['username']?></option>
				<?php 
				} 




		//Si l'utilisateur est un users afficher :
		}elseif (isset($_GET['cible']) AND ($_GET['cible']=='users')){?>

				
			<h1>Vous souhaitez contacter la maintenance ?</h1>
				<br/>
			<h2>Quelle requête souhaitez vous faire?</h2>
				<form method="POST" action="">
				<br/>

				<select  name='requette' >
					<option>Rajouter un capteur/actionneur dans une pièce</option>
					<option>J'ai un problème d'affichage avec une donnée de capteur/actionneur</option>
					<option>Un capteur/actionneur est defaillant dans ma maison</option>
					<option>Autres problèmes</option>


				<?php 
				 }
				?>





				<!--Pourles deux utilisateurs-->
				</select>
				<br/><br/>
				<h2>Votre message</h2>
					<textarea placeholder="Tappez votre message" name="message"></textarea>
				<br /><br/><br/>
					<input type="submit" name="envoi" value="Envoyer">
				<br/><br/>
									<?php
										if(isset($error)){ 
												echo '<span style="color:red">' .($error). '</span>';
									}?>
				</div>
				</form>
				<br/>






<!-- code de la BOITE DE RECEPTION -->
<h2>Boite de reception</h2>
<?php
	while($m= $msg->fetch()){
		$pseudo_exp=$bdd->prepare('SELECT username FROM utilisateur WHERE id = ?');
		$pseudo_exp->execute(array($m['id_expediteur']));
		$pseudo_exp=$pseudo_exp->fetch();
		$pseudo_exp=$pseudo_exp['username'];

		$pseudo_des=$bdd->prepare('SELECT username FROM utilisateur WHERE id = ?');
		$pseudo_des->execute(array($m['id_destinataire']));
		$pseudo_des=$pseudo_des->fetch();
		$pseudo_des=$pseudo_des['username'];
		/*$requette_a=$bdd->prepare('SELECT username FROM utilisateur WHERE id = ?');
		$requette_a->execute(array($m['requette']));
		$requette_a=$requette_a->fetch();
		$requette_a=$requette_a['requette'];*/
		?><br/>
		<b><?= $pseudo_exp ?></b> <b>Requête :</b> <?= $m['requette'] ?><br/><b>Message du <?=$m['date'] ?> : </b><?=$m['message'] ?> <br/> <br/>
		<b><?= $pseudo_des ?></b> <b>Requête :</b> <?= $m['requette'] ?><br/><b>Message du <?=$m['date'] ?> : </b><?=$m['message'] ?> <br/> <br/>

<?php } ?>









</body>
</html>
