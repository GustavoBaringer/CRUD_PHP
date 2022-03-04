<?php

require_once('../src/conf.php');

class CentroCustosModel
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

    public function getCentroCustos()
    {
        try {
            $sql = "SELECT
                    cc.id,
                    cc.nome,
                    COUNT(dp.id) as total_departamentos,
                    COUNT(cs.id) as total_cargos,
                    COUNT(us.id) as total_usuarios
                    FROM
                        public.centro_custos cc
                    LEFT JOIN
                        public.departamentos dp ON cc.id = dp.id_centro_custo
                    LEFT JOIN
                        public.cargos cs ON dp.id = cs.id_departamento
                    LEFT JOIN
                        public.usuarios us ON cs.id = us.id_cargo
                    GROUP BY cc.id
                    ORDER BY cc.id";

            $pdo = $this->conexao->pdo->prepare($sql);
            $pdo->execute();

            $result = $pdo->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function atualizarCentroCusto($controller)
    {
        try {
            $sql = "UPDATE public.centro_custos SET
                    nome = :nome
                    WHERE id = :id";

            $pdo = $this->conexao->pdo->prepare($sql);

            $fields = array(
                ':id' => $controller->getId(),
                ':nome' => $controller->getNome(),
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

    public function excluirCentroCusto($controller)
    {
        try {
            $sql = "DELETE FROM public.centro_custos
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

    public function adicionarCentroCusto($controller)
    {
        try {
            $sql = "INSERT INTO public.centro_custos
                    (nome)
                    VALUES
                    (:nome)";

            $fields = array(
                ':nome' => $controller->getNome(),
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
