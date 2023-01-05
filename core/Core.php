<?php

namespace core;

use controllers\MainController;

class Core
{
    private static $instance = null;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
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
        $routeParts = explode('/', $route);
        $moduleName = array_shift($routeParts);
        $actionName = array_shift($routeParts);
        if (empty($moduleName))
            $moduleName = "main";
        if (empty($actionName))
            $actionName = "index";
        $controllerName = '\\controllers\\' . ucfirst($moduleName) . 'Controller';
        $controllerActionName = $actionName . 'Action';
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $controllerActionName))
                $controller->$controllerActionName();
            else {
                $mainController = new MainController();
                $mainController->errorAction(404);
            }
        } else {
            $mainController = new MainController();
            $mainController->errorAction(404);
        }


    }

    public function Done()
    {

    }
}