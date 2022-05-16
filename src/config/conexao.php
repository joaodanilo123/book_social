<?php

abstract class Conexao {
    private static ?PDO $conexao = null;

    public static function getConexao(): PDO {

        $host = 'localhost';
        $user = 'root';
        $password = '';

        if(self::$conexao == null) {
            self::$conexao = new PDO("mysql:host=$host;dbname=book_social", $user, $password);
        }

        return self::$conexao;
    }

}

