<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
</head>
<body>
<h1>Renseignement sur la maison </h1>


<div class="renseignement_maison
	<form action="" method="POST" >
		<div class="renseignement_adresse" >
			<table>
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
			<?php include('configuration.php')?>
		</div>
</div>
			<br/>
			<input type="submit" name="submit" class="submit">
		
	</form>

	
<?php 
if (isset($retour) AND isset($retour1)){?>
	<div class="code_client">
		<h3>Code client : </h3> <?php echo $rand ; ?>
	</div>
<?php 
}?>
</div>
</body>
</html>

