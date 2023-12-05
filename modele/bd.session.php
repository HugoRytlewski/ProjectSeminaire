<?php
include_once "database.php";

class Session {
    private int $identifiantSession;
    private string $nomSession;
    private float $prixSession;
    private int $NombrePlace;
    private int $NombrePlaceReserv; 

    public function __construct($identifiantSession = 0, $nomSession = '', $prixSession = 0 , $NombrePlace = 0 ,$NombrePlaceReserv = 0 ) {
        $this->identifiantSession = $identifiantSession;
        $this->nomSession = $nomSession;
        $this->prixSession = $prixSession;
        $this->NombrePlace = $NombrePlace;
        $this->NombrePlaceReserv = $NombrePlaceReserv;

    }

    public function getIdentifiantSession() {
        return $this->identifiantSession;
    }

    public function setIdentifiantSession($identifiantSession) {
        $this->identifiantSession = $identifiantSession;
    }

    public function getNomSession() {
        return $this->nomSession;
    }

    public function setNomSession($nomSession) {
        $this->nomSession = $nomSession;
    }

    public function getPrixSession() {
        return $this->prixSession;
    }

    public function setPrixSession($prixSession) {
        $this->prixSession = $prixSession;
    }

    public function getNombrePlace() {
        return $this->NombrePlace;
    }

    public function setNombrePlace($NombrePlace) {
        $this->NombrePlace = $NombrePlace;
    }

    public function getNombrePlaceReserv() {
        return $this->NombrePlaceReserv;
    }

    public function setNombrePlaceReserv($NombrePlaceReserv) {
        $this->NombrePlaceReserv = $NombrePlaceReserv;
    }

    
    public function getTotalMontantSessions($id) {
        $connex=connexionPDO() ;

        $prepSessions = $connex->prepare("SELECT SUM(PrixSession) AS totalSessions FROM session WHERE id_session IN (SELECT id_session FROM assiste WHERE id_congressiste = ?)");
        $prepSessions->bindValue(1, $id);
        $prepSessions->execute();
        $resultSessions = $prepSessions->fetch(PDO::FETCH_ASSOC);
        $montantSessions = $resultSessions['totalSessions'];        
        return $montantSessions;    
    }

}
?>
