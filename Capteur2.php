<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">


<title>Lean On : Here for you !</title>
</head>
<body>
	<img class="logo" alt="logo du site" src="F:/XAMP/htdocs/tests/logo.png">
			<nav class= "menu">
					<ul>
						<li><a href="Accueil.html">Accueil</a></li>
						<li><a href="Ma maison.html">Ma maison</a></li>
						<li><a href="Mon compte.html">Mon compte</a></li>
						<li><a href="Ma boutique.html">Ma boutique</a></li>
						<li><a href="Nous contacter.html">Nous contacter</a></li>
					</ul>
			</nav>
	<section>
		<nav>
	</nav>
		<h1 class=Température>Capteur 1</h1>


<form method="post" action="Capteur 1.php">
<fieldset>
       <legend>CONFIGURATION</legend>
<p>TEMPERATURE: <select name="MODE"></p>
    <option value="ON">ON</option>
    <option value="OFF">OFF</option>
</select>
</br>
 
 <p><input type="text" name="temperature" value="21" required/> degré ?</p>

<input type="range" min="10" max="30" step="1" />

<p>MODE: <select name="MODE"></p>
    <option value="AUTO">AUTO</option>
    <option value="DEFAUT">DEFAUT</option>
    <option value="PERSO 1">PERSO 1</option>
    <option value="PERSO 2">PERSO 2</option>
</br>
<input type="submit" value="CONFIRMER" />
</br>
</fieldset>
</form>

</br>
</br>

<form method="post" action="programmation.php">
<fieldset>
<legend>PROGRAMMATION</legend>

<p>PROGRAMMATION: <select name="MODE2"></p>
    <option value="ON">ON</option>
    <option value="OFF">OFF</option>
</select>
</br>
<p>DATES:<input type="date" /> à <input type="date" /></p>

<p>EN FIN DE PROGRAMMATION:<select name="MODE2"></p>
    <option value="STOP">STOP</option>
    <option value="MODE AUTO">MODE AUTO</option>
    <option value="CONFIG PRECEDENTE">CONFIG PRECEDENTE</option>
</select>

<p>Notifications de la Temperature ?:<select name="notifications"></p>
<option value="oui">OUI</option>
<option value="non">NON</option>
 </select>
</br>

<input type="submit" value="CONFIRMER" />

</fieldset>
</form>

	</section>

</body>
<footer>
		<ul>
			<li><a href="Ma boutique.html">Conditions générales d'utilisation</a></li>
			<li><a href="Nous contacter.html">Nous contacter</a></li>
		</ul>
		
</footer>
</html>
