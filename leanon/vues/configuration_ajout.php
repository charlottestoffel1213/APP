<!DOCTYPE html>
<html>
<body>

<p>Le nombre de pièces dans votre maison est de : <?=$req['nb']; ?></p>


<?php 
//Cette fonction sera utilisé pour afficher et la selection des différentes pièces à ajouter
?>
	<form action="" method="POST">
<div class="choix">
	<table class="renseignement_form">
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Cuisine" id="Cuisine" name="check[] ">
					</td>
					<td class="piece">
						<label for="Cuisine">Cuisine</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Chambre1" id="Chambre1" name="check[]">
					</td>
					<td class="piece">
						<label for="Chambre1">Chambre1</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Chambre2" id="Chambre2" name="check[]">
					</td>
					<td class="piece">
						<label for="Chambre2">Chambre2</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Chambre3" id="Chambre3" name="check[]">
					</td>
					<td class="piece">
						<label for="Chambre3">Chambre3</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Salon" id="Salon" name="check[]">
					</td>
					<td class="piece">
						<label for="Salon">Salon</label>
					</td>
				</tr>
		</table>
</div>
<div class="choix">	
		<table class="renseignement_form">
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Garage" id="Garage" name="check[]">
					</td>
					<td class="piece">
						<label for="Garage">Garage</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Salle de bain" id="Salle de bain" name="check[]" >
					</td>
					<td class="piece">
						<label for="Salle de bain">Salle de bain</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="WC" id="WC" name="check[]">
					</td>
					<td class="piece">
						<label for="WC">WC</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Salle à manger" id="Salle a manger" name="check[]">
					</td>
					<td class="piece">
						<label for="Salle a manger">Salle à manger</label>
					</td>
				</tr>
				<tr>    
					<td class="piece">
						<input type="checkbox" value="Véranda" id="veranda" name="check[]">
					</td>
					<td class="piece">
						<label for="veranda">Véranda</label>
					</td>
				</tr>
			</table>
</div>
		<br/> <br/>
	<input type="submit" name="enregistrer" value="Enregistrer" class='submit'>
	</form> 
</body>
</html>
