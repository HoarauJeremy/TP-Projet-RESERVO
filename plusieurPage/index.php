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
    
    <div class="reservation-btn">
        <a href="reservation.php" class="btn">Réserver</a>
    </div>

</main>


<footer>
    <p>RESERVO &copy;</p>
    <a href="mention.php">Mention légal</a>
</footer>
    
</body>
</html>
