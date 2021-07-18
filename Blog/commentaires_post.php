<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=tp;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire) VALUES(?, ?)');
$reponse->execute(array($_POST['auteur'], $_POST['commentaire']));
$reponse->closeCursor();

$reponse = $bdd->query('SELECT auteur, commentaire,id_billet AS billet DATE_FORMAT(date_creation,\'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE date_creation DESC');


header('Location: commentaires.php');

?>