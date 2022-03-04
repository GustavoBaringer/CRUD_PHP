<?php

require_once('../models/CargoModel.php');

class CargoController
{
    private $cargoModel;
    private $id;
    private $nome;
    private $id_departamento;

    public function __construct($data = array())
    {
        try {
            $this->cargoModel = new CargoModel();

            $this->setId($data['id'] ?? null);
            $this->setNome($data['nome'] ?? null);
            $this->setId_departamento($data['id_departamento'] ?? null);
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
     * Get the value of id_departamento
     */
    public function getId_departamento()
    {
        return $this->id_departamento;
    }

    /**
     * Set the value of id_departamento
     *
     * @return  self
     */
    public function setId_departamento($id_departamento)
    {
        $this->id_departamento = $id_departamento;

        return $this;
    }

    /**
     * METHODS
     */

    public function getCargos()
    {
        try {
            return $this->cargoModel->getCargos();
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function atualizarCargo()
    {
        try {
            return $this->cargoModel->atualizarCargo($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function excluirCargo()
    {
        try {
            return $this->cargoModel->excluirCargo($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }

    public function adicionarCargo()
    {
        try {
            return $this->cargoModel->adicionarCargo($this);
        } catch (\Exception $e) {
            throw new Exception();
        }
    }
}
