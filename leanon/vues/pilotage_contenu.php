<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf_8">
		<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/pop_up.css">
	</head>

<body>
<section>

<?php if ($_GET['piece']=='maison'){ ?>
<!-- affiche le bouton "verifier l'etat des obj connectes" si on est sur la page principale -->

<button id="myBtn">Vérifier l'état des objets connectés</button>
<!--  fenetre pop-up  -->
<div id="myModal" class="modal">
  <!-- contenu du modal-->
	<div class="modal-content">
		<div class="modal-header">
	    <span class="close">&times;</span>
	    <h2>Etat de mes objets connectés</h2>
	  	</div>
	  	<div class="modal-body">
		<?php include "modele/etat_obj.php"; ?>
		</div>
	</div>
</div>
<script src="vues/js/popup_verif.js"></script>
</br>
<?php }?>

<!-- Partie temperature -->

<div id="Controle">
    <div class="Temperature">
    <figure>
    
	<?php if ($moyenne > 0) {echo '<img src="vues/styles/image/temperature2.jpg" alt="Temperature" >';} 
	else {echo '<img src="vues/styles/image/logo_temperature.jpg" alt="Temperature" >';} ?>
	<figcaption>
		<div id = "modif-temps">
            <div class="slide1">  
              <input type="checkbox" value="None" id="slide1" name="check1" /> 
              <label for="slide1"></label>
            </div>
            <br> 
            
          Température actuelle :
<!--Affiche la température moyenne de la maison -->
<?php echo $moyenne; ?>
<br><br>      

          Valeur désirée : 
<!--Changement de la température -->
<form action="" method="POST">
  
  
  <?php $tempactuelle = (float) $moyenne ?>
  <div class="Parametrage-de-la-temperature"> 
  <input type="number" name="temp1" value="<?php echo $tempactuelle ?>" min="0" max="50" step="0.5" required/>C°
  </div>
      </figcaption>
     <br>
    </figure>
</div>  

                
<!-- Partie Luminosit� -->
<!-- Affiche On s'il y a au moins une lumière activé. Si on met Off, toutes les lumières sont éteintes-->

      <div class="element">
      <figure >
      <?php if ($lumiere['donnee_recue']==1) {echo '<img src="vues/styles/image/logo_lumiere2.jpg" alt="Lumi�re" id="lum" >';} 
else {echo '<img src="vues/styles/image/logo_lumiere.jpg" alt="Lumi�re" id="lum">';} ?>
      <!-- Fenetre pop-up qui affiche la liste des obj connectes -->
	<div id="modal_lum" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close1">&times;</span>
		    <h2>Liste des objets connectés</h2>
		  	</div>
		  	<div class="modal-body">
			<?php include "vues/liste_capteur.php"; ?>
			</div>  
		</div>
	</div>
        <figcaption>
        	 <div class="slide2"> 
        
            <input type="checkbox" value="None" id="slide2" name="check2"  <?php echo $checked=($lumiere['donnee_recue']==1)?'checked':''; ?> >
            <label for="slide2"></label>

          </div>
          

        </figcaption>
      <br>
      
   
    </figure>
    </div>



<!-- Partie s�curit� -->

        <div class="element">
        <figure>
        <?php if ($securite['donnee_recue']==0)
{
  echo '<img src="vues/styles/image/logo_securite.jpg" alt="Securite" id="secu">';
} 
      else
  {echo '<img src="vues/styles/image/logo_securite2.jpg" alt="Securite" id="secu">';
} ?>
        <div id="modal_secu" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close2">&times;</span>
		    <h2>Liste des objets connectés</h2>
		  	</div>
		  	<div class="modal-body">
			<?php include "vues/liste_capteur.php"; ?>
			</div>  
		</div>
	</div>
        <figcaption>
            	<div class="slide3">  
              <?php
         
              
          ?>
              		<input type="checkbox" value="None" id="slide3" name="check3" <?php echo $checked=($securite['donnee_recue']==1)?'checked':''; ?> />
            		<label for="slide3"></label>
       
          		</div>
          	</figcaption>
        	<br>
        </figure>
      	</div>
      	</div>
<form action ="" method='POST'>
<input type="submit" name='submittemp' class ='submit'/></form>        
 


</div>
  
<p>


</p>
</section>
<script src="jquery-3.0.0.js"></script>


<script src="vues/js/popup_liste.js"></script>

</body>
</html> 
