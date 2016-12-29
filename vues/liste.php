<h1><?= $title; ?></h1>
<p><a href="index.php">Retour</a></p>

<?php foreach ($liste as $user) { ?>

    <p>Nom : <?= $user['username']; ?>, password : <?= $user['password']; ?></p>

<?php } ?>