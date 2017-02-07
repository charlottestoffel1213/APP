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
						<input type="text" name="nom_cap"  required /></h2>
						<?php if (isset($alerte1)){echo $alerte1;}?> 
					</td>
</tr>

<tr>					
					<td align="right"><h2>Code du capteur :
						<input type="text" name="id_cap"  required /></h2><?php if (isset($alerte2) and isset($alerte4)){echo $alerte2;}?> <?php if (isset($alerte3)){echo $alerte3;}?> <?php if (isset($alerte4)){echo $alerte4;}?>  
					</td>
</tr>

<tr>					
					<td align="right"><h2>Pièce du capteur :
						<select name='piece' id='piece'>
						<?php $req = $bdd->query("SELECT id,nom from pieces where id_maison = '".$maison."'");
		
						while ($requete = $req->fetch()){
							echo"<option value= '".$requete['id']."'> ".$requete['nom']." </option>";
							if (isset($alerte5)){echo $alerte5;}
						 } ?>
	 					</select></h2>
	 					<?php if (isset($alerte5)){echo $alerte5;} ?>
					</td>
</tr>


</table>

<br/>
<br/>
<input type='submit' value="Ajouter" name="ajouter" id='ajouter' class="submit"> 
</form>

</div>
</html>
