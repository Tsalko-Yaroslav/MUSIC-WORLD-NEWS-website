<?php

namespace core;

use controllers\MainController;

class Core
{
    private static $instance = null;
    public $app;
    public $pageParams;
    public $db;
    public $requestMethod;

    private function __construct()
    {
        global $pageParams;
        $this->app = [];
        $this->pageParams = $pageParams;
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
        session_start();
        $this->db = new DB(DATABASE_HOST, DATABASE_LOGIN,
            DATABASE_PASSWORD, DATABASE_BASENAME);
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function Run()
    {
        $route = $_GET['route'];
        $routeParts = explode('/', $route);
        $moduleName = strtolower(array_shift($routeParts));
        $actionName = strtolower(array_shift($routeParts));
        if (empty($moduleName))
            $moduleName = "main";
        if (empty($actionName))
            $actionName = "index";
        $this->app['moduleName'] = $moduleName;
        $this->app['actionName'] = $actionName;

        $controllerName = '\\controllers\\' . ucfirst($moduleName) . 'Controller';
        $controllerActionName = $actionName . 'Action';
        $statusCode = 200;
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $controllerActionName)) {

                $this->app['actRes'] = $controller->$controllerActionName();

            } else {
                $statusCode = 404;

            }
        } else {
            $statusCode = 404;
        }
        $statusCodeType = intval($statusCode / 100);
        if ($statusCode == 4 || $statusCodeType == 5) {
            $mainConroller = new MainController();
            $mainConroller->errorAction($statusCode);
        }


    }

    public function Done()
    {
        $pathToLayout = 'themes/main/layout.php';
        $template = new Template($pathToLayout);
        $template->setParametr('content', $this->app['actRes']);
        $template->SerParameters($this->pageParams);
        $html = $template->getHTML();
        echo $html;
    }
}