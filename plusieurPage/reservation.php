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
</header>

<main>
    <div class="reservation">
        <div class="reservation-box">
            <form action="traitement_reservation.php" method="POST">

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

<footer>
    <p>RESERVO &copy;</p>
    <a href="mention.php">Mention légal</a>
</footer>
    
</body>
</html>