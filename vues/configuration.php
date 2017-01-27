<!DOCTYPE html>
<html>

<p>Le Nombre de pièces est de : <?=$req['nb']; ?></p>


<form action="" method="POST">
	<input type="submit" name="ajouter" value="Ajouter une pièce" id=ajouter><br/>
</form>

<?php 
//Cette fonction sera utilisé pour afficher et la selection des différentes pièces à ajouter
if (isset($_POST['ajouter'])){?>
	
	<form action="" method="POST">
		<select name='choix'>
			<option value="Cuisine" >Cuisine</option>
			<option value="Chambre" >Chambre</option>
			<option value="Salon" >Salon</option>
			<option value="Garage" >Garage</option>
			<option value="Salle de bain" >Salle de bain</option>
			<option value="WC" >WC</option>
			<option value="Salle à manger" >Salle à manger</option>
			<option value="Véranda" >Véranda</option>
		</select><br/>
	<input type="submit" name="enregistrer" value="Enregistrer" ><br/>
	<input type="submit" name="renommer_ma_piece" value="Renommer" ><br/>
	</form> 
	
<?php }


if (isset($_POST['choix']) AND isset($_POST['renommer_ma_piece'])){	
?>
	<form action="" method="POST">
		<label for="piece">Renommer ma pièce : </label>
		<input name="renommer" type="text"  id='renommer' required>
		<input type="submit" name="Valider" value="Valider"><br/>
	</form>

<?php
}
?>

</html>
