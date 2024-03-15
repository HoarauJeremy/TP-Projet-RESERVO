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
    <h1>RESERVO</h1>

    <nav>
        <ul>
            <li><a href="reservation.php">Réserver</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="presentation">

        <h2>Nos offres de réservation :</h2>

        <div class="pres-text">
            <p>
                Découvrez nos offres de réservation flexibles et adaptées à vos besoins au sein de l'Association AJS (Jeunesse Solidaire).
                <br>
                Que vous planifiez un événement personnel ou une réunion d'envergure, nous vous offrons un choix varié de salles de qualité.
                <br>
                De plus, notre gamme d'équipements et de services vous permet de personnaliser votre réservation selon vos préférences.
                <br>
                Faites confiance à notre équipe pour répondre à vos besoins en matière de réservation et rendre votre événement inoubliable
            </p>
        </div>

        <div class="pres-box">
            <div class="box">
                <h3>De salle</h3>
                <p>Nous vous offrons un choix varié de salles de qualité, comprenant le préau, le terrain, la salle 15, le Centre Culturel 1 et le Centre Culturel 2.</p>
                <div class="price">
                    <table>
                        <thead>
                            <tr>
                                <th>Salles</th>
                                <th>Prix (€)</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr>
                                <td>Préau</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Terrain</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Salle 1</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Salle 2</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Centre culturel 1</td>
                                <td>150</td>
                            </tr>
                            <tr>
                                <td>Centre culturel 2</td>
                                <td>150</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="box">
                <h3>D'équipement</h3>
                <p>Nous vous offrons un choix varié de table et de chaise confortable et même un système de sonorisation professionnels avec la présence d'un technicien qualifié.</p>
                <div class="price">
                    <table>
                        <thead>
                            <tr>
                                <th>Equipement</th>
                                <th>Prix (€)</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr>
                                <td>Table</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>Chaise</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Matériel de sonorisation</td>
                                <td>75</td>
                            </tr>
                            <tr>
                                <td>Chapiteau 3x3m</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Chapiteau 3x4m</td>
                                <td>130</td>
                            </tr>
                            <tr>
                                <td>Chapiteau 3x6m</td>
                                <td>180</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="box">
                <h3>De service</h3>
                <p>Notre option de mise en place et de nettoyage garantit un environnement accueillant et soigné pour vos invités.</p>
                <div class="price">
                    <table>
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Prix (€)</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr>
                                <td>Mise en place</td>
                                <td>150</td>
                            </tr>
                            <tr>
                                <td>Nettoyage et Rangement</td>
                                <td>250</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
    ?>

</main>

<footer>
    <p>RESERVO &copy;</p>
    <a href="mention.php">Mention légal</a>
</footer>
    
</body>
</html>

