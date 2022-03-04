<?php

require_once('../src/conf.php');

class LoginModel
{
    private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new Conexao();
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function login($email)
    {
        try {
            $sql = "SELECT 
                        us.*
                    FROM 
                        public.usuarios AS us
                    WHERE
                        us.email = :email";

            $fields = array(
                ":email" => $email
            );

            $pdo = $this->conexao->pdo->prepare($sql);
            $pdo->execute($fields);

            $result = $pdo->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
