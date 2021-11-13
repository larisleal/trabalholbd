<?php
namespace Model;

Class Caixa {

    private $vendaID;
    private $nomePaciente;
    private $cpfPaciente;
    private $emailPaciente;
    private $procedimento;
    private $dataProcedimento;
    private $valor;
    private $observacaoVenda;

    
    public function __construct($vendaID, $nomePaciente, $cpfPaciente, $emailPaciente, $procedimento, $dataProcedimento, $valor, $observacaoVenda) {

        $this->vendaID = $vendaID;
        $this->nomePaciente = $nomePaciente;
        $this->cpfPaciente = $cpfPaciente;
        $this->emailPaciente = $emailPaciente;
        $this->procedimento = $procedimento;
        $this->dataProcedimento = $dataProcedimento;
        $this->valor = $valor;
        $this->observacaoVenda = $observacaoVenda;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->vendaID;
    }

    /**
     * @param mixed 
     */
    public function setId($vendaID)
    {
        $this->vendaID = $vendaID;
    }

    /**
     * @return mixed
     */
    public function getNomePaciente()
    {
        return $this->nomePaciente;
    }

    /**
     * @param mixed 
     */
    public function setNomePaciente($nomePaciente)
    {
        $this->nomePaciente = $nomePaciente;
    }

    /**
     * @return mixed
     */
    public function getCpfPaciente()
    {
        return $this->cpfPaciente;
    }

    /**
     * @param mixed 
     */
    public function setCpfPaciente($cpfPaciente)
    {
        $this->cpfPaciente = $cpfPaciente;
    }

        /**
     * @return mixed
     */
    public function getEmailPaciente()
    {
        return $this->emailPaciente;
    }

    /**
     * @param mixed 
     */
    public function setEmailPaciente($emailPaciente)
    {
        $this->emailPaciente = $emailPaciente;
    }

        /**
     * @return mixed
     */
    public function getProcedimento()
    {
        return $this->procedimento;
    }

    /**
     * @param mixed 
     */
    public function setProcedimento($procedimento)
    {
        $this->procedimento = $procedimento;
    }

            /**
     * @return mixed
     */
    public function getDataProcedimento()
    {
        return $this->dataProcedimento;
    }

    /**
     * @param mixed 
     */
    public function setDataProcedimento($dataProcedimento)
    {
        $this->dataProcedimento = $dataProcedimento;
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
    public function getObservacaoVenda()
    {
        return $this->observacaoVenda;
    }

    /**
     * @param mixed 
     */
    public function setObservacaoVenda($observacaoVenda)
    {
        $this->observacaoVenda = $observacaoVenda;
    }
}
