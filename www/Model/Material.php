<?php
namespace Model;

Class Caixa {

    private $materialID;
    private $nomeFornecedor;
    private $produto;
    private $qtd;
    private $valor;
    private $dataCompra;
    private $observacoesMaterial;

    
    public function __construct($materialID, $nomeFornecedor, $produto, $qtd, $valor, $dataCompra, $observacoesMaterial) {

        $this->materialID = $materialID;
        $this->nomeFornecedor = $nomeFornecedor;
        $this->produto = $produto;
        $this->qtd = $qtd;
        $this->valor = $valor;
        $this->dataCompra = $dataCompra;
        $this->observacoesMaterial = $observacoesMaterial;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->materialID;
    }

    /**
     * @param mixed 
     */
    public function setId($materialID)
    {
        $this->materialID = $materialID;
    }

    /**
     * @return mixed
     */
    public function geNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    /**
     * @param mixed 
     */
    public function setNomeFornecedor($nomeFornecedor)
    {
        $this->nomeFornecedor = $nomeFornecedor;
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @param mixed 
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

        /**
     * @return mixed
     */
    public function getQtd()
    {
        return $this->qtd;
    }

    /**
     * @param mixed 
     */
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }

            /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed 
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
        
    /**
     * @return mixed
     */
    public function getDataCompra()
    {
        return $this->dataCompra;
    }

    /**
     * @param mixed 
     */
    public function setDataCompra($dataCompra)
    {
        $this->dataCompra = $dataCompra;
    }

     /**
     * @return mixed
     */
    public function getObservacoesMaterial()
    {
        return $this->observacoesMaterial;
    }

    /**
     * @param mixed 
     */
    public function setObservacoesMaterial($observacoesMaterial)
    {
        $this->observacoesMaterial = $observacoesMaterial;
    }
}
