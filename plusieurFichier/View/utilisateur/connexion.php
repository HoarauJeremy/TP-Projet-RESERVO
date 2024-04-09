<?php

$title = "Connexion";

$contenu = '
    <div class="connexion">
        <div>
            <form action="" method="post">
                <div>
                    <label for="mail">Courriel : </label>
                    <input type="email" name="mail" id="mail">
                </div>
                <div>
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id="password">
                </div>

                <input type="submit" name="submit" id="submit" value="Connexion">
            </form>

            <div>
                <a href="?url=user/inscription">Créer un compte</a>
            </div>

        </div>
    </div>
';

include 'View/template.php';
