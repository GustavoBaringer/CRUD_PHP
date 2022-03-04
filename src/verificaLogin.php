<?php
session_start();

/**
 * Parte do código responsável pelo controle do tempo de sessão
 * 
 * Expira em 60min
 */
$horaAtual = new DateTime;


if (!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true) {
    header("location: ../login.php");
    die;
} elseif ($_SESSION["horaLogin"]) {

    $horaLogin = DateTime::createFromFormat('Y-m-d H:i:s', $_SESSION["horaLogin"]);

    $intervalo = $horaLogin->diff($horaAtual);
    $horas = $intervalo->format('%h');
    $minutos = $intervalo->format('%i');

    $diferencaMinutos = $horas * 60 + $minutos;

    if ($diferencaMinutos >= 60) {
        $_SESSION = array();
        session_destroy();
        header("location: ../login.php");
        die;
    }
}
