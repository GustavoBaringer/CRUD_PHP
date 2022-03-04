<?php

require_once('../src/conf.php');

class CargoModel
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

    public function getCargos()
    {
        try {
            $sql = "SELECT 
                    cs.id,
                    cs.nome,
                    dp.id as id_departamento,
                    dp.nome as departamento,
                    COUNT(us.id) as total_usuarios
                    FROM 
                        public.cargos cs
                    LEFT JOIN
                        public.departamentos dp ON cs.id_departamento = dp.id
                    LEFT JOIN
                        public.usuarios us ON cs.id = us.id_cargo
                    GROUP BY cs.id, dp.nome, dp.id
                    ORDER BY cs.id";

            $pdo = $this->conexao->pdo->prepare($sql);
            $pdo->execute();

            $result = $pdo->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function atualizarCargo($controller)
    {
        try {
            $sql = "UPDATE public.cargos SET
                    nome = :nome,
                    id_departamento = :id_departamento
                    WHERE id = :id";

            $pdo = $this->conexao->pdo->prepare($sql);

            $fields = array(
                ':id' => $controller->getId(),
                ':nome' => $controller->getNome(),
                ':id_departamento' => $controller->getId_departamento(),
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

    public function excluirCargo($controller)
    {
        try {
            $sql = "DELETE FROM public.cargos
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

    public function adicionarCargo($controller)
    {
        try {
            $sql = "INSERT INTO public.cargos
                    (nome,
                    id_departamento)
                    VALUES
                    (:nome,
                    :id_departamento)";

            $fields = array(
                ':nome' => $controller->getNome(),
                ':id_departamento' => $controller->getId_departamento(),
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
