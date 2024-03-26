<?php

    class connexion_DB
    {
        protected $host;
        protected $port;
        protected $dbname;
        protected $user;
        protected $passwd;
        protected $sgbd;
        protected $cnx;

        public function __construct() {
            $this->host   = "localhost";     // Hôte de la base de donnée
            $this->port   = 3306;            // Port
            $this->dbname = "reservo";       // Nom de la BD            
            $this->user   = 'jeremy';        // Utilisateur
            $this->passwd = "jeremy";        
            $this->sgbd   = "mysql";         // Server de Gestion de Base de donnée
            $this->cnx = null;               // Initialisation de la connexion à NULL

            $this->getConnection(); 
        }

        /**
         * Crée une connexion avec la base de donnée. 
         * 
         * @param connexion_DB $cnx Renvoie la connexion a la base de donnée
         */
        public function getConnection() {
            // on ferme la connexion précédente
            $this->fermerConnexion();

            // On essaie de se connecter à la base
            try{
                $this->cnx = new PDO($this->sgbd.":host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->passwd);
                $this->cnx->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connexion à la base de données impossible : " . $exception->getMessage();
            }
            
            return $this->cnx;
        }

        public function insertUtilisateur(array $data) {
            try {
                $sql = 'INSERT INTO utilisateur (nom, prenom, telephone, courriel) VALUES (:nom, :prenom, :telephone, :courriel);';
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(':nom', $data[0], PDO::PARAM_STR);
                $rqt->bindValue(':prenom', $data[1], PDO::PARAM_STR);
                $rqt->bindValue(':telephone', $data[2], PDO::PARAM_STR);
                $rqt->bindValue(':courriel', $data[3], PDO::PARAM_STR);
                $rqt->execute();
                $rqt->closeCursor();
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
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

        public function getIdUtilisateur(array $data) {
            try {
                $sql = "SELECT idUtilisateur FROM utilisateur WHERE telephone = :telephone AND courriel = :courriel";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(":telephone", $data[2]);
                $rqt->bindValue(":courriel", $data[3]);
                $rqt->execute();
                $idUser = $rqt->fetch();
                $rqt->closeCursor();
                return $idUser['idUtilisateur'];
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

        public function checkEmailOrPhone(array $data) {
            try {
                $sql = "SELECT COUNT(*) FROM utilisateur WHERE telephone = :telephone OR courriel = :courriel";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindValue(":telephone", $data[2]);
                $rqt->bindValue(":courriel", $data[3]);
                $rqt->execute();
                $idUser = $rqt->fetch();
                $rqt->closeCursor();
                return $idUser[0];
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        /* 
        public function getReservationUtilisateur($id) {
            try {
                $sql = "SELECT * FROM utilisateur u INNER JOIN reservation r ON u.`idUtilisateur` = r.`idUtilisateur` WHERE u.`idUtilisateur` = :id;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':id', $id);
                $rqt->execute();
                $data = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $data;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        public function getReservationSalle($id) {
            try {
                $sql = "SELECT s.nom as salle FROM reservation r 
                    INNER JOIN salle_reservee sr ON r.`idReservation` = sr.`idReservation`
                    INNER JOIN salle s ON sr.`idSalle` = s.`idSalle`
                    WHERE r.`idUtilisateur` = :id;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':id', $id);
                $rqt->execute();
                $data = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $data;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        public function getReservationEquipement($id) {
            try {
                $sql = "SELECT e.nom as equipement, er.quantite as quantite FROM reservation r 
                    INNER JOIN equipement_reservee er ON r.`idReservation` = er.`idReservation`
                    INNER JOIN equipement e ON er.`idEquipement` = e.`idEquipement`
                    WHERE r.`idUtilisateur` = :id;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':id', $id);
                $rqt->execute();
                $data = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $data;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        public function getReservationService($id) {
            try {
                $sql = "SELECT srv.nom as service FROM reservation r 
                    INNER JOIN service_reservee srv_r ON r.`idReservation` = srv_r.`idReservation`
                    INNER JOIN service srv ON srv_r.`idService` = srv.`idService`
                    WHERE r.`idUtilisateur` = :id;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':id', $id);
                $rqt->execute();
                $data = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $data;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        } */
        
        /**
         * Function pour fermer la connexion avec la base de donnée.
         */
        
        public function fermerConnexion() 
        {
            $this->cnx = null;
        }
    }
    