<?php

require_once('../models/UsuarioModel.php');

class UsuarioController
{
    private $userModel;

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $id_cargo;
    private $id_departamento;
    private $id_centro_custo;

    public function __construct($data = array())
    {
        $this->userModel = new UsuarioModel();

        $this->setid($data['id'] ?? null);
        $this->setNome($data['nome'] ?? null);
        $this->setSobrenome($data['sobrenome'] ?? null);
        $this->setEmail($data['email'] ?? null);
        $this->setSenha($data['senha'] ?? null);
        $this->setId_cargo($data['id_cargo'] ?? null);
        $this->setId_departamento($data['id_departamento'] ?? null);
        $this->setId_centro_custo($data['id_centro_custo'] ?? null);
    }

    /**
     * GETTER & SETTERS
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
     * Get the value of sobrenome
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Set the value of sobrenome
     *
     * @return  self
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of id_cargo
     */
    public function getId_cargo()
    {
        return $this->id_cargo;
    }

    /**
     * Set the value of id_cargo
     *
     * @return  self
     */
    public function setId_cargo($id_cargo)
    {
        $this->id_cargo = $id_cargo;

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

    public function getUsuarios()
    {
        return $this->userModel->getUsuarios();
    }

    public function atualizaUsuario()
    {
        return $this->userModel->atualizaUsuario($this);
    }

    public function excluirUsuario()
    {
        return $this->userModel->excluirUsuario($this);
    }

    public function adicionarUsuario()
    {
        return $this->userModel->adicionarUsuario($this);
    }
}
