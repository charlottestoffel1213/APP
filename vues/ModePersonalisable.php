
<?php

include ("../modele/functions.php");
include("../modele/connexion_bdd.php");
	/* if(isset($_SESSION['maison']))*/
		if(isset($_POST['submit'])){
			 if (isset($_POST['nom_modep']) AND isset($_POST['temp']) AND isset($_POST['lumière'])){
			
			$id_maison = 13 /* intval($_POST['maison'])*/;
			$nom_modep = htmlspecialchars($_POST['nom_modep']);
            $temp = (int)$_POST['temp'];
            $lumière = (int)$_POST['lumière'];
            $caméra = (int)$_POST['caméra'];
            $volets = (int)$_POST['volets'];
            $portes = (int)$_POST['portes'];
            $dateD = date('Y-m-d');
            $heureD = date('h-i');
            $dateF = date('Y-m-d');
            $heureF = date('h-i'); 

            $values = array('id_maison' => $id_maison, 'nom_modep' => $nom_modep, 'temp' => $temp, 'lumière' => $lumière, 'caméra' => $caméra, 'volets' => $volets, 'portes' => $portes, 'dateD' => $dateD, 'heureD' => $heureD, 'dateF' => $dateF, 'heureF' => $heureF);
            $table = 'mode_obj_pers';
            $retour = insertion($bdd, $values, $table);

              if ($retour){
               echo "enregistré!";
            }

            }
             
        }
?>

<!DOCTYPE html>
<html>
<header>

</header>
<body>
<form action="" method="post">
	<tr>
		<td align="right">Nom du mode :
				<input type="text" name="nom_modep"  minlength="5" maxlength="10" />
		</td>
	</tr>
	</br></br>
	<tr>
		<td align="right">Température :
				<input type="number" name="temp" min="10" max="30"  />  C°
		</td>
	</tr>
	</br></br>
	<tr>
		<td align="right">Lumière : 
			<input type="radio" name="lumière" value="1" id="on" checked="checked" /><label for="on">On</label>
			<input type="radio" name="lumière" value="0" id="off" /><label for="off">Off</label>
		</td>
	</tr>
	</br></br>
	<tr>
		<td align="right">Caméra et autres systèmes de sécurité : 
			<input type="radio" name="caméra" value="1" id="on" checked="checked" /><label for="on">On</label>
			<input type="radio" name="caméra" value="0" id="off" /> <label for="off">Off</label>
		</td>
	</tr>
	</br></br>
	<tr>
		<td align="right">Volets : 
			<input type="radio" name="volets" value="1" id="on" checked="checked" /><label for="on">On</label>
			<input type="radio" name="volets" value="0" id="off" /> <label for="off">Off</label>
		</td>
	</tr>
	</br></br>
	<tr>
		<td align="right">Portes : 
			<input type="radio" name="portes" value="1" id="on" checked="checked" /><label for="on">On</label>
			<input type="radio" name="portes" value="0" id="off" /> <label for="off">Off</label>
		</td>
	</tr>
	</br></br>
	<tr>
		<td align="right"> Date de départ : 
			<input type="date" name="dateD" value="dateD" />
		</td>
		<td align="right"> Heure de départ :
			<input type="time" name="heureD" value="heureD" />
		</td>
	</tr>
	</br></br>
	<tr>
		<td align="right"> Date de fin : 
			<input type="date" name="dateF" value="dateF" />
		</td>
		<td align="right"> Heure de fin :
			<input type="time" name="heureF" value="heureF" />
		</td> 
	</tr>
	</br></br>
	<tr>
		<input type="submit" name="submit" value="Valider"/>
	</tr>
	<!-- Ce code permet de créer le formulaire permettant à l'utilisateur de créer son propre mode -->
</form>
</body>
</html>

