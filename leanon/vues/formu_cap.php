<!DOCTYPE html>
<html>
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="vues/styles/connexion_typo.css">
 <!-- On fait appel ici à la page css -->



<div align="center"><h1>Ajouter un capteur</h1>
<form action="" method="POST">
<?php if (isset ($erreur)){
				echo '<font color = red>' . $erreur . '</font>';
			}?>

<table>

<tr>
					<td align="right"><h2>Nom du capteur :
						<input type="text" name="nom_cap" required /></h2>
					</td>
</tr>

<tr>					
					<td align="right"><h2>Code du capteur :
						<input type="text" name="id_cap" required /></h2>
					</td>
</tr>

<tr>					
					<td align="right"><h2>Pièce du capteur :
						<select name='piece' id='piece'>
						<?php $req = $bdd->query("SELECT id,nom from pieces where id_maison = '".$maison."'");
		
						while ($requete = $req->fetch()){
							echo"<option value= '".$requete['id']."'> ".$requete['nom']." </option>";
		
						 } ?>
	 					</select></h2>
					</td>
</tr>
<tr>					
					<td align="right"><h2>Catégorie du capteur :
						<select name='categorie' id='categorie'>
						
							<option value=4>Humidité</option>
							<option value=1>Température</option>
							<option value=3>Sécurité</option>
							<option value=2>Luminosité</option>
		
						 
	 					</select></h2>
					</td>
</tr>

</table>

<br/>
<br/>
<input type='submit' value="Ajouter" name="ajouter" id='ajouter' class="submit"> 
</form>
</div>
</html>
