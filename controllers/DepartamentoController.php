<?php

require_once('../models/DepartamentoModel.php');

class DepartamentoController
{
    private $departamentoModel;
    private $id;
    private $nome;
    private $id_centro_custo;

    public function __construct($data = array())
    {
        try {
            $this->departamentoModel = new DepartamentoModel();

            $this->setId($data['id'] ?? null);
            $this->setNome($data['nome'] ?? null);
            $this->setId_centro_custo($data['id_centro_custo'] ?? null);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    /**
     * GETTER & SETTER
     */

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id_centro_custo
     */
    public function getId_centro_custo()
    {
        return $this->id_centro_custo;
    }

    /**
     * Set the value of id_centro_custo
     *
     * @return  self
     */
    public function setId_centro_custo($id_centro_custo)
    {
        $this->id_centro_custo = $id_centro_custo;

        return $this;
    }

    /**
     * METHODS
     */

    public function getDepartamentos()
    {
        try {
            return $this->departamentoModel->getDepartamentos();
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function atualizarDepartamento()
    {
        try {
            return $this->departamentoModel->atualizarDepartamento($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function excluirDepartamento()
    {
        try {
            return $this->departamentoModel->excluirDepartamento($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function adicionarDepartamento()
    {
        try {
            return $this->departamentoModel->adicionarDepartamento($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }
}
