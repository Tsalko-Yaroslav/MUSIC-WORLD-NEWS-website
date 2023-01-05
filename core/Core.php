<?php

namespace core;

class Core
{
    private static $instance= null;
    private function __construct()
    {

    }
    public static function getInstance()
    {
        if(empty(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function Initialize()
    {

    }
    public function Run()
    {
        $route = $_GET['route'];
        $routeParts = explode('/',$route);
        $moduleName = array_shift($routeParts);
        $actionName = array_shift($routeParts);
        $controllerName = '\\controllers\\'. ucfirst($moduleName).'Controller';
        $controllerActionName = $actionName.'Action';
        $controller = new $controllerName();
        $controller->$controllerActionName();
    }
    public function Done()
    {

    }
}