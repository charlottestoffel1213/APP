<?php
//cette fonction affiche le bouton pour ajouter un capteur
include'../modele/connexion_bdd.php';
if (!isset($_POST['ajouter_un_capteur'])){
?>

<!DOCTYPE html>
<html>
<form action="plus_capteur.php" method="POST">
 
<input type="submit" name="ajouter_un_capteur" value="Ajouter un capteur"><br/>
</form>
<?php 
}
if (isset($_POST['ajouter_un_capteur'])){
	
?>
	<form action="../modele/ajouter_capteur.php" method="POST">
 	<label for="capteur">Capteur à ajouter : </label><input name="capteur" id="capteur" type="text" required''>
 	<input type="submit" name="ajout" value="Ajouter"><br/>
 	</form>

</html>
<?php }
?>