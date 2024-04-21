<?php

    use Models\AdministrationData;

    $title = "Reservation n°". $reservation[0]['idReservation'];

    $contenu = "<div class=''>";

    foreach ($reservation as $key => $value) {
        $res = new AdministrationData($value);
        $contenu .= "<h1>Reservation n°". $res->getIdReservation() .":</h1>";
        $contenu .= "
            <div>
                <p>Client : ". ucfirst($res->getUtilisateur()) ."</p>
                <p>Date de la reservation : ". date_create($res->getDateReservation())->format("d/m/Y") ."</p>
                <p>Heure de la reservation : ". date_create($res->getHeureDebutReservation())->format("H\hm") ." à ". date_create($res->getHeureFinReservation())->format("H\hm")  ."</p>
                <p>Prix : ". $res->getPrixTotal() ." €</p>
            </div>";
        $contenu .= "
                <div class=''>
                    <a href='?url=admin/update/".$res->getIdReservation()."'>Modifier</a>
                    <a href='?url=admin/delete/".$res->getIdReservation()."'>Supprimer</a>
                </div>";
        }
                
        $contenu .= "<div>";

    include 'View/template.php';
