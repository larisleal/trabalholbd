<?php

namespace Controller;

include_once('Model/Paciente.php');
include_once('Model/PacienteEndereco.php');
include_once('Model/Endereco.php');
include_once('Model/Caixa.php');
include_once('Model/Material.php');
include_once('Model/Usuario.php');

use Model\Paciente;
use Model\PacienteEndereco;
use Model\Endereco;
use Model\Caixa;
use Model\Material;
use Model\Usuario;


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

    //Insere Paciente
    public function inserePaciente()
    {
        if (isset($_POST['addpaciente'])) {

            $nome = $_POST['nome'];
            $dataNasc = $_POST['dataNasc'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $observacoes = $_POST['observacoes'];


            $pacientesActions = new pacientesActions();
            $value = $pacientesActions->insertTarefas(
                $nome,
                $dataNasc,
                $cpf,
                $telefone,
                $celular,
                $observacoes
            );

            if ($value == true) {
                $_SESSION["taskinsert"] = 'true';
                header("Location: " . DIRPAGE . "/mytasks");
            } else {
                header("Location: " . DIRPAGE . "/mytasks");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir paciente, tente novamente. </div>";
            }
        }


        require 'View/inserir_paciente.php';
    }

    public function visualizaPaciente()
    {
        //     //array de pacientes
        $pacientes = new pacientesActions();
        $pacientesArray = $pacientes->selectAllPacientes();
        $_SESSION['pacientesarray'] = serialize($pacientesArray);

        //array de endereços
        $enderecos = new enderecosActions();
        $enderecosArray = $enderecos->selectAllEnderecos();
        $_SESSION['enderecosarray'] = serialize($enderecosArray);

        require 'View/pacientes.php';
    }

    //Caixa
    public function insereVenda()
    {
        if (isset($_POST['addvenda'])) {

            $nomePac = $_POST['nomePac'];
            $pcfp = $_POST['pcpf'];
            $email = $_POST['email'];
            $procedimento = $_POST['procedimento'];
            $dataProcedimento = $_POST['dataProcedimento'];
            $valor = $_POST['valor'];
            $observacoesVenda = $_POST['observacoesVenda'];


            $materiaisActions = new materiaisActions();
            $value = $materiaisActions->insertTarefas(
                $nomePac,
                $pcfp,
                $email,
                $procedimento,
                $dataProcedimento,
                $valor,
                $observacoesVenda
            );

            if ($value == true) {
                $_SESSION["taskinsert"] = 'true';
                header("Location: " . DIRPAGE . "/mytasks");
            } else {
                header("Location: " . DIRPAGE . "/mytasks");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir material, tente novamente. </div>";
            }
        }


        require 'View/inserir_venda.php';
    }

    public function visualizaVenda()
    {
        //array de caixa
        //     $caixa = new caixaActions();
        //     $caixaArray = $caixa->selectAllCaixa();
        //     $_SESSION['caixaarray']=serialize($caixaArray);

        require 'View/vendas.php';
    }

    //Materiais
    public function insereMaterial()
    {
        if (isset($_POST['addMateriais'])) {

            $nomeFornecedor = $_POST['nomeFornecedor'];
            $produto = $_POST['produto'];
            $valor = $_POST['valor'];
            $dataCompra = $_POST['dataCompra'];
            $observacoesMat = $_POST['observacoesMat'];


            $pacientesActions = new pacientesActions();
            $value = $pacientesActions->insertTarefas(
                $nomeFornecedor,
                $produto,
                $valor,
                $dataCompra,
                $observacoesMat
            );

            if ($value == true) {
                $_SESSION["taskinsert"] = 'true';
                header("Location: " . DIRPAGE . "/mytasks");
            } else {
                header("Location: " . DIRPAGE . "/mytasks");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir paciente, tente novamente. </div>";
            }
        }

        //     //array de materiais
        //     $materiais = new materiaisActions();
        //     $materiaisArray = $materiais->selectAllMateriais();
        //     $_SESSION['materiaisarray']=serialize($materiaisArray);

        require 'View/compra_materiais.php';
    }

    //Painel Admin
    public function relatorios()
    {

        require 'View/relatorios.php';
    }

    public function insereUsuario()
    {
        if (isset($_POST['addUsuarios'])) {

            $nome_user = $_POST['nomeFornecedor'];
            $cpf_user = $_POST['cpf_user'];
            $email_user = $_POST['email_user'];
            $user = $_POST['user'];
            $senha = $_POST['senha'];
            $adm = $_POST['adm'];


            $usuariosActions = new usuariosActions();
            $value = $usuariosActions->insertTarefas(
                $nome_user,
                $cpf_user,
                $email_user,
                $user,
                $senha,
                $adm
            );

            if ($value == true) {
                $_SESSION["taskinsert"] = 'true';
                header("Location: " . DIRPAGE . "/mytasks");
            } else {
                header("Location: " . DIRPAGE . "/mytasks");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir paciente, tente novamente. </div>";
            }
        }
        //     //array de usuários
        //     $usuarios = new usuariosActions();
        //     $usuariosArray = $usuarios->selectAllUsuarios();
        //     $_SESSION['usuariosarray']=serialize($usuariosArray);

        require 'View/inserir_usuario.php';
    }






    // public function goCadastrar() {
    //     require 'View/cadastro.php';
    // }

    // public function goMyTasks() {
    //     //array de pacientes
    //     $pacientes = new pacientesActions();
    //     $pacientesArray = $pacientes->selectAllPacientes();
    //     $_SESSION['pacientesarray']=serialize($pacientesArray);

    //     //array de endereços
    //     $enderecos = new enderecosActions();
    //     $enderecosArray = $enderecos->selectAllEnderecos();
    //     $_SESSION['enderecosarray']=serialize($enderecosArray);
    //     require 'View/minhas-tarefas.php';

    // }

    // public function goMyLists() {
    //     require 'View/minhas-listas.php';
    // }

    // public function goMyTags() {
    //     $etiquetas = new etiquetasActions();
    //     $etiquetasArray = $etiquetas->selectAllEtiquetas();
    //     $_SESSION['etiquetasarray']=serialize($etiquetasArray);
    //     require 'View/minhas-etiquetas.php';
    // }

    // public function goSharedLists() {
    //     require 'View/listas-compartilhadas.php';
    // }

    // public function gotelalogin() {
    //     require 'View/login.php';
    // }

    // public function goLogin() {
    //     require 'View/login.php';
    // }



    // -------------------------------- CRUDS ------------------------------------------------------------------------------------


    //INSERE PACIENTE
    // public function inserePaciente() {


    //     if(isset($_POST['addpaciente'])) {

    //         $nome = $_POST['nome'];
    //         $prazo = $_POST['prazo'];
    //         $etiquetaID = $_POST['etiquetaID'];
    //         $tarefasActions = new tarefasActions();
    //         $value = $tarefasActions->insertTarefas($nome, $prazo, $etiquetaID);

    //         if($value == true){
    //             $_SESSION["taskinsert"]='true';
    //             header("Location: " . DIRPAGE . "/mytasks");


    //         }
    //         else {
    //             header("Location: " . DIRPAGE . "/mytasks");
    //             echo "<div class='alert alert-danger' role='alert'> Falha ao inserir tarefa, tente novamente. </div>"; 
    //         }
    //     }
    // }

    //INSERE ETIQUETA
    // public function insertEtiqueta() {

    //     if(isset($_POST['addetiqueta'])) {

    //         $nome = $_POST['nome'];
    //         $etiquetasActions = new etiquetasActions();
    //         $value = $etiquetasActions->insertEtiquetas($nome);


    //         if($value == true){ 
    //             $_SESSION["taginsert"]='true';
    //             header("Location: " . DIRPAGE . "/mytags");

    //         }
    //         else {
    //             header("Location: " . DIRPAGE . "/mytags");
    //             echo "<div class='alert alert-danger' role='alert'> Falha ao inserir etiqueta, tente novamente. </div>"; 
    //         }
    //     }
    // }

    //REMOVE TAREFA
    // public function removeTarefa(){


    //     if(isset($_POST['delete'])){

    //         $tarefaID = $_POST['tarefaID'];

    //         $tarefaAct = new tarefasActions();
    //         $tarefaAct->removeTarefas($tarefaID);
    //         header("Location: " . DIRPAGE . "/mytasks");
    //         exit;
    //    }
    //    header("Location: " . DIRPAGE . "/mytasks");
    //    exit;
    // }


    //REMOVE ETIQUETA
    // public function removeEtiqueta(){

    //     if(isset($_POST['delete'])){

    //         $etiquetaID = $_POST['etiquetaID'];


    //         $etiquetaAct = new etiquetasActions();
    //         $etiquetaAct->removeEtiquetas($etiquetaID);
    //         header("Location: " . DIRPAGE . "/mytags");
    //         exit;
    //    }
    //    header("Location: " . DIRPAGE . "/mytags");
    //    exit;
    // }
}