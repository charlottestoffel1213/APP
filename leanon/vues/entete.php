
<!DOCTYPE html>
<html>
<head>
	<title>PROFIL</title>
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/structure.css">
</head>
	<body>
		<div id = "nav"> 
						
					
					
	<?php 
//Si l'utilisateur est principal
if (isset($_SESSION['id']) AND ($_SESSION['id_type_utilisateur'] == 1)) 
{
?>
	<a href="/leanon/index.php"><img src="/leanon/vues/Typographie/Logo.jpg"></a>
	<div class="block"><a href="/leanon/index.php">Accueil</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=pilotage&piece=Maison">Maison</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=compte">Compte</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=boutique">Boutique</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=contacter">Nous contacter</a></div>
	
<?php
}
?>
<?php
//Si l'utilisateur est la maintenance
if (isset($_SESSION['id']) AND ($_SESSION['id_type_utilisateur'] == 3)) 
{
?>
	<a href="/leanon/index.php"><img src="/leanon/vues/Typographie/Logomaintenance.jpg">
	
	<div class="block maintenance"><a href="index.php?cible=maintenance&amp;function=compte">Compte</a></div>
	<div class="block maintenance"><a href="index.php?cible=maintenance&amp;function=boutique">Boutique</a></div>
	<div class="block maintenance"><a href="index.php?cible=maintenance&amp;function=contacter">Nous contacter</a></div>
	
<?php
}
?>

<?php
//Si l'utilisateur secondaire
if (isset($_SESSION['id']) AND ($_SESSION['id_type_utilisateur'] == 2)) 
{
?>
	<a href="/leanon/index.php"><img src="/leanon/vues/Typographie/Logo.jpg"></a>
	<div class="block"><a href="/leanon/index.php">Accueil</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=pilotage&piece=Maison">Maison</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=compte">Compte</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=boutique">Boutique</a></div>
	<div class="block"><a href="index.php?cible=users&amp;function=contacter">Nous contacter</a></div>
<?php
}
?>
		
			</ul>
	</div>

    <div id = "rien">
    </div>


	</body>
</html>
