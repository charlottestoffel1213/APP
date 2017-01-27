
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf_8">
		<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/pop_up.css">
	</head>

<body>
<br/>


<?php if ($_GET['type']=='nuit'){?>

<?php }?>
<!-- Partie temperature -->
 

<form action="" method="POST">
    
      <div id="mode2">
            
            <div class="Parametrage-de-la-temperature" align="center">
            <?php echo '<img src="vues/styles/image/logo_temperature.jpg" alt="Temperature">'; ?><p>Température</p>
                <input type="number" name="temp1" value="18" min="0" max="35" step="0.5" required/>C°
            </div>

            
            <div class="Parametrage-de-la-lumiere" align="center">
                <?php echo '<img src="vues/styles/image/logo_lumiere.jpg" >' ; ?><p>Lumière</p>
                <input type="radio" name="volets" value="1" id="on" checked="checked" /><label for="on">On</label><br/>
            <input type="radio" name="volets" value="0" id="off" /> <label for="off">Off</label>
            </div>

            <div class="Parametrage-de-la-volet" align="center">
            <?php echo '<img src="vues/styles/image/volet.jpg" >' ; ?><p>Volets:</p>
                <input type="radio" name="volets" value="1" id="on" checked="checked" /><label for="on">On</label><br/>
                <input type="radio" name="volets" value="0" id="off" /> <label for="off">Off</label>
            </div>

            <div class="Parametrage-de-la-camera" align="center">
            <?php echo '<img src="vues/styles/image/camera.jpg" >' ; ?><p>Caméra:</p>
                <input type="radio" name="volets" value="1" id="on" checked="checked" /><label for="on">On</label><br/>
                <input type="radio" name="volets" value="0" id="off" /> <label for="off">Off</label>
                
            </div>

      </div>
      <br/><br/>

    <input type="submit" name='submittemp' class ='submit' value="Activer"/>
    

             
 



</form>


<script src="jquery-3.0.0.js"></script>


<script src="vues/js/popup_liste.js"></script>

</body>
</html> 
