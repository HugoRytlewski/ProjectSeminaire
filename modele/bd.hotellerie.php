<?php
include_once "database.php";

class Hotellerie {

private int $idHotel;
private string $nomHotel;
private int $tarif;
private int $nbPlace;
private string $categorieHotel;
private int $prixDej;


public function __construct($idHotel = 0, $nomHotel ="",$tarif = 0, $nbPlace = 0, $categorieHotel="",int $prixDej=0)
{
    $this->idHotel = $idHotel;
    $this->nomHotel = $nomHotel;
    $this->tarif = $tarif;
    $this->nbPlace = $nbPlace;
    $this->categorieHotel = $categorieHotel;
    $this->prixDej = $prixDej;
}


//GETTER

public function getNomHotel() {
    return $this->nomHotel;
}

public function getTarif() {
    return $this->tarif;
}

public function getNbPlace() {
    return $this->nbPlace;
}


public function getCategorieHotel() {
    return $this->categorieHotel;
}


public function getPrixDej() {
    return $this->prixDej;
}



//SETTER

public function setNomHotel($nomHotel) {
    $this->nomHotel = $nomHotel;
}

public function setTarif($tarif) {
    $this->tarif = $tarif;
}

public function setNbPlace($nbPlace) {
    $this->nbPlace = $nbPlace;
}

public function setCategorieHotel($categorieHotel) {
    $this->categorieHotel = $categorieHotel;
}

public function setPrixDej($prixDej) {
    $this->prixDej = $prixDej;
}


//METHODE

//Ajout d'un hotel
public function addHotel() {
    
    $connex=connexionPDO();
    $sql= "INSERT INTO hotel (NomHotel, PrixParticipant, NombrePlace, CategorieHotel, PrixDej) VALUES (?,?,?,?,?)";
    $stmt=$connex->prepare($sql);
    $stmt->bindValue(1,$this->nomHotel);
    $stmt->bindValue(2,$this->tarif);
    $stmt->bindValue(3,$this->nbPlace);
    $stmt->bindValue(4,$this->categorieHotel);
    $stmt->bindValue(5,$this->prixDej);
    $stmt->execute();



}



//Suppression d'un hotel
public function deleteHotel($idHotel){
    
    $connex=connexionPDO();
    $sql= "DELETE FROM hotel WHERE idHotel = ?";
    $stmt=$connex->prepare($sql);
    $stmt->bindValue(1,$idHotel);
    $stmt->execute();
    
}



//Modification d'un hotel
public function updateHotel($idHotel){
    
    $connex=connexionPDO();
    $sql= "UPDATE hotel SET NomHotel = ?, PrixParticipant = ?, NombrePlace = ?, CategorieHotel = ?, PrixDej = ? WHERE idHotel = ?";
    $stmt=$connex->prepare($sql);
    $stmt->bindValue(1,$this->nomHotel);
    $stmt->bindValue(2,$this->tarif);
    $stmt->bindValue(3,$this->nbPlace);
    $stmt->bindValue(4,$this->categorieHotel);
    $stmt->bindValue(5,$this->prixDej);
    $stmt->bindValue(6,$this->idHotel);

    $stmt->execute();

}


public function getHotels(){

    $connex=connexionPDO();
    $sql="SELECT * FROM hotel";
    $stmt=$connex->prepare($sql);
    $stmt->execute();
    $hotel=$stmt->fetchAll(PDO::FETCH_OBJ);
    return $hotel;

}
















}






?>