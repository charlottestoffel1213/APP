<?php

function selection($bdd, $table, $attributs = []) {
    
    if($attributs) {
        $attributs = 'à écrire';
    } else {
        $attributs = "*";
    }
    $query = 'SELECT ' . $attributs . ' FROM ' . $table;
    return $bdd->query($query);
}

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

//echo "query : " .$query;
//echo "<br>";
//echo "table : ".$table;
//echo "<br>";
//echo "attributs : ".$attributs;
//echo "<br>";
//echo "valeurs : ".$valeurs;
//echo "<br>";
//echo "<pre>";
//var_dump($v);
//echo "</pre>";

    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }

    return $donnees->execute();
}

?>