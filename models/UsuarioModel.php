<?php

require_once('../src/conf.php');

class UsuarioModel
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

    public function getUsuarios()
    {
        try {
            $sql = "SELECT 
                        us.id,
                        us.nome,
                        us.sobrenome,
                        us.email,
                        cs.id as id_cargo,
                        cs.nome as cargo,
                        ds.id as id_departamento,
                        ds.nome as departamento,
                        cc.id as id_centro_custo,
                        cc.nome as centro_custo
                    FROM 
                        public.usuarios AS us
                    LEFT JOIN
                        public.cargos AS cs ON us.id_cargo = cs.id
                    LEFT JOIN
                        public.departamentos AS ds ON us.id_departamento = ds.id
                    LEFT JOIN
                        public.centro_custos AS cc ON us.id_centro_custo = cc.id
                    ORDER BY us.id";

            $pdo = $this->conexao->pdo->prepare($sql);
            $pdo->execute();

            $result = $pdo->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function atualizaUsuario($controller)
    {
        try {
            $sql = "UPDATE public.usuarios SET
                    nome = :nome,
                    sobrenome = :sobrenome,
                    senha = :senha,
                    id_cargo = :id_cargo,
                    id_departamento = :id_departamento,
                    id_centro_custo = :id_centro_custo
                    WHERE id = :id";

            $pdo = $this->conexao->pdo->prepare($sql);

            $fields = array(
                ':id' => $controller->getId(),
                ':nome' => $controller->getNome(),
                ':sobrenome' => $controller->getSobrenome(),
                ':senha' => password_hash($controller->getSenha(), PASSWORD_BCRYPT),
                ':id_cargo' => $controller->getId_cargo(),
                ':id_departamento' => $controller->getId_departamento(),
                ':id_centro_custo' => $controller->getId_centro_custo(),
            );

            if ($pdo->execute($fields)) {
                return http_response_code(200);
            } else {
                return http_response_code(500);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function excluirUsuario($controller)
    {
        try {
            $sql = "DELETE FROM public.usuarios
                    WHERE id = :id";

            $pdo = $this->conexao->pdo->prepare($sql);

            if ($pdo->execute(array(":id" => $controller->getId()))) {
                return http_response_code(200);
            } else {
                return http_response_code(500);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function adicionarUsuario($controller)
    {
        try {
            $sql = "INSERT INTO public.usuarios
                    (nome,
                    sobrenome,
                    senha,
                    id_cargo,
                    id_departamento,
                    id_centro_custo,
                    email)
                    VALUES
                    (:nome,
                    :sobrenome,
                    :senha,
                    :id_cargo,
                    :id_departamento,
                    :id_centro_custo,
                    :email)";

            $fields = array(
                ':nome' => $controller->getNome(),
                ':sobrenome' => $controller->getSobrenome(),
                ':senha' => password_hash($controller->getSenha(), PASSWORD_BCRYPT),
                ':id_cargo' => $controller->getId_cargo(),
                ':id_departamento' => $controller->getId_departamento(),
                ':id_centro_custo' => $controller->getId_centro_custo(),
                ':email' => $controller->getEmail(),
            );

            $pdo = $this->conexao->pdo->prepare($sql);

            if ($pdo->execute($fields)) {
                return http_response_code(200);
            } else {
                return http_response_code(500);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
