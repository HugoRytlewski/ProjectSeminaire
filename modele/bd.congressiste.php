<?php
include_once "database.php";
class congressiste {

    private int $id_congressiste;
    private string $nom;
    private string $prenom;
    private string $adresse;
    private string $email;

    public function __construct(int $id_congressiste = 0, string $nom ='', string $prenom ='', string $adresse='', string $email='') {
        $this->id_congressiste = $id_congressiste;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->email = $email;
    }

    public function getIdCongressiste() {
        return $this->id_congressiste;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setIdCongressiste(string $id_congressiste) {
        $this->id_congressiste = $id_congressiste;
    }

    public function setNom(string $nouveauNom) {
        $this->nom = $nouveauNom;

    }

    public function setPrenom(string $nouveauPrenom) {
        $this->prenom = $nouveauPrenom;
    }

    public function setAdresse(string $nouvelleAdresse) {
        $this->adresse = $nouvelleAdresse;
    }

    public function setEmail(string $nouveauEmail) {
        $this->email = $nouveauEmail;
    }

    public function addCongressiste() {
        $connex = connexionPDO();
        $prep= $connex->prepare ("INSERT INTO congressiste VALUES (?,?,?,?,?,100,Null,Null,Null,Null)");
        $prep-> bindValue(1, $this->id_congressiste);
        $prep-> bindValue(2, $this->nom);
        $prep-> bindValue(3, $this->prenom);
        $prep-> bindValue(4, $this->adresse);
        $prep-> bindValue(5, $this->email);
        $prep->execute();
    }

    public function ModifierCongressiste($id_congressiste) {
        $connex = connexionPDO();
        $prep = $connex->prepare("UPDATE congressiste SET Nom = ?, Prenom  = ?, Adresse = ?, AdresseMail = ? WHERE id_congressiste = ?");
        $prep-> bindValue(1, $this->nom);
        $prep-> bindValue(2, $this->prenom);
        $prep-> bindValue(3, $this->adresse);
        $prep-> bindValue(4, $this->email);
        $prep-> bindValue(5, $this->id_congressiste);
        $prep->execute();

    }

    public function getAllCongressisteNoFacture() {
        $connex = connexionPDO();
        $prep = $connex->prepare(" SELECT * FROM congressiste WHERE id_congressiste NOT IN ( SELECT id_congressiste FROM facture)");
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    

    public function getUnCongressiste($id_congressiste) {
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT * FROM congressiste WHERE id_congressiste = ?");
        $prep->bindValue(1,$id_congressiste);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function SupprimerCongressiste($id_congressiste) {
        $connex = connexionPDO();
        $prep = $connex->prepare("DELETE FROM congressiste WHERE id_congressiste = ?");
        $prep->bindValue(1, $this->id_congressiste);
        $prep->execute();
    }

    public function getTotalMontantCongre($id) {
        $connex = connexionPDO();
        $prepForfaitHotel = $connex->prepare("SELECT PrixParticipant FROM hotel INNER JOIN congressiste ON congressiste.id_hotel = hotel.id_hotel WHERE congressiste.id_congressiste = ?");
        $prepForfaitHotel->bindValue(1, $id);
        $prepForfaitHotel->execute();

        $resultForfaitHotel = $prepForfaitHotel->fetch(PDO::FETCH_ASSOC);
        $montantHot = $resultForfaitHotel['PrixParticipant'];

        return $montantHot;
    }

    public function aPrisPetitDejeuner($id) {
        $connex = connexionPDO();
        $prepDejeuner = $connex->prepare("SELECT Dejeuner FROM congressiste WHERE id_congressiste = ?");
        $prepDejeuner->bindValue(1, $id);
        $prepDejeuner->execute();
    
        $resultDejeuner = $prepDejeuner->fetch(PDO::FETCH_ASSOC);
        if ($resultDejeuner['Dejeuner'] == 1) {
            return true;
        } else {
            return false;
        }
    }
    

}
?>