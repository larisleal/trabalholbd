<?php

include('Controller/loginController.php');
include('Controller/controller.php');
include('Controller/cadastroController.php');
include('config/config.php');

$route = new Route();

class Route{


    private $routes;
    
    public function __construct(){

        $this->initRoutes();
        $this->run($this->getURL());
    }

    public function initRoutes()
    {

        // login
        $this->routes['/'] = array('controller' => 'loginController', 'action' => 'goLogin');
        $this->routes['/logar'] = array('controller' => 'loginController', 'action' => 'tryLogin');
        $this->routes['/logout'] = array('controller' => 'loginController', 'action' => 'goLogout');
        $this->routes['/cadastro'] = array('controller' => 'Controller', 'action' => 'goCadastrar');

        //cadastro
        $this->routes['/cadastrar'] = array('controller' => 'cadastroController', 'action' => 'cadastrar');

        //rotas menu
        $this->routes['/dashboard'] = array('controller' => 'Controller', 'action' => 'goDashboard');
        $this->routes['/mytasks'] = array('controller' => 'Controller', 'action' => 'goMyTasks');
        $this->routes['/mylists'] = array('controller' => 'Controller', 'action' => 'goMyLists');
        $this->routes['/mytags'] = array('controller' => 'Controller', 'action' => 'goMyTags');
        $this->routes['/sharedlists'] = array('controller' => 'Controller', 'action' => 'goSharedLists');
        $this->routes['/sair'] = array('controller' => 'Controller', 'action' => 'gotelalogin');

        //funções
        $this->routes['/inseretarefa'] = array('controller' => 'Controller', 'action' => 'insertTarefa');
        $this->routes['/insereetiqueta'] = array('controller' => 'Controller', 'action' => 'insertEtiqueta');
        $this->routes['/removetarefa'] = array('controller' => 'Controller', 'action' => 'removeTarefa');
        $this->routes['/removeetiqueta'] = array('controller' => 'Controller', 'action' => 'removeEtiqueta');

    }

    public function getURL() {
        // parse_url para site
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        //parse_url para localhost
        $url = substr($url, 16, 1000); 
        return $url;
        
    }

    public function run($url) {
        if(array_key_exists($url, $this->routes))
        {
            $class ="\\Controller\\" . $this->routes[$url]['controller'];
            $controller = new $class();
            $action = $this->routes[$url]['action'];
            $controller->$action();
        }
        
    }
    
}
