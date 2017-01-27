<!DOCTYPE html>
<html>
<body>
<p><a href="index.php?cible=users&function=configmode">Retour</a></p>




<?php 
//Cette fonction sera utilisé pour afficher et la selection des différentes pièces à ajouter
?>



	<form action="" method="POST">
				<tr>    
					<td class="mode"><div align="center">Nom du mode :
						<input type="text" id="nom_mode" name="check[] "></div>
					</td>
				</tr>
					<br/>
					<br/>
				
    
      <div id="mode2">
            
            <div class="Parametrage-de-la-temperature" align="center">
            <?php echo '<img src="vues/styles/image/logo_temperature.jpg" alt="Temperature">'; ?><p>Température</p>
                <input type="number" name="temperature" value="18" min="0" max="50" step="0.5" required/>C°
            </div>

            
            <div class="Parametrage-de-la-lumiere" align="center">
                <?php echo '<img src="vues/styles/image/logo_lumiere.jpg" >' ; ?><p>Lumière</p>
                <input type="radio" name="lumiere" value="1" id="on" checked="checked" /><label for="on">On</label><br/>
            <input type="radio" name="lumiere" value="0" id="off" /> <label for="off">Off</label>
            </div>

            <div class="Parametrage-de-la-volet" align="center">
            <?php echo '<img src="vues/styles/image/volet.jpg" >' ; ?><p>Volets:</p>
                <input type="radio" name="volet" value="1" id="on" checked="checked" /><label for="on">On</label><br/>
                <input type="radio" name="volet" value="0" id="off" /> <label for="off">Off</label>
            </div>

            <div class="Parametrage-de-la-camera" align="center">
            <?php echo '<img src="vues/styles/image/camera.jpg" >' ; ?><p>Caméra:</p>
                <input type="radio" name="camera" value="1" id="on" checked="checked" /><label for="on">On</label><br/>
                <input type="radio" name="camera" value="0" id="off" /> <label for="off">Off</label>
                
            </div>

      </div>
      <br/><br/>

  <input type="submit" name="enregistrer" value="Enregistrer" class='submit'>
    

             
 



</form>
					

				

</body>
</html>
