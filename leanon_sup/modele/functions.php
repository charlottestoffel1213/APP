<?php

// Requete SQL SELECT
function selection($bdd, $table, $attributs, $condition,$valuecond) {
    
    if($condition=='' AND $valuecond ==''){
        $query = 'SELECT ' . $attributs . ' FROM ' . $table;
    } elseif ($valuecond == 'rien') {
        $query = 'SELECT ' . $attributs . ' FROM ' . $table . ' WHERE ' . $condition ;

    }else{
    $valuecond= "'" . $valuecond . "'"; //pour les $_GET
    $query = 'SELECT ' . $attributs . ' FROM ' . $table . ' WHERE ' . $condition . ' = ' .  $valuecond ;}
    
    return $bdd->query($query);
}

// Requete SQL INSERT INTO
function insertion($bdd, $values, $table) {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }
    $attributs = substr_replace($attributs, '', -2, 2);
    $valeurs = substr_replace($valeurs, '', -2, 2);

    $query = ' INSERT INTO ' . $table . ' (' . $attributs . ') VALUES (' . $valeurs . ')';

    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }

    return $donnees->execute();
}

// Requete SQL UPDATE
function update($bdd, $table, $attribut, $value, $condition,$valuecond) {

    if($condition=='' AND $valuecond==''){
        $query = ' UPDATE ' . $table . ' SET ' . $attribut . ' = ' . $value ;
    }else {
        if ($valuecond == ''){
            $query = ' UPDATE ' . $table . ' SET ' . $attribut . ' = ' . $value . ' WHERE ' . $condition;
        } else{
            $query = ' UPDATE ' . $table . ' SET ' . $attribut . ' = ' . $value . ' WHERE ' . $condition . ' = ' . $valuecond;
        }
    }
    $donnees = $bdd->prepare($query);
    return $donnees->execute();
}

//Sécurité injection sql
function securite_bdd($string){
    // On regarde si le type de sring est un nb entier (int)
    if(ctype_digit($string)) {
        $string = intval ($string);
    }
    // Pour tous les autres types 
    else {
        $string = mysql_real_escape_string($string);
        $string = addcslashes($string, '%_');
    }
    return $string;
}

function verif_connexion($bdd,$username,$password){
	
	$requser = $bdd->prepare("SELECT * FROM utilisateur WHERE  username = :username AND password = :password");
	$requser->execute(array('username'=>$username, 'password'=>$password));
	$userexist = $requser->rowCount();
	
	return $userexist;
}

function recup_connexion($bdd,$username,$password){
	$requser = $bdd->prepare("SELECT * FROM utilisateur WHERE  username = :username AND password = :password");
	$requser->execute(array('username'=>$username, 'password'=>$password));
	$userinfo = $requser->fetch();
	return $userinfo;
	
}
?>