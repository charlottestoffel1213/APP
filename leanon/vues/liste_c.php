<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/typo_maintenance.css">
</head>
<body>

<table class='liste'>
	<tr class='header'>
		<th>Pseudo</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Mail</th>

		<th>Adresse</th>
		<th>Ville</th>
		<th>Code Postal</th>
		<th>Telephone</th>
		<th>Accès</th>
	</tr>


<h1><?= $title; ?></h1>
<p><a href="index.php">Retour</a></p>

<?php foreach ($liste as $user) { ?>

<tr>
	<td>
		<p><?= $user['username']; ?></p>
	</td>
	<td>
		<p><?= $user['nom']; ?></p>
	</td>
	<td>
		<p><?= $user['prenom']; ?></p>
	</td>
	<td>
		<p><?= $user['mail']; ?></p>
	</td>
	<td>
		<p><?= $user['adresse']; ?></p>
	</td>
	<td>
		<p><?= $user['ville']; ?></p>
	</td>
	<td>
		<p><?= $user['postal']; ?></p>
	</td>
	<td>
		<p><?= $user['tel']; ?></p>
	</td>
	<td>
		<a href="index.php?cible=maintenance&function=nb_capteur&id=<?=$user['id'] ?>">ACCEDER</a>

		
		
	</td>

</tr>


    

<?php } ?>
</table>
</body>
</html>
