<?php

namespace Models;
use PDO;

class Reservation extends Model
{

    // peut etre ajouter getteur et setteur

    public function __construct() {
        parent::__construct();
    }

    public function insertReservation(array $data) {
        try {
            $sql = 'INSERT INTO reservation (dateReservation, heureDebutReservation, heureFinReservation, prixTotal, idUtilisateur) VALUES (:dateReservation, :heureDebutReservation, :heureFinReservation, :prixTotal, :idUtilisateur);';
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindValue(':dateReservation', $data[0]);
            $rqt->bindValue(':heureDebutReservation', $data[1]);
            $rqt->bindValue(':heureFinReservation', $data[2]);
            $rqt->bindValue(':prixTotal', $data[3], PDO::PARAM_INT);
            $rqt->bindValue(':idUtilisateur', $data[4], PDO::PARAM_INT);

            $rqt->execute();
            $rqt->closeCursor();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function insertSalleReservee(array $data, $id) {
        try {
            $sql = 'INSERT INTO salle_reservee (idReservation, idSalle) VALUES (:idReservation, :idSalle);';
            $rqt = $this->cnx->prepare($sql);
            
            foreach ($data as $salle) {
                if ($salle) {
                    $rqt->bindValue(':idReservation', $this->getIdReservation($id), PDO::PARAM_INT);
                    $rqt->bindValue(':idSalle', $salle, PDO::PARAM_INT);
                    $rqt->execute();
                    $rqt->closeCursor();
                }
            }
            $rqt->closeCursor();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function insertEquipementReservee(array $data, $id) {            
        try {
            $sql = 'INSERT INTO equipement_reservee (idReservation, idEquipement, quantite) VALUES (:idReservation, :idEquipement, :quantite);';
            $rqt = $this->cnx->prepare($sql);

            foreach ($data as $equipement => $quantite) {
                if ($equipement && $quantite) {                        
                    $rqt->bindValue(':idReservation', $this->getIdReservation($id), PDO::PARAM_INT);
                    $rqt->bindValue(':idEquipement', $equipement, PDO::PARAM_INT);
                    $rqt->bindValue(':quantite', $quantite, PDO::PARAM_INT);
                    $rqt->execute();
                    $rqt->closeCursor();
                }
            }
            
            $rqt->closeCursor();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function insertServiceReservee(array $data, $id) {
        try {
            $sql = 'INSERT INTO service_reservee (idReservation, idService) VALUES (:idReservation, :idService);';
            $rqt = $this->cnx->prepare($sql);
            
            foreach ($data as $service) {
                if ($service) {        
                    $rqt->bindValue(':idReservation', $this->getIdReservation($id), PDO::PARAM_INT);
                    $rqt->bindValue(':idService', $service, PDO::PARAM_INT);
                    $rqt->execute();
                    $rqt->closeCursor();
                }
            }
            
            $rqt->closeCursor();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

        /**
         * Methode pour récupérée l'ID de la derniere Reservation
         */
        public function getIdReservation($idUtilisateur) {
            try {
                $sql = "SELECT idReservation FROM reservation r INNER JOIN utilisateur u ON r.`idUtilisateur` = u.`idUtilisateur` WHERE u.`idUtilisateur` = :idUtilisateur ORDER BY idReservation DESC LIMIT 1;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(":idUtilisateur", $idUtilisateur);
                $rqt->execute();
                $id = $rqt->fetch(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $id['idReservation'];
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

}
