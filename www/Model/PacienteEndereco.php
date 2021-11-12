<?php
namespace Model;

Class PacienteEndereco {

    private $pacienteID;
    private $nome;
    private $dataNasc;
    private $cpf;
    private $email;
    private $enderecoID;
    private $rua;
    private $numero;
    private $bairro;
    private $complemento;
    private $telefone;
    private $celular;
    private $observacoes;

    
    public function __construct($pacienteID, $nome, $dataNasc, $cpf, $enderecoID, $email, $rua, $numero, $bairro, $complemento, $telefone, $celular, $observacoes) {

        $this->pacienteID = $pacienteID;
        $this->nome = $nome; 
        $this->dataNasc = $dataNasc;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->enderecoID = $enderecoID;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->complemento = $complemento;
        $this->telefone = $telefone;
        $this->celular = $celular;
        $this->observacoes = $observacoes;
        

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
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
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
    public function setEmail($email)
    {
        $this->email = $email;
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


         /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }


    /**
     * @param mixed 
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

             /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }


    /**
     * @param mixed 
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }


             /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }


    /**
     * @param mixed 
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

             /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }


    /**
     * @param mixed 
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
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

    
    

}
