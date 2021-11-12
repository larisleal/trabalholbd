<?php

include('Controller/controller.php');
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

        //rota página inicial
        $this->routes['/'] = array('controller' => 'controller', 'action' => 'dashboard');

        //rotas menu
        $this->routes['/dashboard'] = array('controller' => 'Controller', 'action' => 'dashboard');
        $this->routes['/inserepaciente'] = array('controller' => 'Controller', 'action' => 'inserePaciente');
        $this->routes['/visualizapaciente'] = array('controller' => 'Controller', 'action' => 'visualizaPaciente');
        $this->routes['/inserevenda'] = array('controller' => 'Controller', 'action' => 'insereVenda');
        $this->routes['/visualizavenda'] = array('controller' => 'Controller', 'action' => 'visualizaVenda');
        $this->routes['/inserematerial'] = array('controller' => 'Controller', 'action' => 'insereMaterial');
        $this->routes['/relatorios'] = array('controller' => 'Controller', 'action' => 'relatorios');
        $this->routes['/insereusuario'] = array('controller' => 'Controller', 'action' => 'insereUsuario');

        //funções
        // $this->routes['/inserirpaciente'] = array('controller' => 'Controller', 'action' => 'inserePaciente');
        // $this->routes['/insereetiqueta'] = array('controller' => 'Controller', 'action' => 'insertEtiqueta');
        // $this->routes['/removetarefa'] = array('controller' => 'Controller', 'action' => 'removeTarefa');
        // $this->routes['/removeetiqueta'] = array('controller' => 'Controller', 'action' => 'removeEtiqueta');

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
