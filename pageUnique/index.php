<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Projet RESERVO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>RESERVO</h1>
</header>

<main>
    <div class="pres">
        <h2>Nos offres de réservation :</h2>

        <div class="pres-box">
            <div class="box">
                <h3>De salle</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia magni illum quae voluptatum optio earum.</p>
            </div>
            
            <div class="box">
                <h3>D'équipement</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia magni illum quae voluptatum optio earum.</p>
            </div>
            
            <div class="box">
                <h3>D'option</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia magni illum quae voluptatum optio earum.</p>
            </div>
        </div>
    </div>
        
    <div class="price">
        <div class="price-box">
            <div class="box price">
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
            
            <div class="box price">
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
                            <td>2 <!--/Jour--></td>
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

            <div class="box price">
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

    <div class="reservation">
        <div class="reservation-box">
            <form action="" method="POST">

                <div class="user">
                    <div class="Fname">
                        <label for="Fname">Prenom</label>
                        <input type="text" name="Fname" id="Fname">
                    </div>
                    <div class="Lname">
                        <label for="Lname">Nom</label>
                        <input type="text" name="Lname" id="Lname">
                    </div>
                    <div class="phone">
                        <label for="phone">N° de telephone</label>
                        <input type="tel" name="phone" id="phone">
                    </div>
                    <div class="mail">
                        <label for="mail">Courriel</label>
                        <input type="email" name="mail" id="mail">
                    </div>
                    <div class="date">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div class="time-start">
                        <label for="time">Heure de début</label>
                        <input type="time" name="time-start" id="time-start">
                    </div>
                    <div class="time-end">
                        <label for="time-end">Heure de fin</label>
                        <input type="time" name="time-end" id="time-end">
                    </div>
                </div>

                <div class="salle">
                    <h4>Salle</h4>
                    <div class="">
                        <label for="preau">Préau</label>
                        <input type="checkbox" name="preau" id="preau" value="p">
                    </div>
                    <div class="">
                        <label for="terrain">Terrain</label>
                        <input type="checkbox" name="terrain" id="terrain" value="t">
                    </div>
                    <div class="">
                        <label for="salle1">Salle 1</label>
                        <input type="checkbox" name="salle1" id="salle1" value="s1">
                    </div>
                    <div class="">
                        <label for="salle2">Salle 2</label>
                        <input type="checkbox" name="salle2" id="salle2" value="s2">
                    </div>
                    <div class="">
                        <label for="centreCulturel1">Centre culturel 1</label>
                        <input type="checkbox" name="centreCulturel1" id="centreCulturel1" value="cc1">
                    </div>
                    <div class="">
                        <label for="centreCulturel2">Centre culturel 2</label>
                        <input type="checkbox" name="centreCulturel2" id="centreCulturel2" value="cc2">
                    </div>
                </div>

                <div class="equipement">
                    <h4>Equipement</h4>
                    <div class="">
                        <label for="table">Table</label>
                        <input type="checkbox" name="table" id="table" value="table">
                        <input type="number" name="nbTable" id="nbTable">
                    </div>
                    <div class="">
                        <label for="chaise">Chaise</label>
                        <input type="checkbox" name="chaise" id="chaise" value="chaise">
                        <input type="number" name="nbChaise" id="nbChaise">
                    </div>
                    <div class="">
                        <label for="sono">Matériel de sonorisation</label>
                        <input type="checkbox" name="sono" id="sono" value="sono">
                        <input type="number" name="nbSono" id="nbSono">
                    </div>
                    <div class="">
                        <label for="chapiteau3-3">Chapiteau 3x3m</label>
                        <input type="checkbox" name="chapiteau3-3" id="chapiteau3-3" value="c3-3">
                        <input type="number" name="nbChapiteau3-3" id="nbChapiteau3-3">
                    </div>
                    <div class="">
                        <label for="chapiteau3-4">Chapiteau 3x4m</label>
                        <input type="checkbox" name="chapiteau3-4" id="chapiteau3-4" value="c3-4">
                        <input type="number" name="nbChapiteau3-4" id="nbChapiteau3-4">
                    </div>
                    <div class="">
                        <label for="chapiteau3-6">Chapiteau 3x6m</label>
                        <input type="checkbox" name="chapiteau3-6" id="chapiteau3-6" value="c3-6">
                        <input type="number" name="nbChapiteau3-6" id="nbChapiteau3-6">
                    </div>
                </div>

                <div class="service">
                    <h4>Service</h4>
                    <div class="">
                        <label for="service-MeP">Mise en place</label>
                        <input type="checkbox" name="service-MeP" id="service-MeP" value="MeP">
                    </div>
                    <div class="">
                        <label for="service-NeR">Nettoyage et Rangement</label>
                        <input type="checkbox" name="service-NeR" id="service-NeR" value="NeR">
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" value="Réserver">
            </form>
        </div>
    </div>
</main>

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
            <ul>
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

<footer>
    <h2>RESERVO</h2>
    <p>Association AJS &copy;</p>
</footer>
    
</body>
</html>
