<?php
    require_once 'connexion_DB.php';
    $cnx = new connexion_DB;
    $id = $_GET['utilisateur'];
    $reservationUtilisateur = $cnx->getReservationUtilisateur($id);
    $reservationSalle = $cnx->getReservationSalle($id);
    $reservationEquipement = $cnx->getReservationEquipement($id);
    $reservationService = $cnx->getReservationService($id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Projet RESERVO</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
    <h1><a href="index.php">RESERVO</a></h1>
</header>

<main>
    <div class="recap">
        <div>
            <h2>Récapitulatif de la réservation</h2>
        </div>
        <div>
            <?php foreach ($reservationUtilisateur as $key => $value) : ?>
                <div class="">
                    <h3><?= $value['nom'] ." ". $value['prenom']; ?></h3>
                    <span>
                        Telephone: <?= $value['telephone']; ?>
                    </span>
                    <br>
                    <span>
                        Courriel: <?= $value['courriel']; ?>
                    </span>
                    <div class="">
                        <span>
                            <?php
                                echo "Reservation du : " . date_create($value['dateReservation'])->format("d/m/Y") ." de ".
                                date_create($value['heureDebutReservation'])->format('H\hm') . " à " .
                                date_create($value['heureFinReservation'])->format('H\hm');
                            ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
    
            <div>
                <h3>Salle reservée:</h3> 
                <ul>
                    <?php foreach ($reservationSalle as $key => $value) : ?>
                        <li><?= $value['salle'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
    
            <div>
                <h3>Equipement reservée:</h3> 
                <ul>
                    <?php foreach ($reservationEquipement as $key => $value) : ?>
                        <li><?= $value['equipement'] ." x". $value['quantite']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
    
            <div>
                <h3>Service reservée:</h3> 
                <ul>
                    <?php foreach ($reservationService as $key => $value) : ?>
                        <li><?= $value['service']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="">
                <?php foreach ($reservationUtilisateur as $key => $value) : ?>
                    <h3>Prix Total : <?= $value['prixTotal']; ?> €</h3>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<footer>
    <p>RESERVO &copy;</p>
    <a href="mentionLegale.php">Mention légal</a>
</footer>
    
</body>
</html>