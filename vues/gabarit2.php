<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<link rel="stylesheet" href="/leanon/vues/Typographie/typo.css" />
<link rel="stylesheet" href="/leanon/vues/styles/structure.css" />
<link rel="stylesheet" type="text/css" href="/leanon/vues/styles/typo_maintenance.css">

<TITLE>LeanOn Official Website</TITLE>

		<div id="global2">
            <div id="tete">
                <?php echo($header); ?>
                <?php echo($connexion); ?>
            </div>
            <hr/>
            <div id="corps">
            <?php if (isset($menu)){ ?>
               <div id="menu2">
                    <?php echo($menu);?>
                </div> <?php } ?>

                <div id="contenu">
                    <?php echo($contenu); ?>
                </div>
            </div>
            <hr>
            <div id="pied2">
                <?php echo($pied); ?>
            </div>
        </div>
</html>