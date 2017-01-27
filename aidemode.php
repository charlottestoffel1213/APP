<?php
/* if(isset($_SESSION['maison']))*/
		if(isset($_POST['submit'])){
			 if (isset($_POST['nom_modep']) AND isset($_POST['temp']) AND isset($_POST['lumière'])){
			
			$id_maison = 13 /* intval($_POST['maison'])*/;
			$nom_modep = htmlspecialchars($_POST['nom_modep']);
            $temp = (int)$_POST['temp'];
            $lumière = (int)$_POST['lumière'];
            $caméra = (int)$_POST['caméra'];
            $volets = (int)$_POST['volets'];
            $portes = (int)$_POST['portes'];
            $dateD = date('Y-m-d');
            $heureD = date('h-i');
            $dateF = date('Y-m-d');
            $heureF = date('h-i'); 

            $values = array('id_maison' => $id_maison, 'nom_modep' => $nom_modep, 'temp' => $temp, 'lumière' => $lumière, 'caméra' => $caméra, 'volets' => $volets, 'portes' => $portes, 'dateD' => $dateD, 'heureD' => $heureD, 'dateF' => $dateF, 'heureF' => $heureF);
            $table = 'mode_obj_pers';
            $retour = insertion($bdd, $values, $table);

              if ($retour){
               echo "enregistré!";
            }

            }
             
        }
?>