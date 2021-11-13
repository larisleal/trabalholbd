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

    public function insereMaterial()
    {

        require 'View/compra_materiais.php';
    }


    //Painel Admin
    public function relatorios()
    {

        require 'View/relatorios.php';
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
            $enderecoID = $_POST['enderecoID'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $observacoes = $_POST['observacoes'];


            $pacientesActions = new pacientesActions();
            $value = $pacientesActions->inserePaciente(
                $nome, 
                $dataNasc, 
                $cpf, 
                $email, 
                $enderecoID, 
                $telefone, 
                $celular, 
                $observacoes
            );

            if ($value == true) {
                $_SESSION["inserepaciente"] = 'true';
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

    // public function insereUsuario()
    // {
    //     if (isset($_POST['addUsuarios'])) {

    //         $nome_user = $_POST['nomeFornecedor'];
    //         $cpf_user = $_POST['cpf_user'];
    //         $email_user = $_POST['email_user'];
    //         $user = $_POST['user'];
    //         $senha = $_POST['senha'];
    //         $adm = $_POST['adm'];


    //         $usuariosActions = new usuariosActions();
    //         $value = $usuariosActions->insertTarefas(
    //             $nome_user,
    //             $cpf_user,
    //             $email_user,
    //             $user,
    //             $senha,
    //             $adm
    //         );

    //         if ($value == true) {
    //             $_SESSION["taskinsert"] = 'true';
    //             header("Location: " . DIRPAGE . "/mytasks");
    //         } else {
    //             header("Location: " . DIRPAGE . "/mytasks");
    //             echo "<div class='alert alert-danger' role='alert'> Falha ao inserir usuario, tente novamente. </div>";
    //         }
    //     }
    //     //     //array de usuários
    //     //     $usuarios = new usuariosActions();
    //     //     $usuariosArray = $usuarios->selectAllUsuarios();
    //     //     $_SESSION['usuariosarray']=serialize($usuariosArray);

    //     require 'View/inserir_usuario.php';
    // }


   
}