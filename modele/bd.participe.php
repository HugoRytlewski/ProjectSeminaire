<?php 
include_once "database.php";
class Participe{

    private int $id_activite;
    private int $id_congressiste;

    public function __construct(int $id_activite=0, int $id_congressiste=0){
        $this->id_activite = $id_activite;
        $this->id_congressiste = $id_congressiste;
    }

    public function getIdActivite(){
        return $this->id_activite;
    }
    public function getIdCongressiste(){
        return $this->id_congressiste;
    }

    public function setIdActivite(int $id_activite){
        $this->id_activite=$id_activite;
    }

    public function setIdCongressiste(int $id_congressiste){
        $this->id_congressiste=$id_congressiste;
    }


    public function getIdActivitebyIDcongre($id){

        $conn=connexionPDO() ;
        $sql=" SELECT id_activite FROM participe WHERE id_congressiste = ?";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $results=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

}
