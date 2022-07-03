<?php

require_once(MODEL_PATH . 'Usuario.php');

abstract class Sessao
{

    public static function criarSessao(Usuario $usuario)
    {

        session_start();
        self::limparSessao();

        $_SESSION['usuario'] = $usuario;
    }

    public static function getUsuario(): Usuario
    {
        if (!is_null($_SESSION['usuario'])) return $_SESSION['usuario'];
    }

    public static function limparSessao()
    {
        session_destroy();
    }
}
