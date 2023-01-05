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

}