
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/tableau.css">
</head>
<body>

<table class='liste'>
	<tr class='header'>
		<th>Nom</th>
		<th>Etat</th>
	</tr>

<?php foreach ($liste_obj as $obj) { ?>

<tr>
	<td>
		<p><?= $obj['nom']; ?></p>
	</td>
	<td>
		<p><?= $obj['donnee_recue']; ?></p>
	</td>
</tr>


    

<?php } ?>
</table>
</body>
</html>
