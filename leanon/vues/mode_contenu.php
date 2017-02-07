<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="vues/styles/connexion_typo.css">
	<link rel="stylesheet" href="vues/styles/maison_vue.css" />
</head>
<body>

<div class='mode_corps'>
	<!-- Si on veut supprimer un mode -->
	<?php if (isset($_POST['supprimer'])){ ?> 
	
	<a href = 'index.php?cible=users&function=mode'><button>Retour</button></a>
	
	<h1> Supprimer un mode </h1>
	<form action='' method='POST'>
	<div class='supprimer_mode'>
		<label for='supprimer'>Supprimer ce mode : </label>
		<select name="mode_a_supprimer" id='supprimer'>
			<?php foreach($requete as $key) {?>
			<option value="<?=$key['nom_mode'] ?>" > <?= $key['nom_mode'] ?> </option>
			<?php }?>
		</select>
	</div>
	<input type = 'submit' name = 'supp_mode' value='Supprimer' class = 'submit'>
	</form>

	
	<!-- Si on veut ajouter un mode -->
	<?php }elseif (isset($_POST['ajouter_mode'])){ ?>
	
	<a href = 'index.php?cible=users&function=mode'><button>Retour</button></a>
	
	<h1> Ajouter un mode </h1>
	<form action='' method='POST'>
	<div class="ajout_corps">
	
	<table class='ajout_mode'>
		<tr>
			<td>
				<label for='nom_mode'> Nom du mode : </label>
			</td>
			<td class='mode_check'>
				<div class="mode_text">
				<input type='text' id='nom_mode' name='nom_mode'>
				</div>
			</td>
		</tr>
			
		<tr>
			<td> 
				<label for='temp'> Température : </label>
			</td>
			<td class='mode_check'>
				<div class="Parametrage-de-la-temperature" align ='left'> 
				<input type="number" name="temp" id='temp' min="0" max="50" step="0.5" required/>
				</div>
			</td>
		</tr>
		<tr>
			<td >
				Lumi&egrave;re : 
			</td>
			<td class='mode_check'>
				<div class="onoffswitch">
			        <input type="checkbox" name="lum" class="onoffswitch-checkbox" id="myonoffswitch_lum" value='1'>
			        <label class="onoffswitch-label" for="myonoffswitch_lum">
			            <span class="onoffswitch-inner"></span>
			            <span class="onoffswitch-switch"></span>
			        </label>
	    		</div>
			</td>
		</tr>
		<tr>
			<td>
				Sécurité : 
			</td>
			<td class='mode_check'>
				<div class="onoffswitch">
			        <input type="checkbox" name="secu" class="onoffswitch-checkbox" id="myonoffswitch_secu" value='1'>
			        <label class="onoffswitch-label" for="myonoffswitch_secu">
			            <span class="onoffswitch-inner"></span>
			            <span class="onoffswitch-switch"></span>
			        </label>
			    </div>
			
			</td>
		</tr>
	</table>
	</div>
	<input type='submit' name='ajout' class = 'submit'>
	
	
	</form>
	</div>
	
	<!-- Si on veut modfier un mode -->
	<?php } elseif(isset($_POST['modif'])){ ?>
	
	<a href = 'index.php?cible=users&function=mode'><button>Retour</button></a>
	
	<h1> Modifier un mode </h1>
	<form action='' method='POST'>
	
	
	<div class="ajout_corps">
	
	<table class='ajout_mode'>
		<tr>
			<td>
				<label for='ancien_mode'>Mode &agrave; modifier : </label>
			</td>
			<td class='mode_check'>
				<div class='liste_mode'>
				<select name="ancien_mode" id='ancien_mode' class='liste_mode'>
					<?php foreach($requete as $key) {?>
					<option value="<?=$key['nom_mode'] ?>" > <?= $key['nom_mode'] ?> </option>
					<?php }?>
				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<label for='nom_mode'> Nom du mode : </label>
			</td>
			<td class='mode_check'>
				<div class="mode_text">
				<input type='text' id='nom_mode_modif' name='nom_mode_modif'>
				</div>
			</td>
		</tr>
			
		<tr>
			<td> 
				<label for='temp_modif'> Température : </label>
			</td>
			<td class='mode_check'>
				<div class="Parametrage-de-la-temperature" align ='left'> 
				<input type="number" name="temp_modif" id='temp_modif' min="0" max="50" step="0.5" required/>
				</div>
			</td>
		</tr>
		<tr>
			<td >
				Lumi&egrave;re : 
			</td>
			<td class='mode_check'>
				<div class="onoffswitch">
			        <input type="checkbox" name="lum_modif" class="onoffswitch-checkbox" id="myonoffswitch_lum" value='1'>
			        <label class="onoffswitch-label" for="myonoffswitch_lum">
			            <span class="onoffswitch-inner"></span>
			            <span class="onoffswitch-switch"></span>
			        </label>
	    		</div>
			</td>
		</tr>
		<tr>
			<td>
				Sécurité : 
			</td>
			<td class='mode_check'>
				<div class="onoffswitch">
			        <input type="checkbox" name="secu_modif" class="onoffswitch-checkbox" id="myonoffswitch_secu" value='1'>
			        <label class="onoffswitch-label" for="myonoffswitch_secu">
			            <span class="onoffswitch-inner"></span>
			            <span class="onoffswitch-switch"></span>
			        </label>
			    </div>
			
			</td>
		</tr>
	</table>
	</div>
	<input type='submit' name='modif_mode' class = 'submit'>
	
	
	</form>
	
	
	<!-- page qui affiche tous les modes -->
<?php }	else {?>
	<h1> Mes Modes </h1>
	
		<?php if (isset($alerte)){
	echo '<h2>' . $alerte . '</h2>' ; }?>
	<br/>
	
	<form action ='' method ='POST'>
	<div class='block_mode'>
		<input type="submit" name="mode_nuit" value = "Mode nuit" class='mode'>
		<a href='index.php?cible=users&function=mode_aff&mode=1'> <img src="vues/styles/image/info.png" class="img_info" > </a>
	
	</div>
	<div class='block_mode'>
		<input type="submit" name="mode_jour" value = "Mode jour" class='mode'> 
		<a href='index.php?cible=users&function=mode_aff&mode=2'> <img src="vues/styles/image/info.png" class="img_info" > </a>
	
	</div>
	<?php foreach($requete as $key) {?>
	<div class='block_mode'>
		<input type="submit" name="mode_perso" value = "<?= $key['nom_mode']?> "class='mode'>
		<a href='index.php?cible=users&function=mode_aff&mode=<?= $key['id']?>'> <img src="vues/styles/image/info.png" class="img_info" > </a>
	
	</div>
	<?php }
	
	if ($_SESSION['id_type_utilisateur'] == 1 ){?>
	<input type="submit" name="modif" value ="Modifier mes modes" class="mode_modif">
	<input type="submit" name="supprimer" value ="Supprimer un mode" class="mode_modif">
		
	<input type="submit" name="ajouter_mode" value = "&plus;" class='plus'> 
	
	<?php }?>
	
	</form>

	<?php }?>
</div>

</body>
</html>

