<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Projet RESERVO - <?= $title ?></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
    <h1><a href="index.php">RESERVO</a></h1>

    <div>
        <?php 
            if (isset($_SESSION['type']) && $_SESSION['type'] == 2 && $_SESSION['status'] == true) {
                echo '<a href="?url=admin/index">Tableau de bord</a>';
                // echo '<a href="?url=administrateur/index">Voir les reservations</a>';
            } elseif (isset($_SESSION['type']) && $_SESSION['type'] == 1 && $_SESSION['status'] == true) {
                echo '<a href="?url=user/index">Voir mes reservations</a>';
            }
        ?>
            
        <?= (isset($_SESSION['status']) && $_SESSION['status'] == true) ? '<a href="?url=user/deconnexion">Se Deconnecter</a>' : '<a href="?url=user/connexion">Se Connecter</a>'; ?>
    </div>
</header>

<main>
    
    <div id="message">
        <?php isset($_GET['msg']) ? $_GET['msg'] : ''; ?>
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
