<?php

require_once 'connexion_DB.php';

$cnx = new connexion_DB();

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

    if ($cnx->getIdUtilisateur($user) == null) {
        $cnx->insertUtilisateur($user);
    }
        
    $reservation = [
        $_POST['date'],
        $_POST['time-start'],
        $_POST['time-end'],
        $prixTotal,
        $cnx->getIdUtilisateur($user),
    ];

    $cnx->insertReservation($reservation);
    $cnx->insertSalleReservee($salle, $cnx->getIdUtilisateur($user));
    $cnx->insertEquipementReservee($equipement, $cnx->getIdUtilisateur($user));
    $cnx->insertServiceReservee($service, $cnx->getIdUtilisateur($user));
    
    header('Location: index.php?msg=Votre réservation a bien été enregistrée.');
}
