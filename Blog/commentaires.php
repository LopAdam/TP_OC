<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="index.css" />
        <?php try
{
	$bdd = new PDO('mysql:host=localhost;dbname=tp;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}?>

        <title>Blog</title>
    </head>
    <body>
    <h1>Mon super Blog</h1>
    <p> <a href="index.php">Retour à la liste de billets</a> </p>
    


    <?php   
$reponse = $bdd->prepare('SELECT id,titre,contenu, DATE_FORMAT(date_creation,\'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE id=?');
$reponse->execute(array($_GET['billet']));
while ($donnees = $reponse->fetch())
 {   
?>
  <div class=news><h3>
    <?php echo  $donnees['titre'] . ' le ' . $donnees['date_creation'];?></h3><p>
    <?php echo htmlspecialchars($donnees['contenu']) . '<br />';
} 
$reponse->closeCursor(); ?></div>

<h2>Commentaires</h2>
<?php

$reponse = $bdd->prepare('SELECT id_billet,auteur,commentaire, DATE_FORMAT(date_commentaire,\'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM commentaires WHERE id_billet=? ORDER BY date_creation');
$reponse->execute(array($_GET['billet']));
while ($donnees = $reponse->fetch())
{
?><strong><? echo  $donnees['auteur'] ?> </strong> le <? echo $donnees['date_creation'] . '<br />';
echo htmlspecialchars($donnees['commentaire']) . '<br />' . '</br>';
}
$reponse->closeCursor();
?>

<h2>Commentez !</h2>
 <form action="commentaires_post.php" method="post">
        <p>
        <label for="auteur">Auteur</label> : <input type="text" name="auteur" id="auteur" /><br />
        <label for="commentaire">Commentaire</label> :  <input type="text" name="commentaire" id="commentaire" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>
    </body>
</html>