<?php

namespace core;

class Template
{
    protected $path;
    protected $parametrs;

    public function __construct($path)
    {
        $this->path = $path;
        $this->parametrs = [];
    }

    public function setParametr($name, $value)
    {
        $this->parametrs[$name] = $value;
    }

    public function SerParameters($parametrs)
    {
        foreach ($parametrs as $name => $value)
            $this->setParametr($name, $value);
    }

    public function getHTML()
    {
        ob_start();
        extract($this->parametrs);
        include($this->path);
        $htmlbuff = ob_get_contents();
        ob_end_clean();
        return $htmlbuff;
    }
}