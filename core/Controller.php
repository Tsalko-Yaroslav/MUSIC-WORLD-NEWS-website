<?php

namespace core;

class Controller
{
    protected $viewPath;
    protected $moduleName;
    protected $actionName;

    public function __construct()
    {
        $this->moduleName = \core\Core::getInstance()->app['moduleName'];
        $this->actionName = \core\Core::getInstance()->app['actionName'];
        $this->viewPath = "views/{$this->moduleName}/{$this->actionName}.php";


    }

    public function Render($viewPath = null, $parametrs = null)
    {
        if (empty($viewPath))
            $viewPath = $this->viewPath;
        $templete = new Template($viewPath);
        if (!empty($parametrs))
            $templete->setParams($parametrs);
        return $templete->getHTML();
    }
    public function redirect($url)
    {
        header("Location: {$url}");

    }
    public function RenderViews($viewName)
    {
        $path = "views/{$this->moduleName}/{$viewName}.php";
        $templete = new Template($path);
        if (!empty($parametrs))
            $templete->setParams($parametrs);
        return $templete->getHTML();
    }
}