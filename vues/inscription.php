<h1><?= $title; ?></h1>
<p><a href="index.php">Retour</a></p>

<?php if($alerte) { ?>
<p>
    Alerte : <?= $alerte; ?>
</p>
<?php } ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="connexion_typo2.css">
    <title>INSCRIPTION LeanOn</title>
</head>
<body>
        

    <div align="center" class="container2">
        <form method="POST" action="testest.php" class="global">
            <div id="block2">
                <legend align = "center"><h1>Inscription</h1></legend>
                <?php
                if(isset($erreur)){
                echo ($erreur);
                }

                ?>
                <table>
                    <tr>    
                        <td align="right">Pseudo :
                            <input type="text"   name="username" required="required" class="textblock"  />
                        </td>
                    </tr>
                    <!--<tr>
                        <td align="right">Email :
                            <input type="text"  name="mail" required="required" class="textblock" />
                        </td>
                    </tr>-->
                    <tr>
                        <td align="right">Mot de passe :
                            <input type="password"  name="password" required="required" class="textblock"/>
                        </td>
                    </tr>
                    <!--<tr>
                        <td align="right">Repeter votre mot de passe : 
                            <input type="password"  name="password2" required="required" class="textblock" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right"> Nom: 
                            <input type="text" placeholder="" name="nom" required="required" class="textblock"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"> Prénom: 
                            <input type="text" placeholder="" name="prenom"  required="required" class="textblock"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"> Date de naissance : 
                            <input type="date" placeholder="" name="naissance"  required="required" class="textblock">
                        </td>
                    </tr>
                    <tr>
                        <td align="right"> Adresse: 
                            <input type="text" placeholder="" name="adresse"  required="required" class="textblock"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"> Ville : 
                            <input type="text" placeholder="" name="ville"  required="required" class="textblock"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Code postal : 
                            <input type="text" placeholder="" name="postal"  required="required" class="textblock"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"> Télephone: 
                            <input type="text" placeholder="" name="tel"  required="required" class="textblock"/>
                        </td>
                    </tr>-->
                </table>        
                    <br/>
                    
                        <input type="submit" value="S'inscrire" name="submit" class="submit">
            </div>
        </form>
    </div>
</body>
</html>