<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css.css" />
        <title>Formulaires php</title>
    </head>

    <body>

<p>Bienvenue !</p>

<p>Salut <?php echo $_POST['pseudo']; ?> !</p>

<p>Pour revenir en arrière <a href="formulaires.php">clique ici</a>.</p>

    </body>
</html>