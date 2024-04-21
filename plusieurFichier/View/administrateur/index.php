<?php

    use Models\AdministrationData;
    use Models\EquipementData;
    use Models\SalleData;
    use Models\ServiceData;

    $title = "Tableau de bord";

    $contenu = "
    <div class='dashBoard'>
        <div class='titre'>
            <h1>Tableau de bord</h1>
        </div>

        <div class='dashboard-panel'>
            <div class='res'>
                <div class='res-info'>
                    <div class='titre'>
                        <h2>Salle</h2>
                        <a href='?url=admin/showAll'>Voir tous</a>
                    </div>
                
                    <div class='liste-res'>";

                    foreach ($reservations as $key => $value) {
                        $res = new AdministrationData($value);
                        $contenu .= "
                            <div class='res-box'>
                                <div class='res-pres'>
                                    <h3>".$res->getIdReservation()."</h3>
                                    <p>".date_create($res->getDateReservation())->format("d/m/y")."</p>
                                    <p>".date_create($res->getHeureDebutReservation())->format("H\hm")."</p>
                                    <p>".date_create($res->getHeureFinReservation())->format("H\hm")."</p>
                                    <p>".$res->getPrixTotal()." €</p>
                                </div>
                            </div>";
                    }
                
            $contenu .=  "
                </div>
            </div>";

        $contenu .= "
            </div>

            <div class='article'>
                <div class='salle-info'>
                    <div class='titre'>
                        <h2>Salle</h2>
                        <a href='?url=admin/ajoutSalle'>Ajouter une salle</a>
                    </div>
                    
                    <div class='liste-salle'>";

                    foreach ($salles as $key => $value) {
                        $salle = new SalleData($value);
                        $contenu .= "
                            <div class='salle-box'>
                                <div class='salle-pres'>
                                    <h3>".$salle->getNom()."</h3>
                                    <p>".$salle->getPrix()." €</p>
                                </div>
                                <div class='salle-lien'>
                                    <a href='?url=admin/update/".$salle->getIdSalle()."'>Modifier</a>
                                    <a href='?url=admin/delete/".$salle->getIdSalle()."'>Supprimer</a>
                                </div>
                            </div>";
                    }
                        
                $contenu .=  "
                    </div>
                </div>
                
                <div class='equipement-info'>
                    <div class='titre'>
                        <h2>Equipement</h2>
                        <a href='?url=admin/ajoutEquipement'>Ajouter un equipement</a>
                        <!-- <a href='?url=admin/ajoutEquipement'>Ajouter un equipement</a> -->
                    </div>

                    <div class='liste-equipement'>";
                        
                    foreach ($equipements as $key => $value) {
                        $equipement = new EquipementData($value);
                        $contenu .= "
                            <div class='equipement-box'>
                                <div class='equipement-pres'>
                                    <h3>".$equipement->getNom()."</h3>
                                    <p>".$equipement->getPrix()." €</p>
                                </div>
                                <div class='equipement-lien'>
                                    <a href='?url=admin/update/".$equipement->getIdEquipement()."'>Modifier</a>
                                    <a href='?url=admin/delete/".$equipement->getIdEquipement()."'>Supprimer</a>
                                </div>
                            </div>";
                    }

                $contenu .= "
                    </div>
                </div>

                <div class='service-info'>
                    <div class='titre'>
                        <h2>Service</h2>
                        <a href='?url=admin/ajoutServices'>Ajouter un services</a>
                    </div>

                    <div class='liste-service'>";
                        
                    foreach ($services as $key => $value) {
                        $service = new ServiceData($value);
                        $contenu .= "
                            <div class='service-box'>
                                <div class='service-pres'>
                                    <h3>".$service->getNom()."</h3>
                                    <p>".$service->getPrix()." €</p>
                                </div>
                                <div class='service-lien'>
                                    <a href='?url=admin/update/".$service->getIdService()."'>Modifier</a>
                                    <a href='?url=admin/delete/".$service->getIdService()."'>Supprimer</a>
                                </div>
                            </div>";
                    }
                        
                $contenu .= "
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";

    include 'View/template.php';
