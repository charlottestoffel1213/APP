<?php 

	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=127.0.0.1; dbname=leanon','root','',$pdo_options);
	}
	catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
include '../leanon/modele/functions.php';
// On genere un code aléatoire et unique à 5 caractères 
$rand = openssl_random_pseudo_bytes(5);
$rand = substr(bin2hex($rand ), 0, 5);
echo 'code client : ' . $rand; /*C'est le code que le client obtient après avoir signer le contrat. Il devra rentrer ce code lors de l'inscription. 
Ce code permet de reconnaitre les vraie client Domisep et d'affecter une maison à l'user*/?> 
<br/> 
<?php
// Ceci est la maison affectée a l'users
$maison = 2;
echo 'maison : ' . $maison ;

// On protège le code client 
$code = md5($rand);
$values = array('code_client' => $code, 'id_maison' => $maison);
$table = 'code_client';
$req = insertion($bdd,$values,$table);
?> 