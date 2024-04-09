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
            $user = [
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['phone'],
                $_POST['mail'],
            ];
            
            $this->utilisateur->insertUtilisateur($user);
        }
    }

    public function update() {
    }
    
    public function delete() {
    }

}
