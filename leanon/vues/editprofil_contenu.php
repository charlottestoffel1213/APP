<!DOCTYPE html>
<html>
<head>
	<title>Editer profil</title>
	<link rel="stylesheet" type="text/css" href="vues/styles/connexion_typo.css">
</head>
	<body>
		<div align="center"><h2>Editer mon profil</h2>
		<form method="POST" action="">
			<?php if (isset ($erreur)){
				echo '<font color = red>' . $erreur . '</font>';
			}?>
			<table>
				<tr>	
					<td align="right">Pseudo :
						<input type="text" name="newusername" value="<?php echo $user['username'];?>" />
					</td>
				</tr>
				<tr>
					<td align="right">Email :
						<input type="text" name="newmail" value="<?php echo $user['mail']?>" />
					</td>
				</tr>
				<tr>
					<td align="right"> Mot de passe :
						<input type="password" placeholder="Votre mot de passe" name="password" />
					</td>
				</tr>
				<tr>
					<td align="right"> Votre nouveau mot de passe :
						<input type="password" placeholder="Votre mot de passe" name="newpassword" />
					</td>
				</tr>
				<tr>
					<td align="right"> Repetez votre nouveau mot de passe : 
						<input type="password" placeholder="Répétez mot de passe" name="newpassword2" />
					</td>
				</tr>
				<tr>
					<td align="right"> Nom: 
						<input type="text"  name="newnom"  value="<?php echo $user['nom']?>"/>
					</td>
				</tr>
				<tr>
					<td align="right"> Prénom: 
						<input type="text"  name="newprenom"   value="<?php echo $user['prenom']?>"/>
					</td>
				</tr>
				<tr>
					<td align="right"> Date de naissance : 
						<input type="date"  name="newnaissance"  value="<?php echo $user['naissance']?>" />
					</td>
				</tr>
				<tr>
					<td align="right"> Adresse: 
						<input type="text"  name="newadresse" value="<?php echo $user['adresse']?>"/>
					</td>
				</tr>
				<tr>
					<td align="right"> Ville : 
						<input type="text"  name="newville"  value="<?php echo $user['ville']?>"/>
					</td>
				</tr>
				<tr>
					<td align="right">Code postal : 
						<input type="text"  name="newpostal"   value="<?php echo $user['postal']?>"/>
					</td>
				</tr>
				<tr>
					<td align="right"> Télephone: 
						<input type="text"  name="newtel" value="<?php echo $user['tel']?>"/>
					</td>
				</tr>
				
				<tr>
					<td align="center">Avatar
						<input type="file" name="avatar"/>
					</td>
				</tr>	
			</table>	
					
			
					<br/>
					<br/>
						<input type="submit" value="Modifier" name="submit" class="submit">
		</form>
	</div>
		
	</body>
</html>

