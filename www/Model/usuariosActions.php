<?php
namespace Model;
use Model\ConexaoDB;
include_once('Usuario.php');
require_once("ConexaoDB.php");


class usuariosActions extends ConexaoDB{

    
    private $Db;

    //INSERE USUARIO
    public function insertUsuario($nomeUsuario, $cpfUsuario, $emailUsuario, $usuario, $senha, $tipoUsuario) {



        $Datafetch = $this->Db = $this->ConexaoDB()->prepare(
                "INSERT INTO `Usuario`(`nomeUsuario`, `cpfUsuario`, `emailUsuario`, `usuario`, `senha`, `tipoUsuario`)
                VALUES (:nomeUsuario, :cpfUsuario, :emailUsuario, :usuario, :senha, :tipoUsuario)");
        $this->Db->bindParam(":nomeUsuario", $nomeUsuario, \PDO::PARAM_STR);
        $this->Db->bindParam(":cpfUsuario", $cpfUsuario, \PDO::PARAM_STR);
        $this->Db->bindParam(":emailUsuario", $emailUsuario, \PDO::PARAM_STR);
        $this->Db->bindParam(":usuario", $usuario, \PDO::PARAM_STR);
        $this->Db->bindParam(":senha", $senha, \PDO::PARAM_STR);
        $this->Db->bindParam(":tipoUsuario", $tipoUsuario, \PDO::PARAM_STR);

        
        if($Datafetch->execute())
            return true;
        else
            return false;

        
    }

    //REMOVE USUARIO
    public function removeUsuario($cpfUsuario) {
        $this->Db = $this->ConexaoDB()->prepare("DELETE FROM Caixa WHERE cpfUsuario=:cpfUsuario");
        $this->Db->bindParam(":cpfUsuario", $cpfUsuario, \PDO::PARAM_INT);
        return $this->Db->execute();
    }

    //SELECT USUARIO
    public function selectAllUsuarios() {


        $Datafetch = $this->Db = $this->ConexaoDB()->prepare("SELECT * from Usuario");
        $Datafetch->execute();

        $usuariosArray = array();
        while ($fetch = $Datafetch->fetch(\PDO::FETCH_ASSOC)) {
            $cpfUsuario= $fetch['cpf$cpfUsuario'];
            $usuarios = new Material($cpfUsuario, $fetch['nomeUsuario'], $fetch['cpfUsuario'], $fetch['emailUsuario'], $fetch['usuario'],$fetch['senha'], $fetch['tipoUsuario']);
            array_push($usuariosArray, $usuarios);

        }  
        return $usuariosArray;

    }

    

}

