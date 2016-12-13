<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<?php
//Genere le code HTML de l'entete
function entete($connecte){
    ob_start(); /*Penser a modifier les liens du menu pour plus tard*/
    ?>
    <img src="Typographie/Logo.jpg">
		<?php
			if ($connecte) { 
				echo ('<nav>
							<ul> 
								<li><a href="accueil.php">Accueil</a></li>
								<li><a href="ma_maison.php">Ma maison</a></li>
								<li><a href="Mon_compte.php">Mon compte</a></li>
								<li><a href="ma_boutique.php">Boutique</a></li>
								<li><a href="Nous contacter.html">Nous contacter</a></li>
							</ul>
						</nav>');}
			else {
				echo ('<nav>
							<ul> 
								<li><a href="accueil.php">Accueil</a></li>
								<li><a href="ma_boutique.php">Boutique</a></li>
								<li><a href="Nous contacter.html">Nous contacter</a></li>
							</ul>
						</nav>');
			}?>
			
		
    <?php
    $entete = ob_get_clean();
    return $entete; 
}
function connexion($connecte){ //Pas terminer, il faut completer avec formulaire 
	if ($connecte){
		echo ('Deconnexion');
	}
	else {
		echo ('Inscription <br/> Connexion');
	}
	$co = ob_get_clean();
    return $co;
}
//Genere la page html du menu
function menu($etape){
    ob_start();
    ?>
        <ul>
            <?php 
                switch ($etape){
                	case "Mon Compte":
                    echo('<li><a href="mes_info.html">Mes info</a></li>
                    	<li><a href="Payement.html">Payement</a></li>
                    	<li><a href="Deconnexion.html">Deconnexion</a></li>');
                    break;
                    case "Ma Boutique":
                    echo('<li><a href="Nos_offres.html">Nos offres</a></li>
                    	<li><a href="Nos_produits.html">Nos produits</a></li>
                    	<li><a href="Assistance.html">Assistance</a></li>');
                    break;
                    case "Ma Maison": //A revoir 
                    echo('<li><a href="ma_maison.html">Ma Maison</a></li>
                    	<li><a href="salon.html">Salon</a></li>
                    	<li><a href="cuisine.html">Cuisine</a></li>
                    	<li><a href="salle_de_bain.html">Salle de bain</a></li>
                    	<li><a href="Toilette.html">Toilette</a></li>
                    	<li><a href="Chambre_parental.html">Chambre des parents</a></li>
                    	');
                    break;
                    case false :
                    echo none;
                }
     
            ?>
        </ul>
    <?php
    $menu = ob_get_clean();
    return $menu;
}

//Genere le code HTML du pied de page
function pied(){
    ob_start(); /*Penser a modifier les liens pour plus tard*/
    ?>
    <footer>
    	
    	<ul>
			<li><a href="Ma boutique.html">Conditions générales d'utilisation</a></li>
			<li><a href="Nous contacter.html">A propos de nous</a></li>
		</ul>
	</footer>
    <?php
    $pied = ob_get_clean();
    return $pied;
}
/* pour utiliser ces fonctions, il suffit de faire par exemple 
$header=entete();
echo($header); */
?>