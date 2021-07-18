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
    <h1>Mon  Blog</h1>
    <p> Derniers billets du blog : </p>
    
 <?php   
$reponse = $bdd->query('SELECT id,titre,contenu, DATE_FORMAT(date_creation,\'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets GROUP BY  id DESC LIMIT 0,5');
while ($donnees = $reponse->fetch())
{
    
?>
    <div class=news><h3>
    <?php echo  $donnees['titre'] . ' le ' . $donnees['date_creation'];?></h3><p>
    <?php echo htmlspecialchars($donnees['contenu']) . '<br />';?>

    
    <a href="commentaires.php?billet=<? echo $donnees['id']; ?>">Commentaires</a></p></br>
    </div>
    <?php
    
}
$reponse->closeCursor();

?>



    </body>
</html>