<?php

namespace core;

class DB
{
    protected $pdo;
    public function __construct($hostname,$login,$password,$database)
    {
        $this->pdo = new \PDO("mysql: host={$hostname}; dbname={$database} ",$login, $password);

    }
    public function select()
    {

    }


}