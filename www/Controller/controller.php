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


class Controller    {
    
public function init() {
    
    if (isset($_GET['page'])) {
        $f = $_GET['page'];
    }
    else 
        $f = "";
    
    
    //ROTAS

  }
    public function index() {
        require 'View/index.php';
    }
  
    public function dashboard() {
        require 'View/dashboard.php';
    }

  
    //REQUIRE DE PÁGINAS DE ACORDO COM AS ROTAS

    //Pacientes
    public function inserePaciente() {
        require 'View/inserir_paciente.php';
    }

    public function visualizaPaciente() {

    //     //array de pacientes
    //     $pacientes = new pacientesActions();
    //     $pacientesArray = $pacientes->selectAllPacientes();
    //     $_SESSION['pacientesarray']=serialize($pacientesArray);

    //     //array de endereços
    //     $enderecos = new enderecosActions();
    //     $enderecosArray = $enderecos->selectAllEnderecos();
    //     $_SESSION['enderecosarray']=serialize($enderecosArray);

        require 'View/pacientes.php';
    }

    //Caixa
    public function insereVenda() {
        require 'View/inserir_venda.php';
    }

    public function visualizaVenda() {
        require 'View/vendas.php';
    }

    public function insereMaterial() {
        require 'View/compra_materiais.php';
    }

    //Painel Admin
    public function relatorios() {
        require 'View/relatorios.php';
    }

    public function insereUsuario() {
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
