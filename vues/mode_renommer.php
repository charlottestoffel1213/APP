<!DOCTYPE html>
<html>
<body>

<p><a href="index.php?cible=users&function=configmode">Retour</a></p>


<form action="" method="POST">Choisir votre mode : 
	<select name='choix' required>
		<?php 
			while ($key=$requser->fetch()) {
		?>	
			<option value="<?php echo $key['id'] ?>" > <?php echo $key['nom_mode'] ?> </option>
		<?php } ?>
	</select>

<br/>
<br/>
	
		<label for="piece">Renommer mon mode : </label>
			<input name="renommer" type="text" >
<br/>
<br/>
		
			








	<br/>
	<br/>
	<input type="submit" name="renommer_mode" value="Modifier" class='submit'>
	<input type="submit" name="supprimer" value="Supprimer mode" class='submit'><br/>

</form> 
</body>
</html>
