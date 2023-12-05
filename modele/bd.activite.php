<?php 
include_once "database.php";

class Activite{
    private int $NumActi;

private String $NomActivite;

private int $NbrdePlace;

private float $Montant;

public function __construct(int $NumActi=0, String $NomActivite="", int $NbrdePlace=0, float $Montant=0 ){
    $this->NumActi = $NumActi;
    $this->NomActivite = $NomActivite;
    $this->NbrdePlace=$NbrdePlace;
    $this->Montant = $Montant;
}

public function getNumActi(){
    return $this->NumActi;
}
public function getNomActiv(){
    return $this->NomActivite;
}
 public function getNbrdePlace(){
    return $this->NbrdePlace;
 }
 public function getMontant(){
    return $this->Montant;
 }
 
 public function setNumActi(int $numActi){
    $this->NumActi=$numActi;
}
public function setNomActiv(String $nomActivite){
     $this->NomActivite=$nomActivite;
}
 public function setNbrdePlace(int $nbrdePlace){
     $this->NbrdePlace=$nbrdePlace;
 }
 public function setMontant(float $montant){
     $this->Montant=$montant;
 }
 //Creation 
 public function addActivite(){
    
    $conn=connexionPDO() ;
  $sql= "INSERT INTO activite VALUES (NUll,?,?,?)";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(1,$this->NomActivite);
        $stmt->bindValue(2,$this->NbrdePlace);
        $stmt->bindValue(3,$this->Montant);
        
    $stmt->execute();
 }
 public function getActivites(){

    $conn=connexionPDO() ;
    $sql="SELECT * FROM activite";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $Activites=$stmt->fetchAll(PDO::FETCH_OBJ);
    return $Activites;
}
public function getUnActivites($num){

    $conn=connexionPDO() ;
    $sql="SELECT * FROM activite where id_activite=?";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(1,$num);
    $stmt->execute();
    $Acti=$stmt->fetch(PDO::FETCH_OBJ);
    return $Acti;
}
public function Modifier($num){

    $conn=connexionPDO() ;
    $sql="UPDATE activite SET NomActivite = ?,MontantActivite=?,NombrePlaceReserv=? WHERE  id_activite=?";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(1,$this->NomActivite);
    $stmt->bindValue(2,$this->Montant);
    $stmt->bindValue(3,$this->NbrdePlace);
    $stmt->bindValue(4,$num);
    $stmt->execute();
    $Acti=$stmt->fetch(PDO::FETCH_OBJ);
    return $Acti;
}
public function suppActi(){
    
    $conn=connexionPDO() ;
    $sql="DELETE * FROM activite where id_activite=?";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(1,$this->NomActivite);
    $stmt->execute();
    $SuppActi=$stmt->fetch(PDO::FETCH_OBJ);
    return $SuppActi;
}
public function getTotalMontantActivites($id) {
    $conn=connexionPDO() ;

    $sql=("SELECT SUM(MontantActivite) AS totalActivites FROM activite WHERE id_activite IN (SELECT id_activite FROM participe WHERE id_congressiste = ?)");
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $resultActivites = $stmt->fetch(PDO::FETCH_ASSOC);
    $montantActivites = $resultActivites['totalActivites'];
    return $montantActivites;
}

}
?>