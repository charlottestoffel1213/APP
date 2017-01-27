<!DOCTYPE html>
<html>
<body>

<form action="" method="POST">
<select name='choix' required>
<?php 
while ($key=$requser->fetch()) {
?>	
	<option value="<?php echo $key['id'] ?>" > <?php echo $key['nom'] ?> </option>
<?php } ?>
</select>
<br/>


	
		<label for="piece">Renommer ma pièce : </label>
		<input name="renommer" type="text" required>
	
	<input type="submit" name="renommer_ma_piece" value="Renommer" class='submit'><br/>
</form> 
</body>
</html>
