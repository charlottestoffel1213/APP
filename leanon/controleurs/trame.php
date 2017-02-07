<?php
include "../modele/connexion_bdd.php";
include "../modele/obj_connectes.php";
include "../modele/functions.php";
$data_tab = file_get_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999');
$trame = str_split($data_tab ,33);
for($i=0, $size=count($trame); $i<40; $i++){
 $tram = $trame[$i];


list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($tram,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
if ($v == 1111){
	$v= 1 ;
}
if ($v == 0000){
	$v= 0 ;
}
if ($c == 5 ){
	$c = 2; 
}
if ($c == 4){
	$v= $v[2].$v[3].'%';
	
}
if ($c ==3){
	$v=$v[1].$v[2].','.$v[3].'°';
	$c = 1;
	
   } 

$values = array( 'id_categorie_objets_connectes' => $c, 'code' => $a,'donnee_recue' =>$v, 'id_type_objets_connectes' => $r, 'id_piece' => 0);
$table = 'obj_connectes';
$inscription = insertion($bdd, $values, $table); 



}
