<?php

require_once(MODEL_PATH . 'Usuario.php');

abstract class Sessao
{

    public static function criarSessao(Usuario $usuario)
    {
        $_SESSION['usuario'] = $usuario;  
    }

    public static function getUsuario()
    {
        if(array_key_exists('usuario', $_SESSION)) return $_SESSION['usuario'];
        return null;
    }

    public static function limparSessao()
    {
        session_destroy();
    }

    public static function isLogado(): bool
    {
        return !is_null(self::getUsuario());
    }
}
