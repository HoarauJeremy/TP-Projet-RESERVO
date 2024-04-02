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