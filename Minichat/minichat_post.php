<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO minichat (pseudo, commentaire) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['commentaire']));

header('Location: minichat.php');
?>