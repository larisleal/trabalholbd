<?php

namespace Model;

abstract class ConexaoDB
{
    
    public function ConexaoDB()
    {
        try {
            $user = "root";
            $pass = "";
            $host = "localhost";
            $dbname = "trablbd";
            
            $Con = new \PDO("mysql:host=".$host.";dbname=".$dbname."", $user, $pass);
            return $Con;
        } catch (\PDOException $Erro) {
            echo $Erro->getMessage();
        }
    }
}
