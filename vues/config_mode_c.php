<!DOCTYPE html>
<html>
<head>
	<meta charset="utf_8">
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/pop_up.css">
</head>
<body>
<div class="configurer">
	<div class="ajout_piece" id='ajout_piece'>
		<h2><a href="index.php?cible=users&amp;function=mode_ajout">Ajouter un mode</a></h2>
	</div>
	<!--  fenetre pop-up  -->
	<div id="modal_ajout" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close">&times;</span>
		    <h2><a href="vues/mode_ajout.php">Ajouter un mode</a></h2>
		  	</div>
		  	<div class="modal-body">
			<?php include "vues/mode_ajout.php"; ?>
			</div>
		</div>
	</div>
	
	<div class="renommer_piece" id="renommer_piece">
		<h2><a href="index.php?cible=users&amp;function=mode_renommer"> Renommer un mode</a> </h2>
	</div>
	<!--  fenetre pop-up  -->
	<div id="modal_renom" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close1">&times;</span>
		    <h2><a href="vues/mode_renommer.php"> Renommer un mode</a> </h2>
		  	</div>
		  	<div class="modal-body">
			<?php include "vues/mode_renommer.php"; ?>
			</div>
		</div>
	</div>
</div>



<!--<script src="vues/js/ajout_piece.js"></script>
<script src="jquery-3.0.0.js"></script>-->
</body>
</html>
