<?php
namespace Model;
use Model\ConexaoDB;
include_once('Caixa.php');
require_once("ConexaoDB.php");


class vendasActions extends ConexaoDB{

    
    private $Db;

    //INSERE VENDA
    public function insertVenda($nomePaciente, $cpfPaciente, $emailPaciente, $procedimento, $dataProcedimento, $valor, $observacaoVenda) {



        $Datafetch = $this->Db = $this->ConexaoDB()->prepare(
                "INSERT INTO `Caixa`(`nomePaciente`, `cpfPaciente`, `emailPaciente`, `procedimento`, `dataProcedimento`, `valor`, `observacaoVenda`) 
                VALUES (:nomePaciente, :cpfPaciente, :emailPaciente, :procedimento, :dataProcedimento, :valor, :observacaoVenda)");
        $this->Db->bindParam(":nomePaciente", $nomePaciente, \PDO::PARAM_STR);
        $this->Db->bindParam(":cpfPaciente", $cpfPaciente, \PDO::PARAM_STR);
        $this->Db->bindParam(":emailPaciente", $emailPaciente, \PDO::PARAM_STR);
        $this->Db->bindParam(":procedimento", $procedimento, \PDO::PARAM_STR);
        $this->Db->bindParam(":dataProcedimento", $dataProcedimento, \PDO::PARAM_STR);
        $this->Db->bindParam(":valor", $valor, \PDO::PARAM_STR);
        $this->Db->bindParam(":observacaoVenda", $observacaoVenda, \PDO::PARAM_STR);
        
        
        if($Datafetch->execute()) {
            return true;
        }
        else
            return false;
        
            
    }

    //REMOVE VENDA
    public function removeVenda($vendaID) {
        $this->Db = $this->ConexaoDB()->prepare("DELETE FROM Caixa WHERE vendaID=:vendaID");
        $this->Db->bindParam(":vendaID", $vendaID, \PDO::PARAM_INT);
        return $this->Db->execute();
    }

    //EDIT VEMDA
    public function editVenda(Caixa $caixa)
    {
        $this->Db = $this->ConexaoDB()->prepare("UPDATE Caixa 
        SET nomePaciente=:nomePaciente, cpfPaciente=:cpfPaciente, emailPaciente=:emailPaciente, procedimento=:procedimento, 
        dataProcedimento=:dataProcedimento, valor=:valor, observacaoVenda=:observacaoVenda WHERE vendaID=:vendaID");
        $this->Db->bindValue(":vendaID", $caixa->getId(), \PDO::PARAM_INT);
        $this->Db->bindValue(":nomePaciente", $caixa->getNomePaciente(), \PDO::PARAM_STR);
        $this->Db->bindValue(":cpfPaciente", $caixa->getCpfPaciente(), \PDO::PARAM_STR);
        $this->Db->bindValue(":emailPaciente", $caixa->getEmailPaciente(), \PDO::PARAM_STR);
        $this->Db->bindValue(":procedimento", $caixa->getProcedimento(), \PDO::PARAM_STR);
        $this->Db->bindValue(":dataProcedimento", $caixa->getDataProcedimento(), \PDO::PARAM_STR);
        $this->Db->bindValue(":valor", $caixa->getValor(), \PDO::PARAM_STR);
        $this->Db->bindValue(":observacaoVenda", $caixa->getObservacaoVenda(), \PDO::PARAM_STR);
        
        return $this->Db->execute();

        
    }

    //SELECT VENDA
    public function selectAllVendas() {


        $Datafetch = $this->Db = $this->ConexaoDB()->prepare("SELECT * from Caixa");
        $Datafetch->execute();

        $vendasArray = array();
        while ($fetch = $Datafetch->fetch(\PDO::FETCH_ASSOC)) {
            $vendaID= $fetch['vendaID'];
            $vendas = new Caixa($vendaID, $fetch['nomePaciente'], $fetch['cpfPaciente'], $fetch['emailPaciente'], $fetch['procedimento'],$fetch['dataProcedimento'], $fetch['valor'], $fetch['observacaoVenda']);
            array_push($vendasArray, $vendas);

        }  
        return $vendasArray;

    }

    

}

