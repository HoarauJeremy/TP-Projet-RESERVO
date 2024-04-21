<?php

    namespace Models;
    use PDO;

    class Service extends Model
    {
        function __construct() {
            parent::__construct();
        }

        public function getServices() {
            try {
                $sql = "SELECT * FROM service;";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $salles = $rqt->fetchAll(PDO::FETCH_ASSOC);
                $rqt->closeCursor();
                return $salles;
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }
    }
    
    class ServiceData
    {
        public $idService;
        public $nom;
        public $prix;

        public function __construct(array $donnees) {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }

        // GETTER
        public function getIdService() {
            return $this->idService;
        }

        public function getNom() {
            return $this->nom;
        }
        
        public function getPrix() {
            return $this->prix;
        }

        // SETTER
		public function setIdService($idService) {
            $this->idService = $idService;
        }

		public function setNom($nom) {
            $this->nom = $nom;
        }

        public function setPrix($prix) {
            $this->prix = $prix;
        }
    }
    
