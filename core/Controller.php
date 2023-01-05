<?php

namespace core;

class Controller
{
    protected $viewPath;

    public function __construct()
    {
        $moduleName = \core\Core::getInstance()->app['moduleName'];
        $actionName = \core\Core::getInstance()->app['actionName'];
        $this->viewPath = "views/{$moduleName}/{$actionName}.php";


    }

    public function Render($viewPath = null, $parametrs = null)
    {
        if (empty($viewPath))
            $viewPath = $this->viewPath;
        $templete = new Template($viewPath);
        if (!empty($parametrs))
            $templete->SerParameters($parametrs);
        return $templete->getHTML();
    }
}