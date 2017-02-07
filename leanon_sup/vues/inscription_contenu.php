<head>
    <link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">
    <title>INSCRIPTION LeanOn</title>
</head>
<body>
        

<div align="center" class="container2" >
  <form method="POST" action="" class="global">
  	<div id="block2">
  		<h1>Inscription</h1>
        <?php if(isset($alerte)){
                echo '<font color = red>' . $alerte . '</font>';
        	} ?>
        <table>
        	<tr>
        		<td><label for="username" >Pseudo (*) : </label>
        		<input type="text"   name="username"  class="textblock" id='username' required/>
        		</td>
        	</tr>
        	<tr>
        		<td><label for="mdp">Mot de passe (*) : </label>
        		<input type="password"  name="password"  class="textblock" id='mdp' required />
        		</td>
        	</tr>
        	<tr>
        		<td><label for='verif'>Confirmation du mot de passe (*) :</label>
        		<input type="password"  name="password_verif"  class="textblock" id='verif' required />
        		</td>
        	</tr>
        	<tr>
        		<td><label for='mail'>E-mail (*) : </label>
        		<input type="text"  name="mail"  class="textblock" id='mail' required/>
        		</td>
        	</tr>
        	<?php if (!isset($_GET['type'])){ ?>
        	<tr>
        		<td><label for='code'>Code Client (*) :</label>
        		<input type="text"  name="code"  class="textblock" id ='code' required/>
        		</td>
        	</tr>
        	<?php } ?>
        	<tr>
        		<td><label for='nom'> Nom: </label> 
        		<input type="text"  name="nom" class="textblock" id='nom'/>
        		</td>
        	</tr>
        	<tr>
        		<td><label for='prenom'> Prénom:</label>
        		<input type="text"  name="prenom"  class="textblock" id='prenom'/>
        		</td>
        	</tr>
        	<tr>
        		<td><label for='naissance'> Date de naissance :</label> 
        		<input type="date"  name="naissance" class="textblock" id='naissance' />
        		</td>
        	</tr>
        	<tr>
        		<td><label for="adresse"> Adresse: </label>
        		<input type="text"  name="adresse" class="textblock" id='adresse'/>
        		</td>
        	</tr>
        	<tr>
        		<td><label for='ville'> Ville :</label> 
        		<input type="text"  name="ville" class="textblock" id='ville' />
        		</td>
        	</tr>
        	<tr>
        		<td><label for='postal'>Code postal : </label>
        		<input type="text" name="postal" class="textblock" id='postal' />
        		</td>
        	</tr>
        	<tr>
        		<td><label for='tel'> Télephone: </label>
        		<input type="text"  name="tel" class="textblock" id='tel' />
        		</td>
        	</tr>
        </table>
        	<p> (*) Champs obligatoires </p>
        <input type="submit" value="S'inscrire" name="submit" class="submit">
    </div>
  

</form>
</div>
</body>
</html>
