<?php
session_start();
if(isset($_SESSION['username']) | empty($_SESSION['username'])){
	include "../modele/connexion_bdd.php";
	include "../modele/functions.php";

if(isset($_POST['submit'])){
	if(isset($_POST['message'])  AND !empty($_POST['message'])){ //si les champs sont complétés.
	


									$message = htmlspecialchars($_POST['message']);
                                    $date = date('Y-m-d H:i:s');
                            //recuperer l'id du destinataire
                                    $id_destinataire = $bdd->prepare('SELECT username FROM utilisateur WHERE id = 33');
                                    $id_destinataire->execute(array('username'));
                                    $id_destinataire = $id_destinataire->fetch();
                                    var_dump($id_destinataire);
                                    $id_destinataire = $id_destinataire['username'];
                                    var_dump($id_destinataire);


                            //recuperer l'id du destinataire
                                    $id_expediteur = $bdd->prepare('SELECT username FROM utilisateur WHERE id=\'' . $_SESSION['id'] . '\'');

                                    $id_expediteur->execute(array('username'));
                                    $id_expediteur = $id_expediteur->fetch();
                                    var_dump($id_expediteur);
                                    $id_expediteur = $id_expediteur['username'];
                                    var_dump($id_expediteur);

                                    //envoyer le message, inserer dans la base de données "chat" en mvc.
                                    $values = array('message' => $message, 'id_destinataire' => $id_destinataire, 'id_expediteur' => $_SESSION['username'],  'date' => $date);
                                    $table = 'chat';
                                    $retour = insertion($bdd, $values, $table);
                                    if ($retour){
                                       $error = "Votre message a été envoyé !";
                                    }
                        
                                    /*$ins=$bdd->prepare('INSERT INTO chat(id_expediteur, id_destinataire, message) VALUES (?,?,?)');
                                    $ins->execute(array($_SESSION['id'], $id_destinataire, $message));

                                    $error="Votre message a bien été envoyé"; //succès*/
                                }
                                else
                                {
                                    $error = "Veuillez completer tous les champs!";
                                }
                            

                            }  
}




	?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="margin: 20px;">

<div id="conteneur" style="width :94%; ">
<h1>Votre message a la maintenance</h1>
<p>Vous etes connectés en tant que <?php echo $_SESSION['username'];  ?></p>





<div id="tchat">
	<?php 
		                // on récupère les 10 derniers messages postés
                $requete = $bdd->query('SELECT * FROM chat WHERE id_expediteur =\'' . $_SESSION['id'] .' \' ' );
                
				$requete->execute(array($_SESSION['id']));




                while($donnees = $requete->fetch()){
                    // on affiche le message (l'id servira plus tard)
                    echo "<p ><b> ".$donnees['id_expediteur']. " : </b><br/>" . $donnees['message'] . 
                     " : <br/>" . $donnees['date'] ."</p>"; 

                  	
                }



		        while($m= $msg->fetch()){
				$pseudo_exp=$bdd->prepare('SELECT id_expediteur FROM chat WHERE id = ?');
				$pseudo_exp->execute(array($m['id_expediteur']));
				$pseudo_exp=$pseudo_exp->fetch();
				$pseudo_exp=$pseudo_exp['id_expediteur'];
				?>
				<br/>
				<b><?= $pseudo_exp ?><br/>Message du <?=$m['date'] ?> : <?=$m['message'] ?> <br/> <br/>

<?php 

                
                    
                  	
                }

                $requete->closeCursor();

?>






</div>

<div class="tchatform" style="position:fixed;bottom:20px;width:100%;">
<form method="POST" action="#">
	<div style="margin-right:150px; margin-bottom:50px;">
		<textarea name="message" style="width:100%;"></textarea>
	</div>
	<div style="position: absolute; top:35px;right:20;">
	<input type="submit" name="submit" value="Envoyer">
	</div>
</form>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="main.js"></script>




</body>
</html>
<?php

?>