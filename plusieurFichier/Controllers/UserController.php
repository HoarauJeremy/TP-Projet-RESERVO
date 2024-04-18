<?php

namespace Controllers;
use Models\Utilisateur;

session_start();

class UserController
{
    protected $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    public function view($url) {
        return "View/".$url.".php";
    }

    public function index() {
        $path = $this->view('utilisateur/index');
        file_exists($path) ? include($path) : include $this->view('Error');
    }

    public function connexion() {
        $path = $this->view('utilisateur/connexion');
        file_exists($path) ? include($path) : include $this->view('Error');
    }

    /**
     * Deconnecte l'utilisateur et le redirige vers la page d'acceuil
     */
    public function deconnexion() {
        session_unset();
        session_destroy();
        session_abort();
        header("Location: index.php");
    }
    
    public function connecter() {
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $hashedPassword = $this->utilisateur->getMotDePasse($email);

        $userInfo = $this->utilisateur->getInformationUtilisateur($email);
        var_dump($userInfo);

        if (password_verify($password, $hashedPassword['motDePasse'])) {
            $_SESSION['status'] = true;
            $_SESSION['id'] = $this->utilisateur->getIdUtilisateur($email);
            $_SESSION['nom'] = isset($userInfo[0]['nom']) ? $userInfo[0]['nom'] : "";
            $_SESSION['prenom'] = isset($userInfo[0]['prenom']) ? $userInfo[0]['prenom'] : "";
            $_SESSION['phone'] = isset($userInfo[0]['telephone']) ? $userInfo[0]['telephone'] : "";
            $_SESSION['mail'] = isset($userInfo[0]['courriel']) ? $userInfo[0]['courriel'] : "";
            header("Location: index.php");
            exit;
        } else {
            header("Location: index.php?url=user/connexion&msg=Nom d'utilisateur ou mot de passe incorrect.");
            exit;
        }
    }

    public function inscription() {
        $path = $this->view('utilisateur/inscription');
        file_exists($path) ? include($path) : include $this->view('Error');
    }

    public function get() {
    }
    
    public function store() {
        if (isset($_POST['submit'])) {
            $utilisateur = [
                isset($_POST['nom']) ? $_POST['nom'] : null,
                isset($_POST['prenom']) ? $_POST['prenom'] : null,
                isset($_POST['phone']) ? $_POST['phone'] : null,
                isset($_POST['mail']) ? $_POST['mail'] : null,
                password_hash($_POST['password'], PASSWORD_BCRYPT),
            ];
            
            $this->utilisateur->insertUtilisateur($utilisateur);
            file_exists($this->view('utilisateur/connexion')) ? require_once $this->view('utilisateur/connexion') : include $this->view('Error');
        }
    }

    public function update() {
    }
    
    public function delete() {
    }

}
