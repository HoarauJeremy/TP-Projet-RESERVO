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

    

    /* Tableau qui recupere les id des salle */
    $salle = [
        "Preau" => isset($_POST['preau']) ? $_POST['preau'] : null,
        "Terrain" => isset($_POST['terrain']) ? $_POST['terrain'] : null,
        "Salle 1" => isset($_POST['salle1']) ? $_POST['salle1'] : null,
        "Salle 2" => isset($_POST['salle2']) ? $_POST['salle2'] : null,
        "Centre Culturel 1" => isset($_POST['centreCulturel1']) ? $_POST['centreCulturel1'] : null,
        "Centre Culturel 2" => isset($_POST['centreCulturel2']) ? $_POST['centreCulturel2'] : null,
    ];
    
    /* Tableau qui recupere les id des equipement et la quantité */
    $equipement = [
        (isset($_POST['table'])) ? $_POST['table'] : null => isset($_POST['nbTable']) ? $_POST['nbTable']: null,
        (isset($_POST['chaise'])) ? $_POST['chaise'] : null => isset($_POST['nbChaise']) ? $_POST['nbChaise'] : null,
        (isset($_POST['sono'])) ? $_POST['sono'] : null => isset($_POST['nbSono']) ? $_POST['nbSono'] : null,
        (isset($_POST['chapiteau3-3']) ) ? $_POST['chapiteau3-3'] : null => isset($_POST['nbChapiteau3-3']) ? $_POST['nbChapiteau3-3'] : null,
        (isset($_POST['chapiteau3-4'])) ? $_POST['chapiteau3-4'] : null => isset($_POST['nbChapiteau3-4']) ? $_POST['nbChapiteau3-4'] : null,
        (isset($_POST['chapiteau3-6'])) ? $_POST['chapiteau3-6'] : null => isset($_POST['nbChapiteau3-6']) ? $_POST['nbChapiteau3-6'] : null,
    ];

    $equipementNom = [
        'Table',
        'Chaise',
        'Matériel de sonorisation',
        'Chapiteau 3x3m',
        'Chapiteau 3x4m',
        'Chapiteau 3x6m',
    ];

    /* Tableau qui recupere les id des services */
    $service = [
        "Mise en place" => isset($_POST['service-MeP']) ? $_POST['service-MeP'] : null,
        "Nettoyage et Rangement" => isset($_POST['service-NeR']) ? $_POST['service-NeR'] : null,
    ];

    var_dump($_POST);
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
            <div class="">
                <h3><?= $_POST['nom'] ." ". $_POST['prenom']; ?></h3>
                <span>
                    Telephone: <?= $_POST['phone']; ?>
                </span>
                <br>
                <span>
                    Courriel: <?= $_POST['mail']; ?>
                </span>
                <div class="">
                    <span>
                        <?php
                            echo "Reservation du : " . date_create($_POST["date"])->format("d/m/Y") ." de ".
                            date_create($_POST["time-start"])->format('H\hm') . " à " .
                            date_create($_POST["time-end"])->format('H\hm');
                        ?>
                    </span>
                </div>
            </div>
    
            <div>
                <h3>Salle reservée:</h3> 
                <ul>
                    <?php foreach ($salle as $key => $value) : ?>
                        <?php if ($value != null) : ?>
                            <li><?= $key ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
    
            <div>
                <h3>Equipement reservée:</h3> 
                <ul>
                    <?php foreach ($equipement as $key => $value) : ?>
                        <?php if ($key != null) : ?>
                            <li><?= $equipementNom[$key-1] ." x". $value; ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
    
            <div>
                <h3>Service reservée:</h3> 
                <ul>
                    <?php foreach ($service as $key => $value) : ?>
                        <li><?= $key; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="">
                <h3>Prix Total : <?= $prixTotal ?> €</h3>
            </div>

            
            <form action="traitement_reservation.php" method="post">
                <input hidden type="text" name="nom" id="nom" value="<?=$_POST['nom']?>" required>
                <input hidden type="text" name="prenom" id="prenom" value="<?=$_POST['prenom']?>" required>
                <input hidden type="tel" name="phone" id="phone" value="<?=$_POST['phone']?>" required>
                <input hidden type="email" name="mail" id="mail" value="<?=$_POST['mail']?>" required>

                <input hidden type="date" name="date" id="date" value="<?= $_POST["date"];?>" required>
                <input hidden type="time" name="time-start" id="time-start" value="<?= $_POST["time-start"];?>" required>
                <input hidden type="time" name="time-end" id="time-end" value="<?= $_POST["time-end"];?>" required>

                <!-- ---------------------------------------------------------------------Salle--------------------------------------------------------------------- -->
                <input hidden type="text" name="preau" id="preau" value="<?= isset($_POST['preau']) ? $_POST['preau'] : null ?>">
                <input hidden type="text" name="terrain" id="terrain" value="<?= isset($_POST['terrain']) ? $_POST['terrain'] : null ?>">
                <input hidden type="text" name="salle1" id="salle1" value="<?= isset($_POST['salle1']) ? $_POST['salle1'] : null ?>">
                <input hidden type="text" name="salle2" id="salle2" value="<?= isset($_POST['salle2']) ? $_POST['salle2'] : null ?>">
                <input hidden type="text" name="centreCulturel1" id="centreCulturel1" value="<?= isset($_POST['centreCulturel1']) ? $_POST['centreCulturel1'] : null ?>">
                <input hidden type="text" name="centreCulturel2" id="centreCulturel2" value="<?= isset($_POST['centreCulturel2']) ? $_POST['centreCulturel2'] : null ?>">
                <!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->

                <!-- ------------------------------------------------Equipement------------------------------------------------ -->
                <input hidden type="text" name="table" id="table" value="<?= (isset($_POST['table'])) ? $_POST['table'] : null ?>">
                <input hidden type="number" name="nbTable" id="nbTable" min="0" value="<?= isset($_POST['nbTable']) ? $_POST['nbTable'] : 0 ?>">
                <!-- -- -->
                <input hidden type="text" name="chaise" id="chaise" value="<?= (isset($_POST['chaise'])) ? $_POST['chaise'] : null ?>">
                <input hidden type="number" name="nbChaise" id="nbChaise" min="0" value="<?= isset($_POST['nbChaise']) ? $_POST['nbChaise'] : 0 ?>">
                <!-- -- -->
                <input hidden type="text" name="sono" id="sono" value="<?= (isset($_POST['sono'])) ? $_POST['sono'] : null ?>">
                <input hidden type="number" name="nbSono" id="nbSono" min="0" value="<?= isset($_POST['nbSono']) ? $_POST['nbSono'] : 0 ?>">
                <!-- -- -->
                <input hidden type="text" name="chapiteau3-3" id="chapiteau3-3" value="<?= (isset($_POST['chapiteau3-3']) ) ? $_POST['chapiteau3-3'] : null ?>">
                <input hidden type="number" name="nbChapiteau3-3" id="nbChapiteau3-3" min="0" value="<?= isset($_POST['nbChapiteau3-3']) ? $_POST['nbChapiteau3-3'] : 0 ?>">
                <!-- -- -->
                <input hidden type="text" name="chapiteau3-4" id="chapiteau3-4" value="<?= (isset($_POST['chapiteau3-4'])) ? $_POST['chapiteau3-4'] : null ?>">
                <input hidden type="number" name="nbChapiteau3-4" id="nbChapiteau3-4" min="0" value="<?= isset($_POST['nbChapiteau3-4']) ? $_POST['nbChapiteau3-4'] : 0 ?>">
                <!-- -- -->
                <input hidden type="text" name="chapiteau3-6" id="chapiteau3-6" value="<?= (isset($_POST['chapiteau3-6'])) ? $_POST['chapiteau3-6'] : null ?>">
                <input hidden type="number" name="nbChapiteau3-6" id="nbChapiteau3-6" min="0" value="<?= isset($_POST['nbChapiteau3-6']) ? $_POST['nbChapiteau3-6'] : 0 ?>">
                <!-- -------------------------------------------------------------------------------------------------------- -->

                <!-- -------------------------------------------------------------Service------------------------------------------------------------- -->
                <input hidden type="text" name="service-MeP" id="service-MeP" value="<?= isset($_POST['service-MeP']) ? $_POST['service-MeP'] : null ?>">
                <input hidden type="text" name="service-NeR" id="service-NeR" value="<?= isset($_POST['service-NeR']) ? $_POST['service-NeR'] : null ?>">
                <!-- -------------------------------------------------------------------------------------------------------------------------- -->
                
                <input type="submit" name="submit" id="submit" value="Réserver">
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
