<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
</head>
<body>
<h1>Renseignement du client  </h1>

<form action="" method="POST" >
<div id="renseignement_maison" >
	<div class="renseignement_adresse" >
		<h2>Maison :</h2>
		<br/>
		
		
		<table class="renseignement_form">
			
				<tr>    
					<td><label for="adresse">Adresse  : </label>
						<input type="text" name="adresse" id="adresse" class="textblock" required>
					</td>
				</tr>
				<tr>    
					<td ><label for="postal">Code postal : </label>
						<input type="text" name="postal" id="postal" class="textblock" required>
					</td>
				</tr>
				<tr>    
					<td ><label for="ville">Ville : </label>
						<input type="text" name="ville" id="ville" class="textblock" required>
					</td>
				</tr>
			
		</table>
	</div>
	<div class="renseignement_piece" >
		<h2>Pieces : </h2>

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
			<br/>

	
	</div>
	<br/>
</div>
		<input type="submit" name="submit" class="submit">

</form>			
			
		
	

	
<?php 
if (isset($retour)){?>
	<div class="code_client">
		<h3>Votre code client : </h3>  <?php echo $rand ; ?>
	</div>
<?php 
}?>
</body>
</html>

