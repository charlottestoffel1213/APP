<?php

	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=127.0.0.1; dbname=leanon','root','',$pdo_options);
	}
	catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
?>