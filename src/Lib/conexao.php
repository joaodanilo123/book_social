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

    public static function selectQuery($sql, $params = array()): PDOStatement {
        
        $conexao = self::getConexao();
        
        $sql = $conexao->prepare($sql);
        $sql->execute($params);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql;
    }

    public static function insertQuery($sql, $params = array()): bool {
        $conexao = self::getConexao();
        
        $sql = $conexao->prepare($sql);
        return ($sql->execute($params));
        
    }

}

