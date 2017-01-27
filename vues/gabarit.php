<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<link rel="stylesheet" href="/leanon/vues/Typographie/typo.css" />
<link rel="stylesheet" href="/leanon/vues/styles/structure.css" />
<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/connexion_typo.css">

<TITLE>LeanOn Official Website</TITLE>

		<div id="global">
            <div id="tete">
                <?php echo($header); ?>
                <?php echo($connexion); ?>
            </div>
            <hr/>
            <div id="corps">
            <?php if (isset($menu)){ ?>
               <div id="menu">
                    <?php echo($menu);?>
                </div> <?php } ?>

            <?php if (isset($mode)){ ?>
               <div id="mode">
                    <?php echo($mode);?>
                </div> <?php } ?>
            

                <div id="contenu">
                    <?php echo($contenu); ?>
                </div>
            </div>
            <hr>
            <div id="pied">
                <?php echo($pied); ?>
            </div>
        </div>
</html>