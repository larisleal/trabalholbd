<?php 
namespace Controller;
include_once('Model/validateLogin.php');
include_once('Model/tarefasActions.php');
include_once('Model/etiquetasActions.php');
use Model\validateLogin;
use Model\tarefasActions;
use Model\etiquetasActions;

class Controller    {
    
public function init() {
    
    if (isset($_GET['page'])) {
        $f = $_GET['page'];
    }
    else 
        $f = "";
    
    
    //ROTAS

    switch ($f) {

        case "index":
            $this->index();
            break;

        case "dashboard":
            $this->goDashboard();
            break;

        case "logar":
            $this->tryLogin();
            break;
        
        case "cadastro":
            $this->goCadastrar();
            break;

        case "tarefas":
            $this->goMyTasks();
            break;
        
        case "listas":
            $this->goMyLists();
            break;
        
        case "etiquetas":
            $this->goMyTags();
            break;
        
        case "listascompartilhadas":
            $this->goSharedLists();
            break;

        case "sair":
            $this->gotelalogin();
        break;

        default:
            $this->goLogin();
        break;

    }

  }
    public function index() {
        require 'View/index.php';
    }
  
    public function goDashboard() {
        require 'View/dashboard.php';
    }

  
    public function tryLogin(){
      
       if(isset($_POST['enviar']))
      {      
          $username = $_POST['username'];
          $pass = $_POST['pass'];
          $validateLogin = new validateLogin();
          $value = $validateLogin->loginUser($username, $pass);
          
          
          if($value!=null){
              session_start();
              $_SESSION['username']=$username;
              $_SESSION['password']=$pass;
              header("Location: ?page=dashboard");
              
          }
          else {
              $_SESSION["pass"]='wrong';
              include("View/login.php");
              }
      }
      else {
          $_SESSION["pass"]='wrong';
          include("View/login.php");
      }

    }

    //REQUIRE DE PÁGINAS DE ACORDO COM AS ROTAS

    public function goCadastrar() {
        require 'View/cadastro.php';
    }

    public function goMyTasks() {
        //array de etiquetas
        $etiquetas = new etiquetasActions();
        $etiquetasArray = $etiquetas->selectAllEtiquetas();
        $_SESSION['etiquetasarray']=serialize($etiquetasArray);

        //array de tarefas
        $tarefas = new tarefasActions();
        $tarefasArray = $tarefas->selectAllTarefas();
        $_SESSION['tarefasarray']=serialize($tarefasArray);
        require 'View/minhas-tarefas.php';

    }

    public function goMyLists() {
        require 'View/minhas-listas.php';
    }

    public function goMyTags() {
        $etiquetas = new etiquetasActions();
        $etiquetasArray = $etiquetas->selectAllEtiquetas();
        $_SESSION['etiquetasarray']=serialize($etiquetasArray);
        require 'View/minhas-etiquetas.php';
    }

    public function goSharedLists() {
        require 'View/listas-compartilhadas.php';
    }
    
    public function gotelalogin() {
        require 'View/login.php';
    }

    public function goLogin() {
        require 'View/login.php';
    }
  


    // -------------------------------- CRUDS ------------------------------------------------------------------------------------
    

    //INSERE TAREFA
    public function insertTarefa() {

 
        if(isset($_POST['addtarefa'])) {

            $nome = $_POST['nome'];
            $prazo = $_POST['prazo'];
            $etiquetaID = $_POST['etiquetaID'];
            $tarefasActions = new tarefasActions();
            $value = $tarefasActions->insertTarefas($nome, $prazo, $etiquetaID);

            if($value == true){
                $_SESSION["taskinsert"]='true';
                header("Location: " . DIRPAGE . "/mytasks");
               
               
            }
            else {
                header("Location: " . DIRPAGE . "/mytasks");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir tarefa, tente novamente. </div>"; 
            }
        }
    }

    //INSERE ETIQUETA
    public function insertEtiqueta() {

        if(isset($_POST['addetiqueta'])) {

            $nome = $_POST['nome'];
            $etiquetasActions = new etiquetasActions();
            $value = $etiquetasActions->insertEtiquetas($nome);


            if($value == true){ 
                $_SESSION["taginsert"]='true';
                header("Location: " . DIRPAGE . "/mytags");
                
            }
            else {
                header("Location: " . DIRPAGE . "/mytags");
                echo "<div class='alert alert-danger' role='alert'> Falha ao inserir etiqueta, tente novamente. </div>"; 
            }
        }
    }

    //REMOVE TAREFA
    public function removeTarefa(){
        

        if(isset($_POST['delete'])){

            $tarefaID = $_POST['tarefaID'];

            $tarefaAct = new tarefasActions();
            $tarefaAct->removeTarefas($tarefaID);
            header("Location: " . DIRPAGE . "/mytasks");
            exit;
       }
       header("Location: " . DIRPAGE . "/mytasks");
       exit;
    }

    
    //REMOVE ETIQUETA
    public function removeEtiqueta(){

        if(isset($_POST['delete'])){

            $etiquetaID = $_POST['etiquetaID'];

    
            $etiquetaAct = new etiquetasActions();
            $etiquetaAct->removeEtiquetas($etiquetaID);
            header("Location: " . DIRPAGE . "/mytags");
            exit;
       }
       header("Location: " . DIRPAGE . "/mytags");
       exit;
    }
}
