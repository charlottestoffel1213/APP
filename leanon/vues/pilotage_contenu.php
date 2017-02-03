<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf_8">
		<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/pop_up.css">
	</head>

<body>

<?php if ($_GET['piece']=='Maison'){ ?>
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
		<?php include "controleurs/users_js.php";
		include "vues/etat_obj.php"; ?>
		</div>
	</div>
</div>
<script src="vues/js/popup_verif.js"></script>

<?php }?>

<!-- Partie temperature -->

<div id="Controle">


     
        
                
<!-- Partie Luminosit� -->
<!-- Affiche On s'il y a au moins une lumière activé. Si on met Off, toutes les lumières sont éteintes-->

      <div class="element">
      <figure >
      
      <?php 
if ( (isset($detection_lum['nb']) AND $detection_lum['nb'] == 0) OR ($_GET['piece'] == 'Maison' AND $detection_lum == 0) )
      
      // s'il n'y a aucune lumiere allum�e, alors affiche image ampoule eteint
      {
      	echo '<img src="vues/styles/image/logo_lumiere.jpg" alt="Lumi�re" id="lum">';
      }
      else
      {
      	
      	echo '<img src="vues/styles/image/logo_lumiere2.jpg" alt="Lumi�re" id="lum" >';
      }
      
      ?>
     



      <!-- Fenetre pop-up qui affiche la liste des obj connectes -->
	<div id="modal_lum" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close1">&times;</span>
		    <h2>Liste des objets connectés</h2>
		  	</div>
		  	<div class="modal-body">
		  	
			<form action="" method="POST">
		  	<?php include "controleurs/users_js.php";
			include "vues/liste_capteur_lum.php"; ?>
			</form>
			</div>  
		</div>
	</div>
        <figcaption>

 
          <form action="" method="post">
              <button type="submit" id="button" name='Activer_lumiere' value='Allumer la lumi�re'><span> Allumer la lumière </span></button>
          </form>

        
 
          <form action="" method="post">
              <button type="submit" id="button" name='Desactiver_lumiere' value='Eteindre la lumiére'><span> Eteindre la lumière </span></button>
          </form>


          
     
        </figcaption>
      <br>
      
   
    </figure>
    </div>



        <!-- Partie humidit� -->

        <div class="element" >
        <figure>
        <img src="vues/styles/image/humiditelogo.jpg" alt="Humidite" id="humi">

        
        <figcaption>
          Humidité actuelle :
              <?php
        echo $moyenne_humi;
        ?>
        <br><br> 






            
        </figcaption>
          <br>
        </figure>
        </div>












<!-- Partie s�curit� -->

        <div class="element">
        <figure>
         <?php 
         
if ( (isset($detection_secu['nb']) AND $detection_secu['nb'] >=1) OR ($_GET['piece'] == 'Maison' AND $detection_secu >=1)) 
{echo '<img src="vues/styles/image/logo_securite.jpg" alt="Securite" id="secu">';
    // s'il y a au moins un qui est eteint, affiche que la securit� est desactiv�
} else {
  echo '<img src="vues/styles/image/logo_securite2.jpg" alt="Securite" id="secu">';
    
}
?>


        <div id="modal_secu" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close2">&times;</span>
		    <h2>Liste des objets connectés</h2>
		  	</div>
		  	<div class="modal-body">
		  	
			<form action="" method="POST">
			<?php "controleurs/users_js.php";
			include "vues/liste_capteur_secu.php"; ?>
			</form>
			</div>  
		</div>
	</div>
        <figcaption>


                    <form action="" method="post">
                    <button type="submit" id="button" name='Activer_securite' value='Activer la sécurité'><span>Activer la sécurité</span></button>
                    </form>

                
         
                    <form action="" method="post">
                    <button type="submit" id="button" name='Desactiver_securite' value='Désactiver la sécurité'><span>Désactiver la sécurité</span></button>
                    </form>




          		
          	</figcaption>
        	<br>
        </figure>
      	</div>

        <!-- Partie temperature -->
    <form action="" method="POST">
    <div class="Temperature">
    <figure>

    
	  <?php if ($moyenne > 0) {echo '<img src="vues/styles/image/temperature2.jpg" alt="Temperature" >';} 
	  else {echo '<img src="vues/styles/image/logo_temperature.jpg" alt="Temperature" >';} ?>
  <figcaption>
    <div id = "modif-temps">          
	          Température actuelle :
		<!--Affiche la température moyenne de la maison -->
		<?php echo $moyenne; ?> 
		<br><br>      
	
	          Valeur désirée : 
		<!--Changement de la température -->
		
		  <div class="Parametrage-de-la-temperature"> 
		  	<input type="number" name="temp1" value="<?php echo $tempactuelle ?>" min="0" max="50" step="0.5" required/> C°
		  </div>
		
	</div>
	</figcaption>
		  <br>
		  </figure>
	 
</div>
</div>

<input type="submit" name='submittemp' class ='submit'/>
</form>
<script src="jquery-3.0.0.js"></script>


<script src="vues/js/popup_liste.js"></script>

</body>
</html> 
