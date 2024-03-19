<?php

if (isset($_POST['submit'])) {

    /* Salle */
    $p = isset($_POST['preau']) ? 50 : 0;
    $t = isset($_POST['terrain']) ? 100 : 0;
    $s1 = isset($_POST['salle1']) ? 100 : 0;
    $s2 = isset($_POST['salle2']) ? 100 : 0;
    $cc1 = isset($_POST['centreCulturel1']) ? 150 : 0;
    $cc2 = isset($_POST['centreCulturel2']) ? 150 : 0;

    $prixSalle = $p + $t + $s1 + $s2 + $cc1 + $cc2;

    /* Equipement */
    $Table = (isset($_POST['table']) && isset($_POST['nbTable'])) ? (8 * $_POST['nbTable']) : 0;
    $Chaise = (isset($_POST['chaise']) && isset($_POST['nbChaise'])) ? (2 * $_POST['nbChaise']) : 0;
    $Sono = (isset($_POST['sono']) && isset($_POST['nbSono'])) ? (75 * $_POST['nbSono']) : 0;
    $Chapiteau_3_3 = (isset($_POST['chapiteau3-3']) && isset($_POST['nbChapiteau3-3'])) ? (100 * $_POST['nbChapiteau3-3']) : 0;
    $Chapiteau_3_4 = (isset($_POST['chapiteau3-4']) && isset($_POST['nbChapiteau3-4'])) ? (130 * $_POST['nbChapiteau3-4']) : 0;
    $Chapiteau_3_6 = (isset($_POST['chapiteau3-6']) && isset($_POST['nbChapiteau3-6'])) ? (180 * $_POST['nbChapiteau3-6']) : 0;

    $prixEquipement = $Table + $Chaise + $Sono + $Chapiteau_3_3 + $Chapiteau_3_4 + $Chapiteau_3_6;

    /* Service */
    $service_MeP = (isset($_POST['service-MeP'])) ? 150 : 0;
    $service_NeR = (isset($_POST['service-NeR'])) ? 250 : 0;

    $prixService = $service_MeP + $service_NeR;


    $prixTotal = $prixSalle + $prixEquipement + $prixService;

    $user = [
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['phone'],
        $_POST['mail'],
    ];

    /* Tableau qui recupere les id des salle */
    $salle = [
        isset($_POST['preau']) ? $_POST['preau'] : null,
        isset($_POST['terrain']) ? $_POST['terrain'] : null,
        isset($_POST['salle1']) ? $_POST['salle1'] : null,
        isset($_POST['salle2']) ? $_POST['salle2'] : null,
        isset($_POST['centreCulturel1']) ? $_POST['centreCulturel1'] : null,
        isset($_POST['centreCulturel2']) ? $_POST['centreCulturel2'] : null,
    ];
    
    /* Tableau qui recupere les id des equipement et la quantité */
    $equipement = [
        (isset($_POST['table'])) ? $_POST['table'] : null => $_POST['nbTable'],
        (isset($_POST['chaise'])) ? $_POST['chaise'] : null => $_POST['nbChaise'],
        (isset($_POST['sono'])) ? $_POST['sono'] : null => $_POST['nbSono'],
        (isset($_POST['chapiteau3-3']) ) ? $_POST['chapiteau3-3'] : null => $_POST['nbChapiteau3-3'],
        (isset($_POST['chapiteau3-4'])) ? $_POST['chapiteau3-4'] : null => $_POST['nbChapiteau3-4'],
        (isset($_POST['chapiteau3-6'])) ? $_POST['chapiteau3-6'] : null => $_POST['nbChapiteau3-6'],
    ];

    /* Tableau qui recupere les id des services */
    $service = [
        isset($_POST['service-MeP']) ? $_POST['service-MeP'] : null,
        isset($_POST['service-NeR']) ? $_POST['service-NeR'] : null,
    ];

    $reservation = [
        $_POST['date'],
        $_POST['time-start'],
        $_POST['time-end'],
        $prixTotal
    ];

}

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
            <?php var_dump($salle); ?>

                <div class="">
                    <h3><?= $user[0] ." ". $user[1]; ?></h3>
                    <span>
                        Telephone: <?= $user[2]; ?>
                    </span>
                    <br>
                    <span>
                        Courriel: <?= $user[3]; ?>
                    </span>
                    <div class="">
                        <span>
                            <?php
                                echo "Reservation du : " . date_create($key['dateReservation'])->format("d/m/Y") ." de ".
                                date_create($key['heureDebutReservation'])->format('H\hm') . " à " .
                                date_create($key['heureFinReservation'])->format('H\hm');
                            ?>
                        </span>
                    </div>
                </div>
    
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
                <?php //foreach ($reservationUtilisateur as $key => $value) : ?>
                    <h3>Prix Total : <?php // $value['prixTotal']; ?> €</h3>
                <?php //endforeach; ?>
            </div>

            
            <form action="traitment_reservation.php" method="post">
                
            </form>

        </div>
    </div>
</main>

<footer>
    <p>RESERVO &copy;</p>
    <a href="mentionLegale.php">Mention légal</a>
</footer>
    
</body>
</html>
