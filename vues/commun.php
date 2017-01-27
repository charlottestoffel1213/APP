
<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<?php
include 'modele/connexion_bdd.php';
//Genere le code HTML de l'entete
function entete($connecte){
    ob_start(); 
    ?>
		<?php
			if ($connecte) { 
				include("entete.php");
                }
			else {?>
    <a href="/leanon/index.php"><img src="/leanon/vues/Typographie/Logo.jpg"></a>
				<?php echo ('<div id = "nav">
							 
						  <div class="block"><a href="/leanon/index.php">Accueil</a></div>
						  <div class="block"><a href="index.php?cible=users&function=boutique">Boutique</a></div>
						  <div class="block"><a href="index.php?cible=users&function=contacter">Nous contacter</a></div>
							
						</div>

                    <div id = "rien">
                    </div>');
			}?>
			
		
    <?php
    $entete = ob_get_clean();
    return $entete; 
}
function connexion($connecte){  
	if ($connecte){
		echo ('<div id="membre">
            <div class="inscription">
                <a href="/leanon/index.php?cible=users&function=deconnexion">Deconnexion <br>(' . $_SESSION['username'] . ') </a>
            </div>
            </div>');
	}
	else {
		echo ('<div id= "membre">
            
            <div class="connexion">
                <a href="/leanon/index.php?cible=users&function=connexion"><img src="/leanon/vues/styles/image/connexion2.jpg" title="Connexion"></a>
            </div> 
            </div>');
	}
	$co = ob_get_clean();
    return $co;
}
//Genere la page html du menu
function menu($function){
    global $bdd,$_SESSION;
    ob_start();
    ?>
        <ul>
            <?php 
            if ($_GET['cible']=='users'){

                switch ($function){
                	case "compte":
                    echo('<li><a href="index.php?cible=users&function=compte">Mes infos</a></li>
                    	<li><a href = "index.php?cible=users&function=inscription&type=secondaire">Ajouter un compte</a></li>
                        <li><a href = "index.php?cible=users&function=gerer_compte">Gerer les comptes</a></li>
                        <li><a href = "index.php?cible=users&function=messagerie">Messagerie</a></li>');
                    break;
                    case "boutique":
                    echo('<li><a href="Nos_offres.html">Nos offres</a></li>
                    	<li><a href="Nos_produits.html">Nos produits</a></li>
                    	<li><a href="Assistance.html">Assistance</a></li>');
                    break;
                    case "pilotage": //A revoir 
                    $req1 = selection($bdd,'pieces','nom','id_maison', $_SESSION['maison'] );

                    echo('<li><a href="index.php?cible=users&function=pilotage&piece=maison">Ma Maison</a></li>');
                     // Affiche la liste des pieces dans la maison 
                    while($key = $req1->fetch() ) {
                        echo ('
                    	<li><a href="index.php?cible=users&function=pilotage&piece='.$key['nom'].'"> '. $key['nom'] . '</a></li>
                    	'); }
                        echo ('<li><a href = "index.php?cible=users&function=config">Configurer ma maison</a></li>');
                    break;
                    case "contacter":
                    echo('<li><a href="index.php?cible=users&function=contacter">Nous contacter</a></li>
                        <li><a href="index.php?cible=users&function=FAQ">FAQ</a></li>
                        <li><a href="index.php?cible=users&function=forum">Forum</a></li>
                        ');
                    break;
                    
                }
            }
            elseif
                ($_GET['cible']=='maintenance'){
                    switch ($function){
                    case "compte":
                    echo('<li><a href="index.php?cible=maintenance&function=compte">Mes infos</a></li>
                        <li><a href="index.php?cible=maintenance&function=liste">Liste des utilisateurs</a></li>
                        <li><a href = "index.php?cible=maintenance&function=messagerie">Messagerie</a></li>
                        <li><a href = "index.php?cible=maintenance&function=ajout_client">Ajouter un client</a></li>');
                    break;
                    case "boutique":
                    echo('<li><a href="Nos_offres.html">Nos offres</a></li>
                        <li><a href="Nos_produits.html">Nos produits</a></li>
                        <li><a href="Assistance.html">Assistance</a></li>');
                    break;
                    case "messagerie":
                    echo('messagerie
                        ');
                    break;
                    case "contacter":
                    echo('<li><a href="index.php?cible=maintenance&function=contacter">Nous contacter</a></li>
                        <li><a href="index.php?cible=maintenance&function=FAQ">FAQ</a></li>
                        <li><a href="index.php?cible=maintenance&function=forum">Forum</a></li>
                        ');
                    break;
            }
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
            <?php 
            if (isset($_SESSION['id'])){ ?>
             
            <?php }
             else {?>
            <li><a href="/leanon/index.php?cible=maintenance&amp;function=connexion">Maintenance</a></li>
            <?php }?>

            <li><div class="cgu"><a href="index.php?cible=users&amp;function=cgu">Conditions générales d'utilisation</a></div></li>
            <li><a href="">Mentions légales</a></li>
            <li><a href="">Politique de confidentialité</a></li>
        </ul>
    </footer>
			<!--<div class="block2"><a href="cgu_controleur.php">Conditions générales d'utilisation</a></div>
			<div class="block2"><a href="Nous contacter.html">Mentions légales</a></div>
            <div class="block2"><a href="Nous contacter.html">Politique de confidentialité</a></div>
            <div class="block2"><a href="Nous contacter.html">A propos de nous</a></div>-->
	
    <?php
    $pied = ob_get_clean();
    return $pied;
}
/* pour utiliser ces fonctions, il suffit de faire par exemple 
$header=entete();
echo($header); */
?>

<!-- <div class="inscription">
                <a href="inscription_controleur.php">Inscription</a>
            </div>


<a href="connexion_controleur.php">
             -->


             <!--<a href="index.php?cible=users&function=inscription">-->