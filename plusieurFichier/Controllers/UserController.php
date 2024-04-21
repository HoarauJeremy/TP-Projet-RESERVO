<?php

namespace Controllers;
use Models\Utilisateur;

session_start();

class UserController extends Controller
{
    protected $utilisateur;

    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }

    public function index() {
        $this->view('utilisateur/index');
    }

    public function connexion() {
        $this->view('utilisateur/connexion');
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
            $_SESSION['nom'] = $userInfo[0]['nom'] ?? "";
            $_SESSION['prenom'] = $userInfo[0]['prenom'] ?? "";
            $_SESSION['phone'] = $userInfo[0]['telephone'] ?? "";
            $_SESSION['mail'] = $userInfo[0]['courriel'] ?? "";
            $_SESSION['type'] = $userInfo[0]['typeUtilisateur'] ?? "";
            header("Location: index.php");
            exit;
        } else {
            header("Location: index.php?url=user/connexion&msg=Nom d'utilisateur ou mot de passe incorrect.");
            exit;
        }
    }

    public function inscription() {
        $this->view('utilisateur/inscription');
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
