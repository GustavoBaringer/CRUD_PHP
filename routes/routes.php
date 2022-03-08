<?php

$request = $_POST['action'];

require_once('../controllers/UsuarioController.php');
require_once('../controllers/CargoController.php');
require_once('../controllers/DepartamentoController.php');
require_once('../controllers/CentroCustosController.php');

$UsuarioController = new UsuarioController($_POST);
$CargoController = new CargoController($_POST);
$DepartamentoController = new DepartamentoController($_POST);
$CentroCustosController = new CentroCustosController($_POST);

switch ($request) {

        /**
     * USUARIOS
     */
    case 'atualizaUsuario':
        return $UsuarioController->atualizaUsuario();
        break;
    case 'excluirUsuario':
        return $UsuarioController->excluirUsuario();
        break;
    case 'adicionarUsuario':
        return $UsuarioController->adicionarUsuario();
        break;
    case 'importarUsuarios':
        return $UsuarioController->importarUsuarios();
        break;

        /**
         * DEPARTAMENTOS
         */
    case 'atualizarDepartamento':
        return $DepartamentoController->atualizarDepartamento();
        break;
    case 'excluirDepartamento':
        return $DepartamentoController->excluirDepartamento();
        break;
    case 'adicionarDepartamento':
        return $DepartamentoController->adicionarDepartamento();
        break;

        /**
         * CARGOS
         */
    case 'atualizarCargo':
        return $CargoController->atualizarCargo();
        break;
    case 'excluirCargo':
        return $CargoController->excluirCargo();
        break;
    case 'adicionarCargo':
        return $CargoController->adicionarCargo();
        break;

        /**
         * CENTRO DE CUSTOS
         */
    case 'atualizarCentroCusto':
        return $CentroCustosController->atualizarCentroCusto();
        break;
    case 'excluirCentroCusto':
        return $CentroCustosController->excluirCentroCusto();
        break;
    case 'adicionarCentroCusto':
        return $CentroCustosController->adicionarCentroCusto();
        break;


    default:
        return http_response_code(404);
        break;
}
