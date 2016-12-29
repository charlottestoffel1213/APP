
	$attributs = '' ;
	$valeurs = '';
	foreach($values as $key => $value) {

	$attributs .= $key . ', ' ;
	$valeurs .= ':' . $key . ', ';
	$v[] =  $value;
	}
	$attributs = substr_replace($attributs, '', -2, 2);
	$valeurs = substr_replace($valeurs, '', -2, 2);


	$query = ' INSERT INTO ' .$table. ' (' . $attributs . ') VALUES (' . $valeurs .')';

echo "query : " .$query;
echo "<br>";
echo "table : ".$table;
echo "<br>";
echo "attributs : ".$attributs;
echo "<br>";
echo "valeurs : ".$valeurs;
echo "<br>";
echo "<pre>";
var_dump($v);
echo "</pre>";

$query = "INSERT INTO mvc (username, password) VALUES (:username, :password)";
$table = "mvc";
$attributs = "username, password";
$valeurs = "(:username, :password)";
$v = ["cha", "$2y$10$Vkh/0l1Ae0ccGEZcdZAeMerBbcxHE2La0JAJL6CpFoCkXNwHdJlty"];