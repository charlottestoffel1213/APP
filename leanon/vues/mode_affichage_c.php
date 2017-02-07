<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="vues/styles/connexion_typo.css">
<link rel="stylesheet" href="vues/styles/maison_vue.css" />
</head>
<body>
<a href = 'index.php?cible=users&function=mode'><button>Retour</button></a>
<h1> <?= $name?></h1>
<div id="Controle">

<div class='aff_mode'><img src="vues/styles/image/logo_lumiere.jpg" alt="Lumière" id="lum">
<br/>
<?php echo $lum ;?>
</div>
<div class='aff_mode'><img src="vues/styles/image/logo_securite.jpg" alt="Securite" id="secu">
<br/>
<?php echo $secu ;?>
</div>
<div class='aff_mode'><img src="vues/styles/image/logo_temperature.jpg" alt="Temperature" >
<br/>
<?php  echo $temp ;?>
</div>






</div>
</body>
</html>