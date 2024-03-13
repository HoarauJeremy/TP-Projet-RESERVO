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
                            <td>150</td>
                        </tr>
                        <tr>
                            <td>Lorem.</td>
                            <td>Lorem.</td>
                        </tr>
                        <tr>
                            <td>Lorem.</td>
                            <td>Lorem.</td>
                        </tr>
                        <tr>
                            <td>Lorem.</td>
                            <td>Lorem.</td>
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
                            <td></td>
                        </tr>
                        <tr>
                            <td>Table</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Table</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Table</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Table</td>
                            <td></td>
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
                        <label for="salle">Préau</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Terrain</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Salle 1</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Salle 2</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Centre culturel 1</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Centre culturel 2</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                </div>

<!--                 <div class="equipement">
                    <h4>Equipement</h4>
                    <div class="">
                        <label for="salle">Préau</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Terrain</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Salle 1</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Salle 2</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Centre culturel 1</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                    <div class="">
                        <label for="salle">Centre culturel 2</label>
                        <input type="checkbox" name="salle" id="salle">
                    </div>
                </div>

                <div class="service">
                    <h4>Service</h4>
                    <div class="">
                        <label for="service-MeP">Mise en place</label>
                        <input type="radio" name="service" id="service-MeP">
                    </div>
                    <div class="">
                        <label for="service-NeR">Nettoyage et Rangement</label>
                        <input type="radio" name="service" id="service-NeR">
                    </div>
                    <div class="">
                        <label for="service-AS">Aucun service</label>
                        <input type="radio" name="service" id="service-AS" checked>
                    </div>
                </div> -->

                <input type="submit" name="submit" id="submit" value="Réserver">
                <!-- <input type="submit" id="submit">Réserver</input> -->
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

        echo "
            <ul>
                <li>$Fname</li>
                <li>$Lname</li>
                <li>$phone</li>
                <li>$mail</li>
                <li>$date</li>
                <li>$timeStart</li>
                <li>$timeEnd</li>
            </ul>
        ";

    }

?>

<footer>
    <h1>Lorem.</h1>
</footer>
    
</body>
</html>
