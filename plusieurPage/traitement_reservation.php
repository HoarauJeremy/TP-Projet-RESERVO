<?php

if (isset($_POST['submit'])) {
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $date = $_POST['date'];
    $timeStart = $_POST['time-start'];
    $timeEnd = $_POST['time-end'];

    /* Salle */
    $p = (isset($_POST['preau']) && $_POST['preau'] == "p") ? 50 : 0;
    $t = (isset($_POST['terrain']) && $_POST['terrain'] == "t") ? 100 : 0;
    $s1 = (isset($_POST['salle1']) && $_POST['salle1'] == "s1") ? 100 : 0;
    $s2 = (isset($_POST['salle2']) && $_POST['salle2'] == "s2") ? 100 : 0;
    $cc1 = (isset($_POST['centreCulturel1']) && $_POST['centreCulturel1'] == "cc1") ? 150 : 0;
    $cc2 = (isset($_POST['centreCulturel2']) && $_POST['centreCulturel2'] == "cc2") ? 150 : 0;

    $prixSalle = $p + $t + $s1 + $s2 + $cc1 + $cc2;

    /* Equipement */
    $Table = (isset($_POST['table']) && $_POST['table'] == "table" && isset($_POST['nbTable'])) ? (8 * $_POST['nbTable']) : 0;
    $Chaise = (isset($_POST['chaise']) && $_POST['chaise'] == "chaise" && isset($_POST['nbChaise'])) ? (2 * $_POST['nbChaise']) : 0;
    $Sono = (isset($_POST['sono']) && $_POST['sono'] == "sono" && isset($_POST['nbSono'])) ? (75 * $_POST['nbSono']) : 0;
    $Chapiteau_3_3 = (isset($_POST['chapiteau3-3']) && $_POST['chapiteau3-3'] == "c3-3" && isset($_POST['nbChapiteau3-3'])) ? (100 * $_POST['nbChapiteau3-3']) : 0;
    $Chapiteau_3_4 = (isset($_POST['chapiteau3-4']) && $_POST['chapiteau3-4'] == "c3-4" && isset($_POST['nbChapiteau3-4'])) ? (130 * $_POST['nbChapiteau3-4']) : 0;
    $Chapiteau_3_6 = (isset($_POST['chapiteau3-6']) && $_POST['chapiteau3-6'] == "c3-6" && isset($_POST['nbChapiteau3-6'])) ? (180 * $_POST['nbChapiteau3-6']) : 0;

    $prixEquipement = $Table + $Chaise + $Sono + $Chapiteau_3_3 + $Chapiteau_3_4 + $Chapiteau_3_6;

    /* Service */
    $service_MeP = (isset($_POST['service-MeP']) && $_POST['service-MeP'] == "MeP") ? 150 : 0;
    $service_NeR = (isset($_POST['service-NeR']) && $_POST['service-NeR'] == "NeR") ? 250 : 0;

    $prixService = $service_MeP + $service_NeR;

    echo "
        <ul class='info'>
            <li>$Fname</li>
            <li>$Lname</li>
            <li>$phone</li>
            <li>$mail</li>
            <li>$date</li>
            <li>$timeStart</li>
            <li>$timeEnd</li>
            <li>Prix Salle: $prixSalle</li>
            <li>Prix Equipement: $prixEquipement</li>
            <li>Prix Service: $prixService</li>
            augmentation de 5%/H
        </ul>
    ";
}
