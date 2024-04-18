<?php

$title = "Connexion";
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

$contenu = "
    <div class='connexion'>
        <div>
        <span class='msg'>". $msg ."</span>
            <form action='?url=user/connecter' method='post'>
                <div>
                    <label for='mail'>Courriel : </label>jere@fe.fe
                    <input type='email' name='mail' id='mail' pattern='/^[\w\.=-]+@[\w\.-]+\.[\w]{2,3}$/gm'>
                </div>
                <div>
                    <label for='password'>Mot de passe : </label>abcdef
                    <input type='password' name='password' id='password'>
                </div>

                <input type='submit' name='submit' id='submit' value='Connexion'>
            </form>

            <div>
                <a href='?url=user/inscription'>Créer un compte</a>
            </div>

        </div>
    </div>
";

include 'View/template.php';
