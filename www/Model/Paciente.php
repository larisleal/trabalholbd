<?php
namespace Model;

Class Paciente {

    private $pacienteID;
    private $nome;
    private $dataNasc;
    private $cpf;
    private $email;
    private $telefone;
    private $celular;
    private $observacoes;
    private $enderecoID;

    
    public function __construct($pacienteID, $nome, $dataNasc, $cpf, $email, $telefone, $celular, $observacoes, $enderecoID) {

        $this->pacienteID = $pacienteID;
        $this->nome = $nome; 
        $this->dataNasc = $dataNasc;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->celular = $celular;
        $this->observacoes = $observacoes;
        $this->enderecoID = $enderecoID;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->pacienteID;
    }

    /**
     * @param mixed 
     */
    public function setId($pacienteID)
    {
        $this->pacienteID = $pacienteID;
    }


    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }


    /**
     * @param mixed 
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    /**
     * @return mixed
     */
    public function getDataNasc()
    {
        return $this->dataNasc;
    }


    /**
     * @param mixed 
     */
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }


    /**
     * @param mixed 
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }



    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param mixed 
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }


    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }


    /**
     * @param mixed 
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }


    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }


    /**
     * @param mixed 
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }


    /**
     * @return mixed
     */
    public function getObservacoes()
    {
        return $this->observacoes;
    }


    /**
     * @param mixed 
     */
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }

     /**
     * @return mixed
     */
    public function getEnderecoID()
    {
        return $this->enderecoID;
    }


    /**
     * @param mixed 
     */
    public function setEnderecoID($enderecoID)
    {
        $this->enderecoID = $enderecoID;
    }




    
    

}
