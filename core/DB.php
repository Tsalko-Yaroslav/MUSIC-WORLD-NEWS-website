<?php

namespace core;

/** database query execution class */
class DB
{
    protected $pdo;

    public function __construct($hostname, $login, $password, $database)
    {
        $this->pdo = new \PDO("mysql: host={$hostname};dbname={$database}", $login, $password);

    }

    public function select(string $tableName, $fieldsList = "*",
                                  $conditionArray = null) {
        if (is_string($fieldsList))
            $fieldsListString = $fieldsList;
        if (is_array($fieldsList))
            $fieldsListString = implode(', ', $fieldsList);
        $wherePart = "";
        if (is_array($conditionArray)) {
            $parts = [];
            foreach ($conditionArray as $key => $value) {
                $parts [] = "{$key} = :{$key}";
            }
            $wherePartString = "WHERE ".implode(' AND ', $parts);
        }
        $res = $this->pdo->prepare(
            "SELECT {$fieldsListString} FROM {$tableName} {$wherePartString}");
        $res->execute($conditionArray);
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