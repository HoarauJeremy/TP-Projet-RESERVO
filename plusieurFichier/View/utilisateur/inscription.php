<?php

$title = "Inscription";

$contenu = '
    <div class="inscription">
        <div>
            <form action="?url=user/store" method="post">
                <div>
                    <label for="prenom">Prenom : </label>
                    <input type="text" name="prenom" id="prenom">
                </div>
                <div>
                    <label for="nom">Nom : </label>
                    <input type="text" name="nom" id="nom">
                </div>
                <div>
                    <label for="phone">Telephone : </label>
                    <input type="tel" name="phone" id="phone">
                </div>
                <div>
                    <label for="mail">Courriel : </label>
                    <input type="email" name="mail" id="mail">
                </div>
                <div>
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id="password">
                </div>

                <input type="submit" name="submit" id="submit" value="S\'inscrire">
            </form>

            <div>
                <a href="?url=user/connexion">Se connecter</a>
            </div>

        </div>
    </div>
';

include 'View/template.php';
