<?php

require_once('../src/conf.php');

class DepartamentoModel
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

    public function getDepartamentos()
    {
        try {
            $sql = "SELECT 
                    dp.id,
                    dp.nome,
                    cc.id as id_centro_custo,
                    cc.nome as centro_custo,
                    COUNT(us.id) as total_usuarios
                    FROM 
                        public.departamentos dp
                    LEFT JOIN
                        public.centro_custos cc ON dp.id_centro_custo = cc.id
                    LEFT JOIN
                        public.usuarios us ON dp.id = us.id_departamento
                    GROUP BY dp.id, cc.id, cc.nome
                    ORDER BY dp.id";

            $pdo = $this->conexao->pdo->prepare($sql);
            $pdo->execute();

            $result = $pdo->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function atualizarDepartamento($controller)
    {
        try {
            $sql = "UPDATE public.departamentos SET
                    nome = :nome,
                    id_centro_custo = :id_centro_custo
                    WHERE id = :id";

            $pdo = $this->conexao->pdo->prepare($sql);

            $fields = array(
                ':id' => $controller->getId(),
                ':nome' => $controller->getNome(),
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

    public function excluirDepartamento($controller)
    {
        try {
            $sql = "DELETE FROM public.departamentos
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

    public function adicionarDepartamento($controller)
    {
        try {
            $sql = "INSERT INTO public.departamentos
                    (nome,
                    id_centro_custo)
                    VALUES
                    (:nome,
                    :id_centro_custo)";

            $fields = array(
                ':nome' => $controller->getNome(),
                ':id_centro_custo' => $controller->getId_centro_custo(),
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
