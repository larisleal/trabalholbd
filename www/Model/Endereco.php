<?php
namespace Model;

Class Endereco {

    private $enderecoID;
    private $rua;
    private $numero;
    private $bairro;
    private $complemento;

    
    public function __construct($enderecoID, $email, $rua, $numero, $bairro, $complemento) {

        $this->enderecoID = $enderecoID;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->complemento = $complemento;
        

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->enderecoID;
    }

    /**
     * @param mixed 
     */
    public function setId($enderecoID)
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
    

  
    

}
