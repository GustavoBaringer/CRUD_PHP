<?php

require_once('../models/LoginModel.php');

class LoginController
{
    private $loginModel;

    private $email;
    private $senha;

    public function __construct()
    {
        $this->loginModel = new LoginModel();

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

    public function login()
    {
        $usuario = $this->loginModel->login($this->getEmail());

        $usuario['senha'] = trim($usuario['senha']);

        if (isset($usuario) && !empty($usuario)) {

            if (password_verify($this->getSenha(), $usuario['senha'])) {
                session_start();

                $_SESSION["logado"] = true;
                $_SESSION["horaLogin"] = (new DateTime)->format('Y-m-d H:i:s');
                $_SESSION["id"] = $usuario['id'];
                $_SESSION["email"] = $usuario['email'];

                header("location: ../views/usuarios.php");
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                (403);
            }
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}

$loginController = new LoginController();
$loginController->login();
