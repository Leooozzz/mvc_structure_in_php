<?php

namespace App\Core;



class Database

{
    private $connection = null;

    private static $instance = \null;

    private function __construct()
    {
        $this->connect();
    }

    public static  function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect()
    {
        $database_config = \config('database');

        $dsn = "mysql:host={$database_config['host']};dbname={$database_config['dbname']};charset={$database_config['charset']}";

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        try {
            $this->connection = new \PDO($dsn, $database_config['username'], $database_config['password'], $options);
            return;
        } catch (\PDOException $e) {
            throw new \Exception('Erro de conexão database' . $e->getMessage());
        }
        return  \false;
    }



    public function fetch($sql, $params = []): array
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }
    public function fetchAll($sql, $params = []): array
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
    public function execute($sql, $params = []): int
    {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
    public function lastInsetId()
    {
        return $this->lastInsetId();
    }
    public function rowCount($sql, $params = []): int
    {
        return $this->connection->rowCount();
    }

    public function query($sql, $params = [])
    {
        if (!$this->connection) {
            $this->connect();
        }
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao consultar banco de dados' . $e->getMessage());
        }
    }
}
