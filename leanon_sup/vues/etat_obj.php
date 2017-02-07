<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/tableau.css">
</head>
<body>

<table class='liste_cap'>
	<tr class='header'>
		<th>Nom</th>
		<th class="liste_etat">Etat</th>
	</tr>
<?php 
foreach ($etat as $obj) { ?>

<tr>
	<td>
		<p><?= $obj['nom']; ?></p>
	</td>
	<td >
		<?php if ($obj['etat'] == 'dysfonctionnement') {?>
        <div class='dysfonction'> &times;</div>
        <?php }?>
    
	</td>
</tr>

<?php 
} ?>
</table>
</body>
</html>