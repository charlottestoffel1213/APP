<!DOCTYPE html>
<html>
<head>
	<meta charset="utf_8">
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/pop_up.css">
</head>
<body>
<div class="configurer">
	<div class="ajout_piece" id='ajout_piece'>
		<h2>Ajouter une piece</h2>
	</div>
	<!--  fenetre pop-up  -->
	<div id="modal_ajout" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close">&times;</span>
		    <h2>Ajouter une piece</h2>
		  	</div>
		  	<div class="modal-body">
			<?php include "vues/configuration_ajout.php"; ?>
			</div>
		</div>
	</div>
	
	<div class="renommer_piece" id="renommer_piece">
		<h2> Renommer une piece </h2>
	</div>
	<!--  fenetre pop-up  -->
	<div id="modal_renom" class="modal">
  		<!-- contenu du modal-->
		<div class="modal-content">
			<div class="modal-header">
		    <span class="close1">&times;</span>
		    <h2>Renommer une piece</h2>
		  	</div>
		  	<div class="modal-body">
			<?php include "vues/configuration_renommer.php"; ?>
			</div>
		</div>
	</div>
</div>



<script src="vues/js/ajout_piece.js"></script>
<script src="jquery-3.0.0.js"></script>
</body>
</html>
