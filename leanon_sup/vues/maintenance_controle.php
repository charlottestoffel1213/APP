


	<head>
    <link rel="stylesheet" type="text/css" href="vues/styles/connexion_typo.css">
    <title>INSCRIPTION LeanOn</title>
</head>
<body>
        

    <div align="center" class="container2" >
        <form method="POST" action="" class="global">
            <div id="block3">
                <legend align = "center"><h1>Maintenance</h1></legend>
                <?php if($alerte) { ?>
                        <p><FONT color="red"> 
                         Attention : <?= $alerte; ?>
                        </p></FONT>
                        <?php } ?>
                <table>
                    <tr>    
                        <td align="right">Pseudo :
                            <input type="text"   name="username"  class="textblock"  />
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="right">Mot de passe :
                            <input type="password"  name="password"  class="textblock"/>
                        </td>
                    </tr>
                    
                </table>        
                    <br/>
                    
                        <input type="submit" value="Se connecter" name="submit" class="submit">
            </div>
        </form>
    </div>
</body>
</html>
