<?php

namespace src\utils;

use PDO;

class Db
{
    /** @var PDO */
    protected $connection;

    public function connect()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=work5', 'root', '');
    }

    public function select($sql, $params = [])
    {
        if (!$this->connection) {
            $this->connect();
        }

        $stmt = $this->connection->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }
        $res = $stmt->execute();
        if (!$res) {
            return null;
        }

        return $stmt->fetchAll();
    }

    public function update($sql, $params = [])
    {
        if (!$this->connection) {
            $this->connect();
        }

        $stmt = $this->connection->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }
        $stmt->execute();

    }

    public function insert($table, $insertData)
    {
        if (!$this->connection) {
            $this->connect();
        }
        $columnNames =  array_keys($insertData);
        $columnNamesString = implode("`,`" ,$columnNames);
        foreach ($columnNames as $key => $val) {
            $columnNames[$key] = ":" . $val;
        }
        $bindParamsString = implode(',',$columnNames);

        $sql = "INSERT INTO $table (`$columnNamesString`) VALUES ($bindParamsString)";
        $stmt = $this->connection->prepare($sql);
        foreach ($insertData as $key => $value) {
            $stmt->bindValue(':'.$key,$value);
        }
        return $stmt->execute();
    }
}