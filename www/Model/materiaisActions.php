<?php
namespace Model;
use Model\ConexaoDB;
include_once('Material.php');
require_once("ConexaoDB.php");


class materiaisActions extends ConexaoDB{

    
    private $Db;

    //INSERE MATERIAL
    public function insertMaterial($nomeFornecedor, $produto, $qtd, $valor, $dataCompra, $observacoesMaterial) {



        $Datafetch = $this->Db = $this->ConexaoDB()->prepare(
                "INSERT INTO `Material`(`nomeFornecedor`, `produto`, `qtd`, `valor`, `dataCompra`, `observacoesMaterial`)
                VALUES (:nomeFornecedor, :produto, :qtd, :valor, :dataCompra, :observacoesMaterial)");
        $this->Db->bindParam(":nomeFornecedor", $nomeFornecedor, \PDO::PARAM_STR);
        $this->Db->bindParam(":produto", $produto, \PDO::PARAM_STR);
        $this->Db->bindParam(":qtd", $qtd, \PDO::PARAM_STR);
        $this->Db->bindParam(":valor", $valor, \PDO::PARAM_STR);
        $this->Db->bindParam(":dataCompra", $dataCompra, \PDO::PARAM_STR);
        $this->Db->bindParam(":observacoesMaterial", $observacoesMaterial, \PDO::PARAM_STR);

        
        if($Datafetch->execute())
            return true;
        else
            return false;

        
    }

    //REMOVE MATERIAL
    public function removeMaterial($materialID) {
        $this->Db = $this->ConexaoDB()->prepare("DELETE FROM Caixa WHERE materialID=:materialID");
        $this->Db->bindParam(":materialID", $materialID, \PDO::PARAM_INT);
        return $this->Db->execute();
    }

    //SELECT MATERIAL
    public function selectAllMateriais() {


        $Datafetch = $this->Db = $this->ConexaoDB()->prepare("SELECT * from Material");
        $Datafetch->execute();

        $materiaisArray = array();
        while ($fetch = $Datafetch->fetch(\PDO::FETCH_ASSOC)) {
            $materialID= $fetch['materialID'];
            $materiais = new Material($materialID, $fetch['nomeFornecedor'], $fetch['produto'], $fetch['qtd'], $fetch['valor'],$fetch['dataCompra'], $fetch['observacoesMaterial']);
            array_push($materiaisArray, $materiais);

        }  
        return $materiaisArray;

    }

    

}

