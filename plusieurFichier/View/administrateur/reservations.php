<?php

    use Models\AdministrationData;

    $title = "Liste des reservations";

    $contenu = "
        <div class='admin'>

            <h1>Administrateur</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date de réservation</th>
                        <th>Heure de réservation</th>
                        <th>Client</th>
                        <th>Prix (€)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

    foreach ($reservations as $key => $value) {
        $res = new AdministrationData($value);
        $contenu .= "
            <tr>
                <td class='id'>". $res->getIdReservation()."</td>
                <td>". date_create($res->getDateReservation())->format("d/m/y") ."</td>
                <td>". date_create($res->getHeureDebutReservation())->format("H\hm") ." à ". date_create($res->getHeureFinReservation())->format("H\hm") ."</td>
                <td>". $res->getUtilisateur() ."</td>
                <td>". $res->getPrixTotal() ."</td>
                <td><a href='?url=admin/showOne/".$res->getIdReservation()."'>Voir la reservation</a></td>
            </tr>";
    }

    $contenu .= "
                </tbody>
            </table>
        </div>    
    ";

    include 'View/template.php';