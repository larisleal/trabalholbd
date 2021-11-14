<?php
namespace Model;
use Model\ConexaoDB;
include_once('PacienteEndereco.php');
include_once('Paciente.php');
require_once("ConexaoDB.php");


class pacientesActions extends ConexaoDB{

    
    private $Db;

    //INSERE PACIENTES
    public function insertPaciente($nome, $dataNasc, $cpf, $email, $enderecoID, $telefone, $celular, $observacoes) {


        $Datafetch = $this->Db = $this->ConexaoDB()->prepare("INSERT INTO `Paciente`(`nome`, `dataNasc`, `cpf`, `email`, `telefone`, `celular`, `observacoes`, `enderecoID`) 
                                                                VALUES (:nome, :dataNasc, :cpf, :email, :telefone, :celular, :observacoes, :enderecoID)");
        $this->Db->bindParam(":nome", $nome, \PDO::PARAM_STR);
        $this->Db->bindParam(":dataNasc", $dataNasc, \PDO::PARAM_STR);
        $this->Db->bindParam(":cpf", $cpf, \PDO::PARAM_STR);
        $this->Db->bindParam(":email", $email, \PDO::PARAM_STR);
        $this->Db->bindParam(":telefone", $telefone, \PDO::PARAM_STR);
        $this->Db->bindParam(":celular", $celular, \PDO::PARAM_STR);
        $this->Db->bindParam(":observacoes", $observacoes, \PDO::PARAM_STR);
        $this->Db->bindParam(":enderecoID", $enderecoID, \PDO::PARAM_STR);

        
        if($Datafetch->execute())
            return true;    
        else
            return false;
        
            
    }

    //REMOVE TAREFAS
    // public function removeTarefas($tarefaID) {
    //     $this->Db = $this->ConexaoDB()->prepare("DELETE FROM tarefas WHERE tarefaID=:tarefaID");
    //     $this->Db->bindParam(":tarefaID", $tarefaID, \PDO::PARAM_INT);
    //     return $this->Db->execute();
    // }

    //SELECT TAREFA-ETIQUETA
    // public function selectAllTarefas() {


    //     $Datafetch = $this->Db = $this->ConexaoDB()->prepare("SELECT * from tarefas JOIN etiquetas ON (tarefas.etiquetaID = etiquetas.etiquetaID)");
    //     $Datafetch->execute();

    //     $tarefasArray = array();
    //     while ($fetch = $Datafetch->fetch(\PDO::FETCH_ASSOC)) {
    //         $tarefaID= $fetch['tarefaID'];
    //         $tarefas = new TarefaEtiqueta($tarefaID,$fetch['status'], $fetch['nome'], $fetch['prazo'], $fetch['etiquetaID'], $fetch['nomeEtiqueta']);
    //         array_push($tarefasArray, $tarefas);

    //     }  
    //     return $tarefasArray;

    // }

    

}

