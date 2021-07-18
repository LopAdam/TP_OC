<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT SUM(prix) AS prix_total, possesseur FROM jeux_video GROUP BY possesseur');

while ($donnees = $reponse->fetch())
{
        echo $donnees['prix_total'] . ': ' . $donnees['possesseur'] . '<br />';
}

$reponse->closeCursor();

?>