<?php

require_once('../models/CentroCustosModel.php');

class CentroCustosController
{
    private $centroCustosModel;
    private $id;
    private $nome;

    public function __construct($data = array())
    {
        try {
            $this->centroCustosModel = new CentroCustosModel();

            $this->setId($data['id'] ?? null);
            $this->setNome($data['nome'] ?? null);
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
     * METHODS
     */

    public function getCentroCustos()
    {
        try {
            return $this->centroCustosModel->getCentroCustos();
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function atualizarCentroCusto()
    {
        try {
            return $this->centroCustosModel->atualizarCentroCusto($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function excluirCentroCusto()
    {
        try {
            return $this->centroCustosModel->excluirCentroCusto($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function adicionarCentroCusto()
    {
        try {
            return $this->centroCustosModel->adicionarCentroCusto($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }
}
