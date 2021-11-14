<?php

namespace Controller;

include_once('Model/Paciente.php');
include_once('Model/PacienteEndereco.php');
include_once('Model/Endereco.php');
include_once('Model/Caixa.php');
include_once('Model/Material.php');
include_once('Model/Usuario.php');
// Actions
include_once('Model/pacientesActions.php');
include_once('Model/vendasActions.php');
include_once('Model/materiaisActions.php');
include_once('Model/usuariosActions.php');

use Model\Paciente;
use Model\PacienteEndereco;
use Model\Endereco;
use Model\Caixa;
use Model\Material;
use Model\Usuario;
// Actions
use Model\pacientesActions;
use Model\vendasActions;
use Model\materiaisActions;
use Model\usuariosActions;


class Controller
{

    public function init()
    {

        if (isset($_GET['page'])) {
            $f = $_GET['page'];
        } else
            $f = "";


        //ROTAS

    }
    public function index()
    {
        require 'View/index.php';
    }

    public function dashboard()
    {
        require 'View/dashboard.php';
    }


    //REQUIRE DE PÁGINAS DE ACORDO COM AS ROTAS

    
    public function inserePaciente() {
        require 'View/inserir_paciente.php';
    }


    // public function visualizaPaciente()
    // {
    //     //     //array de pacientes
    //     $pacientes = new pacientesActions();
    //     $pacientesArray = $pacientes->selectAllPacientes();
    //     $_SESSION['pacientesarray'] = serialize($pacientesArray);

    //     //array de endereços
    //     $enderecos = new enderecosActions();
    //     $enderecosArray = $enderecos->selectAllEnderecos();
    //     $_SESSION['enderecosarray'] = serialize($enderecosArray);

    //     require 'View/pacientes.php';
    // }



    //Caixa
    public function insereVenda()
    {

        require 'View/inserir_venda.php';
    }

    public function visualizaVenda()
    {
        //array de vendas
            $vendas = new vendasActions();
            $vendasArray = $vendas->selectAllVendas();
            $_SESSION['vendasarray']=serialize($vendasArray);

        require 'View/vendas.php';
    }

    public function editaVenda() {

        require 'View/editar_venda.php';
    }

    public function insereMaterial()
    {

        require 'View/compra_materiais.php';
    }


    //Painel Admin
    public function relatorios()
    {

        require 'View/relatorios.php';
    }

    public function insereUsuario()
    {

        require 'View/inserir_usuario.php';
    }
    


    // -------------------------------- CRUDS ------------------------------------------------------------------------------------


    //INSERE PACIENTE
    public function inserirPaciente()
    {
        if (isset($_POST['addpaciente'])) {

            $nome = $_POST['nome'];
            $dataNasc = $_POST['dataNasc'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $observacoes = $_POST['observacoes'];
            $enderecoID = $_POST['enderecoID'];


            $pacientesActions = new pacientesActions();
            $value = $pacientesActions->insertPaciente(
                $nome, 
                $dataNasc, 
                $cpf, 
                $email, 
                $telefone, 
                $celular, 
                $observacoes,
                $enderecoID
            );

            if ($value == true) {
                $_SESSION["addpaciente"] = 'true';
                header("Location: " . DIRPAGE . "/inserepaciente");
            } else {
                header("Location: " . DIRPAGE . "/inserepaciente");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir paciente, tente novamente. </div>";
            }
        }


        require 'View/inserir_paciente.php';
    }

    //INSERE VENDA
    public function inserirVenda()
    {
        if (isset($_POST['addvenda'])) {

            $nomePaciente = $_POST['nomePaciente'];
            $cpfPaciente = $_POST['cpfPaciente'];
            $emailPaciente = $_POST['emailPaciente'];
            $procedimento = $_POST['procedimento'];
            $dataProcedimento = $_POST['dataProcedimento'];
            $valor = $_POST['valor'];
            $observacaoVenda = $_POST['observacaoVenda'];


            $vendasActions = new vendasActions();
            $value = $vendasActions->insertVenda(
                $nomePaciente,
                $cpfPaciente,
                $emailPaciente,
                $procedimento,
                $dataProcedimento,
                $valor,
                $observacaoVenda
            );

            if ($value == true) {
                $_SESSION["insertsucess"] =  'true';
                header("Location: " . DIRPAGE . "/inserevenda");
            } else {
                header("Location: " . DIRPAGE . "/inserevenda");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir, tente novamente. </div>";
            }
        }


        require 'View/inserir_venda.php';
    }
    
    //INSERE MATERIAL
    public function inserirMaterial() {

        if (isset($_POST['addmaterial'])) {

            $nomeFornecedor = $_POST['nomeFornecedor'];
            $produto = $_POST['produto'];
            $qtd = $_POST['qtd'];
            $valor = $_POST['valor'];
            $dataCompra = $_POST['dataCompra'];
            $observacoesMaterial = $_POST['observacoesMaterial'];


            $materiaisActions = new materiaisActions();
            $value = $materiaisActions->insertMaterial(
                $nomeFornecedor,
                $produto,
                $qtd,
                $valor,
                $dataCompra,
                $observacoesMaterial
            );

            if ($value == true) {
                $_SESSION["insertsucess"] =  'true';
                header("Location: " . DIRPAGE . "/inserematerial");
            } else {
                header("Location: " . DIRPAGE . "/inserematerial");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir, tente novamente. </div>";
            }
        }

        require 'View/compra_materiais.php';
    }

    //INSERE USUARIO
    public function inserirUsuario() {

        if (isset($_POST['addusuario'])) {

            $nomeUsuario = $_POST['nomeUsuario'];
            $cpfUsuario = $_POST['cpfUsuario'];
            $emailUsuario = $_POST['emailUsuario'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $tipoUsuario = $_POST['tipoUsuario'];


            $usuariosActions = new usuariosActions();
            $value = $usuariosActions->insertUsuario(
                $nomeUsuario,
                $cpfUsuario,
                $emailUsuario,
                $usuario,
                $senha,
                $tipoUsuario
            );

            if ($value == true) {
                $_SESSION["usuarioinsert"] = 'true';
                header("Location: " . DIRPAGE . "/insereusuario");
            } else {
                header("Location: " . DIRPAGE . "/insereusuario");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir usuario, tente novamente. </div>";
            }
        }
        //     //array de usuários
        //     $usuarios = new usuariosActions();
        //     $usuariosArray = $usuarios->selectAllUsuarios();
        //     $_SESSION['usuariosarray']=serialize($usuariosArray);

        require 'View/inserir_usuario.php';
    }


     //REMOVE VENDA
     public function removerVenda(){

        if(isset($_POST['delete'])){
                
            $vendaID = $_POST['vendaID'];

    
            $vendaAct = new vendasActions();
            $vendaAct->removeVenda($vendaID);
            header("Location: " . DIRPAGE . "/visualizavenda");
            exit;
       }
       header("Location: " . DIRPAGE . "/visualizavenda");
       exit;
    }

    //EDIT VENDA
    public function editarVenda(){

        if(isset($_POST['editarvenda'])){
                    
            $vendaID = $_POST['vendaID'];
            $nomePaciente = $_POST['nomePaciente'];
            $cpfPaciente = $_POST['cpfPaciente'];
            $emailPaciente = $_POST['emailPaciente'];
            $procedimento = $_POST['procedimento'];
            $dataProcedimento = $_POST['dataProcedimento'];
            $valor = $_POST['valor'];
            $observacaoVenda = $_POST['observacaoVenda'];

    
            $caixa = new Caixa($vendaID, $nomePaciente, $cpfPaciente, $emailPaciente, $procedimento, $dataProcedimento, $valor, $observacaoVenda);
            $editVenda = new vendasActions();

            if($editVenda->editVenda($caixa)){
                header("Location: " . DIRPAGE . "/visualizavenda");
                exit;
            }
            else {
                header("Location: " . DIRPAGE . "/visualizavenda");
                exit;
            }
        }
        else {
            header("Location: " . DIRPAGE . "/visualizavenda");
            exit;
        }
    }
     


   
}