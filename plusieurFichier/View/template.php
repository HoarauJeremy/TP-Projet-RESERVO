<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Projet RESERVO - <?= $title ?></title>
    <link rel="stylesheet" href="../style.css">
    <script src="../index.js"></script>
</head>
<body>

<header>
    <h1><a href="?url=/">RESERVO</a></h1>
</header>

<main>
    
    <div id="message">
        <?php $message = isset($message) ? $message : NULL; ?>
    </div>
    
    <div id="contenu">
        <?= $contenu = isset($contenu) ? $contenu : NULL; ?>
    </div>

</main>

<footer>
    <p>RESERVO &copy;</p>
    <a href="?url=Home/mention">Mention légal</a>
</footer>
    
</body>
</html>
