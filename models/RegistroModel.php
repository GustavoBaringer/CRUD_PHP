<?php

require_once('../src/conf.php');

class RegistroModel
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

    public function registro($controller)
    {
        try {
            $sql = "INSERT INTO public.usuarios(
                    nome,
                    sobrenome,
                    email,
                    senha)
                    VALUES(
                    :nome,
                    :sobrenome,
                    :email,
                    :senha)";

            $fields = array(
                ":nome" => $controller->getNome(),
                ":sobrenome" => $controller->getSobrenome(),
                ":email" => $controller->getEmail(),
                ":senha" => password_hash($controller->getSenha(), PASSWORD_BCRYPT)
            );

            $pdo = $this->conexao->pdo->prepare($sql);

            if ($pdo->execute($fields)) {
                return $this->conexao->pdo->lastInsertId();
            } else {
                return 0;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
