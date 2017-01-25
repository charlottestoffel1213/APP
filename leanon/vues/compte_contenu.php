
<!DOCTYPE html>
<html>
<head>
	<title>PROFIL</title>
	<?php
		if (isset($userinfo['id']) AND ($userinfo['id_type_utilisateur'] == 3))
		{?>
			<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/typo_maintenance.css">
		<?php 
		}else{?>
			<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
	<?php }?>
</head>
<body>
	<H1>Bienvenue <?php echo $userinfo['username']; ?> </H1><br>
	<h2>Voici votre espace personnel </h2>
	<h1><a href=""><img src="/leanon/vues/styles/image/connexion2.jpg" ></a></h1>
	<br/>
	<h2>Informations</h2>
	<table class="info">
		<tr>
			<th>Pseudo : </th>
			<td><?php echo $userinfo['username']; ?> </td>
		</tr>
		<tr>
			<th>E-mail : </th>
			<td><?php echo $userinfo['mail']; ?> </td>
		</tr>
		<tr>
			<th>Nom : </th>
			<td><?php echo $userinfo['nom']; ?> </td>
		</tr>
		<tr>
			<th>Prénom : </th>
			<td><?php echo $userinfo['prenom']; ?> </td>
		</tr>
		<tr>
			<th>Date de naissance : </th>
			<td><?php echo $userinfo['naissance']; ?> </td>
		</tr>
		<tr>
			<th>Adresse : </th>
			<td><?php echo $userinfo['adresse']; ?>, <?php echo $userinfo['ville']; ?>, <?php echo $userinfo['postal']; ?> </td>
		</tr>
		<tr>
			<th>Téléphone : </th>
			<td><?php echo $userinfo['tel']; ?></td>
		</tr>
		<tr>
			<th>Date d'inscription : </th>
			<td><?php echo $userinfo['date_inscription']; ?></td>
		</tr>
	</table>
		<br/> 
<div class="submit_modif">
<?php
if (isset($userinfo['id']) AND ($userinfo['id_type_utilisateur'] == 1)) //Si l'utilisateur est principal, il peut modifier son compte et ajouter des comptes secondaires
{?>
	<div class="submit" ><a href="index.php?cible=users&amp;function=editprofil">Modifier mon profil</a></div>
<?php
}
if (isset($userinfo['id']) AND ($userinfo['id_type_utilisateur'] == 3)) 
{?> 
	<div class="submit"><a href="index.php?cible=maintenance&amp;function=editprofil">Modifier mon profil</a></div>


<?php
}
?>
</div>
	</body>
</html>
