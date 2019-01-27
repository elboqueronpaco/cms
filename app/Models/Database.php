<?php

namespace APP\Models;

class Database extends \PDO
{
    private $driver = DATABASE['driver'];
    private $host = DATABASE['host'];
    private $database = DATABASE['database'];
    private $username = DATABASE['username'];
    private $password = DATABASE['password'];
    private $charset = DATABASE['charset'];
    private $pdo;
    private $sQuery;
    private $bConnected = false;
    private $parameters;
    public function __construct()
    {
        $dns = $this->driver . ':dbname=' . $this->database .  ';host=' . $this->host;
        parent::__construct($dns, $this->username, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    private function connection(){
        $dns = $this->driver . ':dbname=' . $this->database . ';host=' . $this->host;
        try {
            $this->pdo = new \PDO($dns, $this->username, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PRETARES, true);
            return $this->pdo;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
    public function CloseConnection()
    {
        $this->pdo = null;
    }
    
    private function Init ($query, $parameters = ""){
        if (!$this->bConnected) {
            $this->Connect();
        }
        try {
            $this->sQuery = $this->pdo->prepare($query);
            $this->bindMore($parameters);
            if (!empty($this->parameters)) {
                foreach ($this->parameters as $key => $param) {
                    $parameters = explode("\x7F", $param);
                    $this->sQuery->bindParam($parameters[0], $parameters[1]);
                }

            }
            $this->success = $this->sQuery->execute();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function bind($para, $value)
    {
        $this->parameters[sizeof($this->parameters)] = ":" . $para . "\x7F" . utf8_encode($value);
    }
    public function bindMore($parray)
    {
        if (empty($this->parameters) && is_array($paray)) {
            $columns = array_keys($paray);
            foreach ($columns as $i => $column) {
                $this->bind($column, $parray[$column]);
            }
        }
    }
    public function column($query, $params = null){
        $this->Init($query, $param);
        $Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);
        $column = null;
        foreach ($Columns as $cells) {
            $column[] = $cells[0];
        }
        return $column;
    }
    public function row($query, $param = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $this->Init($query, $param);
        return $this->sQuery->fetch($fetchmode);
    }
    public function single ($query, $param = null)
    {
        $this->Init($query, $param);
        return $this->sQuery->fetchColumn();
    }

}
