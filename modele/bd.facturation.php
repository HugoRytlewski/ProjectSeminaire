<?php
include_once "database.php";

class facturation {
    private int $id_facture;
    private bool $Statut;
    private string $date_facture;
    private int $id_congriste;
    private int $montant;

    public function __construct($id_facture = 0 ,$statut = false, $date_facture = "", $id_congres = 0 , $montant_fac = 0) {
        $this->id_facture = $id_facture;
        $this->Statut = $statut;
        $this->date_facture = $date_facture;
        $this->id_congriste = $id_congres;
        $this->montant = $montant_fac;
    }


    public function getIdFacture() {
        return $this->id_facture;
    }

    public function getStatut() {
        return $this->Statut;
    }

    public function getDateFacture() {
        return $this->date_facture;
    }

    public function getIdCongres() {
        return $this->id_congriste;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function setStatut($statut) {
        $this->Statut = $statut;
    }

    public function setDateFacture($date_facture) {
        $this->date_facture = $date_facture;
    }

    public function setIdCongres($id_congres) {
        $this->id_congriste = $id_congres;
    }
    public function setMontant($montant) {
        $this->montant = $montant;
    }

    public function createFacture() {
            $connex = connexionPDO();
            $prep = $connex->prepare("INSERT INTO facture VALUES (Null,?,?,?)");
            $prep->bindValue(1, $this->Statut);
            $prep->bindValue(2, $this->date_facture);
            $prep->bindValue(3, $this->id_congriste);
            $prep->execute();
    } 

    public function GetAllFacture(){
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT f.*, CONCAT(c.Nom, ' ', c.Prenom) AS Nom FROM facture f INNER JOIN congressiste c ON f.id_congressiste = c.id_congressiste");
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    

    public function GetOneFacture($id){
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT facture.*, congressiste.Nom AS NomCongressiste FROM facture
        INNER JOIN congressiste ON facture.id_congressiste = congressiste.id_congressiste
        WHERE facture.id_facture = ?");        $prep->bindValue(1, $id);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function ModifierFacture(){
        $connex = connexionPDO();
        $prep = $connex->prepare("UPDATE facture SET StatutPaiement = ?, Date = ?, id_congressiste  = ? WHERE id_facture = ?");
        $prep->bindValue(1, $this->Statut);
        $prep->bindValue(2, $this->date_facture);
        $prep->bindValue(3, $this->id_congriste);
        $prep->bindValue(4, $this->id_facture);

        $prep->execute();

    }

    public function GetAllFacturePaid(){
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT f.*, CONCAT(c.Nom, ' ', c.Prenom) AS Nom FROM facture f INNER JOIN congressiste c ON f.id_congressiste = c.id_congressiste WHERE StatutPaiement = 1");
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }

    public function GetAllFactureUnPaid(){
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT f.*, CONCAT(c.Nom, ' ', c.Prenom) AS Nom FROM facture f INNER JOIN congressiste c ON f.id_congressiste = c.id_congressiste WHERE StatutPaiement = 0");
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }

  public function GetAllActiviteFacture($id){
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT a.*, f.*, CONCAT(c.Nom, ' ', c.Prenom) AS Nom FROM facture f INNER JOIN congressiste c ON f.id_congressiste = c.id_congressiste INNER JOIN participe p ON c.id_congressiste = p.id_congressiste INNER JOIN activite a ON p.id_activite = a.id_activite WHERE f.id_facture = ?");
        $prep->bindValue(1, $id);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }

    public function GetAllSessionFacture($id){
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT a.*, f.*, CONCAT(c.Nom, ' ', c.Prenom) AS Nom FROM facture f INNER JOIN congressiste c ON f.id_congressiste = c.id_congressiste INNER JOIN assiste p ON c.id_congressiste = p.id_congressiste INNER JOIN session a ON p.id_session = a.id_session WHERE f.id_facture = ?");
        $prep->bindValue(1, $id);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }
public function GetAllCongresFacture($id){
    $connex = connexionPDO();
    $prep = $connex->prepare("SELECT c.*, f.*, c.Nom AS NomCongressiste, c.Prenom, h.NomHotel AS NomHotel FROM facture f INNER JOIN congressiste c ON f.id_congressiste = c.id_congressiste INNER JOIN hotel h ON c.id_hotel = h.id_hotel WHERE f.id_facture = ?");
    $prep->bindValue(1, $id);
    $prep->execute();
    $result = $prep->fetchAll(PDO::FETCH_OBJ);
    return $result;
}


    

    public function GetAllDetailFacture($id){
        $congres = $this->GetAllCongresFacture($id);
        $activites = $this->GetAllActiviteFacture($id);
        $sessions = $this->GetAllSessionFacture($id);
    
        foreach ($activites as $activite) {
            $activitesInfos[] = array(
                'NomActivite' => $activite->NomActivite,
                'MontantActivite' => $activite->MontantActivite
            );
        }
    
        foreach ($sessions as $session) {
            $SessionInfos[] = array(
            'NomSession' => $session->NomSession,
            'MontantSession' => $session->PrixSession,

            );
        }
        return array(
            'congres' => $congres,
            'activites' => $activitesInfos,
            'sessions' => $SessionInfos
       
        );
    }

    
    
    
    
} 
