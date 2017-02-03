
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/tableau.css">
</head>
<body>

<table class='liste_cap'>
	<tr class='header'>
		<th>Nom</th>
		<th class="liste_etat">Etat</th>
	</tr>
<?php $i=0;
foreach ($liste_obj_lum as $obj) { ?>

<tr>
	<td>
		<p><?= $obj['nom']; ?></p>
	</td>
	<td class="switch">
		<div class="onoffswitch">
        <input type="checkbox" name="check2[]" class="onoffswitch-checkbox" id="myonoffswitch+<?=$i?>" value="<?php echo $obj['id']; ?>" <?php echo $checked=($obj['donnee_recue']==1)?'checked':''; ?>>
        <label class="onoffswitch-label" for="myonoffswitch+<?=$i?>">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div>
	</td>
</tr>


    

<?php $i++;
} ?>
</table>
<br/>

<input type="submit" name="submit_lum" class="submit">
</body>
</html>
