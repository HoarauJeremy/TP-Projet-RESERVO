<?php

namespace Controllers;
use Models\Administration;
use Models\Equipement;
use Models\Reservation;
use Models\Salle;
use Models\Service;

session_start();

class AdminController extends Controller 
{
    protected $adminReservation, $reservation, $salle, $equipement, $service;
    
    function __construct() {;
        $this->adminReservation = new Administration;
        $this->reservation = new Reservation;
        $this->salle = new Salle;
        $this->equipement = new Equipement;
        $this->service = new Service;
    }

    /* 
    
    ✅ Gérer l’authentification des utilisateurs membres de l’association via des comptes utilisateurs 
    • Interface de consultation des réservations en cours, avec suppression automatique et 
    archivage des réservations passées. 

    ➡️• Interface de modification du matériel, des salles et des prestations pouvant être réservées. 
    
    • Possibilité d’ajouter, modifier, supprimer les fiches de chaque (article, service, prix, designation 
    ect..). 

    */

    public function index() {
        $reservations = $this->reservation->getReservations();
        $salles = $this->salle->getSalles();
        $equipements = $this->equipement->getEquipements();
        $services = $this->service->getServices();
        $this->view("administrateur/index", ["reservations" => $reservations, "salles" => $salles, "equipements" => $equipements, "services" => $services]);
    }

    /* public function modificationMateriel() {
        $this->view("administrateur//index");
    } */
    
    public function showAll() {
        $reservations = $this->adminReservation->getReservations();
        $this->view("administrateur/reservations", ['reservations' => $reservations]);
    }

    public function showOne() {
        $url = explode("/", $_GET['url']);
        $val = array_slice($url, 2);
        $reservation = $this->adminReservation->getReservation(...($val));
        $this->view("administrateur/reservation", ['reservation' => $reservation]);
    }

    public function update() {
        $this->view("administrateur/update.php");
    }

    public function delete() {
        $url = explode("/", $_GET['url']);
        $val = array_slice($url, 2);
        if ( $_SESSION['type'] == 2 && $_SESSION['status'] == true) {
            $this->adminReservation->deleteReservation(...($val));
            header("Location: index.php?url=admin/index&msg=La réservation à bien été supprimer");
        } else {
            header("Location: index.php?url=home/error");
        }
    }

}

