<?php

namespace Models;
use PDO;

class Utilisateur extends Model
{
    
    public function __construct() {
        parent::__construct();
    }

    public function getMotDePasse($email) {
        $sql = "SELECT motDePasse FROM utilisateur WHERE courriel = :courriel;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->bindParam(':courriel', $email, PDO::PARAM_STR);
        $rqt->execute();
        $result = $rqt->fetch(PDO::FETCH_ASSOC);
        $rqt->closeCursor();

        return $result;
    }

    public function getIdUtilisateur($email) {
        $sql = "SELECT idUtilisateur FROM utilisateur WHERE courriel = :courriel;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->bindParam(':courriel', $email, PDO::PARAM_STR);
        $rqt->execute();
        $result = $rqt->fetch(PDO::FETCH_ASSOC);
        $rqt->closeCursor();

        return $result['idUtilisateur'];
    }

    public function getInformationUtilisateur($email) {
        $sql = "SELECT nom, prenom, telephone, courriel, typeUtilisateur FROM utilisateur WHERE courriel = :courriel;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->bindParam(':courriel', $email, PDO::PARAM_STR);
        $rqt->execute();
        $result = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor();

        return $result;
    }

    /**
     * Insert un utilisateur dans la base de données.
     * @param $data - Tableau de données saisie par l'utilisateur
     */
    public function insertUtilisateur(array $data) {
        try {
            $sql = 'INSERT INTO utilisateur (nom, prenom, telephone, courriel, motDePasse, typeUtilisateur) VALUES (:nom, :prenom, :telephone, :courriel, :motDePasse, 1);';
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindValue(':nom', $data[0], PDO::PARAM_STR);
            $rqt->bindValue(':prenom', $data[1], PDO::PARAM_STR);
            $rqt->bindValue(':telephone', $data[2], PDO::PARAM_STR);
            $rqt->bindValue(':courriel', $data[3], PDO::PARAM_STR);
            $rqt->bindValue(':motDePasse', $data[4], PDO::PARAM_STR);
            $rqt->execute();
            $rqt->closeCursor();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

}
