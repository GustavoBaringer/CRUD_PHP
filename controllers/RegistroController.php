<?php

require_once('../models/RegistroModel.php');

class RegistroController
{
    private $registroModel;

    private $nome;
    private $sobrenome;
    private $email;
    private $senha;

    public function __construct()
    {
        $this->registroModel = new RegistroModel();

        $this->setNome($_POST['nome']);
        $this->setSobrenome($_POST['sobrenome'] ?? null);
        $this->setEmail($_POST['email']);
        $this->setSenha($_POST['senha']);
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

    public function registro()
    {
        $usuario = $this->registroModel->registro($this);

        if ($usuario != 0) {
            session_start();

            $_SESSION["logado"] = true;
            $_SESSION["horaLogin"] = (new DateTime)->format('Y-m-d H:i:s');
            $_SESSION["id"] = $usuario;
            $_SESSION["email"] = $this->getEmail();

            header("location: ../views/usuarios.php");
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}

$RegistroController = new RegistroController();
$RegistroController->registro();
