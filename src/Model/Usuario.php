<?php

require_once(MODEL_PATH . 'Categoria.php');
require_once(MODEL_PATH . 'Autor.php');
require_once(LIB_PATH . 'conexao.php');


class Usuario
{

    private ?int $id;
    private string $nome;
    private string $senha;
    private string $email;

    function __construct($nome, $senha, $email, $id = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
    }

    public static function getById($id) {

    }

    public static function salvarNoBanco(Usuario $usuario) {
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
        $parametros = [
            'nome' => $usuario->nome, 
            'email' => $usuario->email, 
            'senha' => password_hash($usuario->senha, PASSWORD_BCRYPT)
        ];
        
        return Conexao::insertQuery($sql, $parametros);
    }
}
