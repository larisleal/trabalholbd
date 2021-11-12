<?php
namespace Model;

Class Usuario {

    private $usuarioID;
    private $nomeUsuario;
    private $cpfUsuario;
    private $emailUsuario;
    private $usuario;
    private $senha;
    private $tipoUsuario;

    
    public function __construct($usuarioID, $nomeUsuario, $dataNasc, $cpfUsuario, $emailUsuario, $usuario, $senha, $tipoUsuario) {

        $this->usuarioID = $usuarioID;
        $this->nomeUsuario = $nomeUsuario; 
        $this->dataNasc = $dataNasc;
        $this->cpfUsuario = $cpfUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->tipoUsuario = $tipoUsuario;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->usuarioID;
    }

    /**
     * @param mixed 
     */
    public function setId($usuarioID)
    {
        $this->usuarioID = $usuarioID;
    }


    /**
     * @return mixed
     */
    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }


    /**
     * @param mixed 
     */
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
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
    public function getCpfUsuario()
    {
        return $this->cpfUsuario;
    }


    /**
     * @param mixed 
     */
    public function setCpfUsuario($cpfUsuario)
    {
        $this->cpfUsuario = $cpfUsuario;
    }

        /**
     * @return mixed
     */
    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }


    /**
     * @param mixed 
     */
    public function setEmailUsuario($emailUsuario)
    {
        $this->emailUsuario = $emailUsuario;
    }


    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }


    /**
     * @param mixed 
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }


    /**
     * @param mixed 
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    /**
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }


    /**
     * @param mixed 
     */
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }


}
