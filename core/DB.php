<?php

namespace core;

class DB
{
    protected $pdo;

    public function __construct($hostname, $login, $password, $database)
    {
        $this->pdo = new \PDO("mysql: host={$hostname};dbname={$database}", $login, $password);

    }

    public function select($tableName, $fildsList = "*", $conditionArr = null)
    {
        if (is_string($fildsList)) {
            $fieldsListString = $fildsList;
        }
        if (is_array($fildsList)) {
            $fieldsListString = implode(', ', $fildsList);
        }

        if (is_array($conditionArr)) {
            $parts = [];
            foreach ($conditionArr as $key => $value) {
                $parts[] = "{$key} = :{$key}";
            }
            $wherePart = "WHERE" . implode(' AND ', $parts);
        }
        $res = $this->pdo->prepare("SELECT {$fieldsListString} FROM {$tableName} {$wherePart}");
        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function Update($tableName, $newValuesArray, $conditionArray)
    {
        $setParts = [];
        $paramsArr = [];
        foreach ($newValuesArray as $key => $value) {


            $setParts [] = "{$key} = :set{$key}";
            $paramsArr['set' . $key] = $value;
        }
        $setPartString = implode(', ', $setParts);

        $whereParts = [];
        foreach ($conditionArray as $key => $value) {
            $whereParts[] = "{$key} = :{$key}";
            $paramsArr[$key] = $value;
        }
        $wherePartString = "WHERE" . implode(' AND ', $whereParts);
        $res = $this->pdo->prepare("UPDATE {$tableName} SET {$setPartString}
         {$wherePartString}");
        return $res->execute($paramsArr);

    }

    public function insert($tableName, $newRowArr)
    {
        
        $fieldsArray = array_keys($newRowArr);
        $fildsListString = implode(', ', $fieldsArray);
        $paramsArr = [];
        foreach ($newRowArr as $key => $value) {
            $paramsArr [] = ':' . $key;
        }
        $valuesListString = implode(', ', $paramsArr);

        $res = $this->pdo->prepare("INSERT INTO {$tableName} ($fildsListString) VALUES($valuesListString)");
        $res->execute($newRowArr);
    }

    public function delete($tableName, $conditionArr)
    {
        $whereParts = [];
        foreach ($conditionArr as $key => $value) {
            $whereParts[] = "{$key} = :{$key}";
            $paramsArr[$key] = $value;
        }
        $wherePartString = "WHERE" . implode(' AND ', $whereParts);
        $res = $this->pdo->prepare("DELETE FROM {$tableName} {$wherePartString})");
        $res->execute($conditionArr);
    }
}