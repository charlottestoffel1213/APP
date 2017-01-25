

<!DOCTYPE html>
<html>
<head>
	<title>PROFIL</title>
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
</head>
	<body>
		
			<H1>
				Bienvenue <?php echo $_SESSION['username']; ?>	
			</H1><br>
			<h2>Voici votre espace personnel
			</h2>
			<h1><a href=""><img src="/leanon/vues/styles/image/connexion2.jpg" ></a></h1>
		


		<br/>
		<div id="info">
		<h2><div align="center">Informations</div></h2><div align="center">
			Pseudo : <?php echo $_SESSION['username']; ?></div>
		<br/><div align="center">
			E-mail : <?php echo $_SESSION['mail']; ?></div>
		<br/><div align="center">
			Nom : <?php echo $_SESSION['nom']; ?></div>
		<br/><div align="center">
			Prénom : <?php echo $_SESSION['prenom']; ?></div>
		<br/><div align="center">
			Date de naissance : <?php echo $_SESSION['naissance']; ?> </div>
		<br/><div align="center">
		Adresse : <div align="center">
			<?php echo $_SESSION['adresse']; ?>
		
			 <?php echo $_SESSION['ville']; ?>
		
			 <?php echo $_SESSION['postal']; ?></div>
		<br/><div align="center">
			Télephone : <?php echo $_SESSION['tel']; ?></div>
		<br/></br/>
		
		<?php
		if (isset($_SESSION['id']) AND ($_SESSION['id_type_utilisateur'] == 1)) //Si l'utilisateur est principal, il peut modifier son compte et ajouter des comptes secondaires
		{
		?>
		<div class="submit"><a href="index.php?cible=users&function=editprofil">Modifier mon profil</a></div>
		<?php
		}
		
		if (isset($_SESSION['id']) AND ($_SESSION['id_type_utilisateur'] == 3)) //Si l'utilisateur est principal, il peut modifier son compte et ajouter des comptes secondaires
		{
		?>
		<a href="index.php?cible=users&function=liste"> <button >Afficher la liste des utilisateurs </button></a></div>
		
		<?php
		}
		?>
		</div>
				
		
	</body>
</html>
