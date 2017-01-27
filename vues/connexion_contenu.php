<html>
<head>
	<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
	<title>CONNEXION LeanOn</title>
</head>
<body>

	<div align="center"  class="container">	
		<form method="POST" action="" class="global">
			<div id="block">
				<legend align="center"><H1>Espace client</H1></legend>
				<?php if($alerte) { ?>
						<p><FONT color="red"> 
   						 Attention : <?= $alerte; ?>
						</p></FONT>
						<?php } ?>
				<br/>
				<table>

				<tr>	
					<td align="center">
						<input type="text"  placeholder = "Votre pseudo" name="username" class="textblock pseudo"  />
					</td>
				</tr>
			
				<tr>
					<td align="center">
						<input type="password"  placeholder = "Votre mot de passe" name="password" class="textblock password"  />
					</td>
				</tr>
			
				</table>	
				<br/>
				<input type="submit" value="Se connecter" name="submit" class="submit">
				
				<div class="new"><h4><a href="index.php?cible=users&function=inscription">Je n'ai pas de compte</a></h4></div>
			</div>
		</form>
		
	</div>
</body>
</html>
