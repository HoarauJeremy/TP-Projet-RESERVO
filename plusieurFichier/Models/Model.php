<?php

namespace Models;
use PDO;
use PDOException;

class Model 
{
    protected $host;
    protected $port;
    protected $dbname;
    protected $user;
    protected $passwd;
    protected $sgbd;
    protected $cnx;

    public function __construct(){
        $this->host   = "locahost";     // Hôte de la base de donnée
        $this->port   = 3306;           // Port
        $this->dbname = "reservo";      // Nom de la BD            
        $this->user   = "jeremy";       // Utilisateur
        $this->passwd = "jeremy";
        $this->sgbd   = "mysql";        // Server de Gestion de Base de donnée
        $this->cnx = null;              // Initialisation de la connexion à NULL
        $this->getConnection();         // Début de la connexion
        }

    // Constructeur Méthode de connexion à la base de données
    private function getConnection(){

        // Supression de la connexion précédente
        $this->fermerConnexion();

        // On essaie de se connecter à la base
        // Singleton : la classe PDO sera instanciée qu'une seule fois dans l'application.
        try{
            $this->cnx = new PDO($this->sgbd.":host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->passwd);
            $this->cnx->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connexion à la base de données impossible : " . $exception->getMessage();
        }
        
        // Renvoie de la connexion
        return $this->cnx;
    }

    protected function executeRequete($sql, $vars = null)
    {
        // Exécution d'une requête préparée
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute($vars);

        // Renvoie du résultat de la requête
        return $rqt;
    }

    // Méthode de déconnexion à la base de données
    private function fermerConnexion() 
    {
        $this->cnx = null;
    }
    
}
