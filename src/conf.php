<?php

class Conexao
{
    private $host = '127.0.0.1';
    private $port = '5432';
    private $dbname = 'postgres';
    private $user = 'postgres';
    private $password = 'root';

    public $pdo;

    public function __construct()
    {
        try {
            $pdo = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->user, $this->password);

            if (!$pdo) {
                throw new PDOException;
            } else {
                $this->pdo = $pdo;
            }
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }
}
