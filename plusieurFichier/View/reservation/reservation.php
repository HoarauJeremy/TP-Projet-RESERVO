<?php 

    $title = 'Reservation';

    $contenu = '
        <div class="reservation">
            <div class="reservation-box">
                <form action="?url=Reservation/recapitulatif" method="POST">

                    <div class="user">
                        <div class="prenom">
                            <label for="prenom">Prenom*</label>
                            <input type="text" name="prenom" id="prenom" pattern="/[$A-Za-zéèà-]/g" required>
                        </div>
                        <div class="nom">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" id="nom" pattern="/[$A-Za-zéèà-]/g" required>
                        </div>
                        <div class="phone">
                            <label for="phone">N° de telephone*</label>
                            <input type="tel" pattern="([0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2})|([0-9]{10})|([0-9]{2} [0-9]{2} [0-9]{6})|([0-9]{2} [0-9]{2} [0-9]{3} [0-9]{3})" name="phone" id="phone" required>
                        </div>
                        <div class="mail">
                            <label for="mail">Courriel*</label>
                            <input type="email" name="mail" id="mail" pattern="/^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$/g" required>
                        </div>
                        <div class="date">
                            <label for="date">Date*</label>
                            <input type="date" name="date" id="date" required>
                        </div>
                        <div class="time-start">
                            <label for="time">Heure de début*</label>
                            <input type="time" name="time-start" id="time-start" required>
                        </div>
                        <div class="time-end">
                            <label for="time-end">Heure de fin*</label>
                            <input type="time" name="time-end" id="time-end" required>
                        </div>
                        <small>* Information nécessaire</small>
                    </div>

                    <div class="salle">
                        <h4>Salle</h4>
                        <div>
                            <label for="preau">Préau</label>
                            <input type="checkbox" name="preau" id="preau" value="1">
                        </div>
                        <div>
                            <label for="terrain">Terrain</label>
                            <input type="checkbox" name="terrain" id="terrain" value="2">
                        </div>
                        <div>
                            <label for="salle1">Salle 1</label>
                            <input type="checkbox" name="salle1" id="salle1" value="3">
                        </div>
                        <div>
                            <label for="salle2">Salle 2</label>
                            <input type="checkbox" name="salle2" id="salle2" value="4">
                        </div>
                        <div>
                            <label for="centreCulturel1">Centre culturel 1</label>
                            <input type="checkbox" name="centreCulturel1" id="centreCulturel1" value="5">
                        </div>
                        <div>
                            <label for="centreCulturel2">Centre culturel 2</label>
                            <input type="checkbox" name="centreCulturel2" id="centreCulturel2" value="6">
                        </div>
                    </div>

                    <div class="equipement">
                        <h4>Equipement</h4>
                        <div>
                            <label for="table">Table</label>
                            <input type="checkbox" name="table" id="table" value="1">
                            <input type="number" name="nbTable" id="nbTable" min="0" value=0>
                        </div>
                        <div>
                            <label for="chaise">Chaise</label>
                            <input type="checkbox" name="chaise" id="chaise" value="2">
                            <input type="number" name="nbChaise" id="nbChaise" min="0" value=0>
                        </div>
                        <div>
                            <label for="sono">Matériel de sonorisation</label>
                            <input type="checkbox" name="sono" id="sono" value="3">
                            <input type="number" name="nbSono" id="nbSono" min="0" value=0>
                        </div>
                        <div>
                            <label for="chapiteau3-3">Chapiteau 3x3m</label>
                            <input type="checkbox" name="chapiteau3-3" id="chapiteau3-3" value="4">
                            <input type="number" name="nbChapiteau3-3" id="nbChapiteau3-3" min="0" value=0>
                        </div>
                        <div>
                            <label for="chapiteau3-4">Chapiteau 3x4m</label>
                            <input type="checkbox" name="chapiteau3-4" id="chapiteau3-4" value="5">
                            <input type="number" name="nbChapiteau3-4" id="nbChapiteau3-4" min="0" value=0>
                        </div>
                        <div>
                            <label for="chapiteau3-6">Chapiteau 3x6m</label>
                            <input type="checkbox" name="chapiteau3-6" id="chapiteau3-6" value="6">
                            <input type="number" name="nbChapiteau3-6" id="nbChapiteau3-6" min="0" value="0">
                        </div>
                    </div>

                    <div class="service">
                        <h4>Service</h4>
                        <div>
                            <label for="service-MeP">Mise en place</label>
                            <input type="checkbox" name="service-MeP" id="service-MeP" value="1">
                        </div>
                        <div>
                            <label for="service-NeR">Nettoyage et Rangement</label>
                            <input type="checkbox" name="service-NeR" id="service-NeR" value="2">
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Réserver">
                </form>
            </div>
        </div>
    ';

    include 'View/template.php';

?>

<script>
    // Fonction pour désactiver les champs de saisie numérique si la case à cocher correspondante n'est pas cochée
    function toggleInput(inputId, checkboxId) {
        let inputElement = document.getElementById(inputId);
        let checkboxElement = document.getElementById(checkboxId);

        // Désactive l'élément d'entrée si la case à cocher n'est pas cochée, sinon l'active
        // inputElement.disabled = !checkboxElement.checked;
        if (!checkboxElement.checked) {
            inputElement.disabled = true;
            inputElement.value = 0;
        } else {
            inputElement.disabled = false;
            inputElement.value = 1;
        }
    }

    // Écouteurs d'événements pour chaque case à cocher
    document.getElementById('table').addEventListener('change', function() {
        toggleInput('nbTable', 'table');
    });

    document.getElementById('chaise').addEventListener('change', function() {
        toggleInput('nbChaise', 'chaise');
    });

    document.getElementById('sono').addEventListener('change', function() {
        toggleInput('nbSono', 'sono');
    });

    document.getElementById('chapiteau3-3').addEventListener('change', function() {
        toggleInput('nbChapiteau3-3', 'chapiteau3-3');
    });

    document.getElementById('chapiteau3-4').addEventListener('change', function() {
        toggleInput('nbChapiteau3-4', 'chapiteau3-4');
    });

    document.getElementById('chapiteau3-6').addEventListener('change', function() {
        toggleInput('nbChapiteau3-6', 'chapiteau3-6');
    });

    // Appel initial pour désactiver les champs non cochés
    toggleInput('nbTable', 'table');
    toggleInput('nbChaise', 'chaise');
    toggleInput('nbSono', 'sono');
    toggleInput('nbChapiteau3-3', 'chapiteau3-3');
    toggleInput('nbChapiteau3-4', 'chapiteau3-4');
    toggleInput('nbChapiteau3-6', 'chapiteau3-6');
</script>