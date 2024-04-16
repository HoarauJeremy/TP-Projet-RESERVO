<?php

namespace Controllers;
use Models\Utilisateur;

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
            
        if (file_exists($path)) {
            include($path);
        } else {
            include $this->view('Error');
        }
    }

    public function connexion() {
        $path = $this->view('utilisateur/connexion');
            
        if (file_exists($path)) {
            include($path);
        } else {
            include $this->view('Error');
        }
    }
    
    public function connecter() {
        $this->utilisateur->connexion();
    }

    public function inscription() {
        $path = $this->view('utilisateur/inscription');
            
        if (file_exists($path)) {
            include($path);
        } else {
            include $this->view('Error');
        }
    }

    public function get() {
    }
    
    public function store() {
        if (isset($_POST['submit'])) {
            $utilisateur = [
                isset($_POST['prenom']) ? $_POST['prenom'] : null,
                isset($_POST['nom']) ? $_POST['nom'] : null,
                isset($_POST['phone']) ? $_POST['phone'] : null,
                isset($_POST['mail']) ? $_POST['mail'] : null,
                password_hash($_POST['password'], PASSWORD_DEFAULT),
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
