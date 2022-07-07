<?php

class Usuario
{

    private ?int $id = null;
    private string $nome;
    private ?string $senha = null;
    private string $email;

    function __construct(string $nome, string $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }


    public function comId(int $id): Usuario
    {
        $this->id = $id;
        return $this;
    }

    public function comSenha(string $senha): Usuario
    {
        $this->senha = $senha;
        return $this;
    }

    public static function getById($id) {
        $sql = "SELECT id, nome, email FROM usuario WHERE id = :id";
        $parametros = [
            'id' => $id
        ];
        
        $resultado = Conexao::selectQuery($sql, $parametros);
        if($resultado->rowCount() > 0){

            $dadosUsuario = $resultado->fetch();
            return new Usuario($dadosUsuario['nome'], $dadosUsuario['email']);

        } else return false;

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

    public static function autenticar(string $email, string $senha): bool {
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $parametros = [
            'email' => $email
        ];

        $resultado = Conexao::selectQuery($sql, $parametros);

        if($resultado->rowCount() > 0){

            $dadosUsuario = $resultado->fetch();

            if(password_verify($senha, $dadosUsuario['senha'])) {
                $usuario = new Usuario($dadosUsuario['nome'], $dadosUsuario['email']);
                $usuario = $usuario->comId($dadosUsuario['id']);
    
                Sessao::criarSessao($usuario);
                return true;

            } else return false;

        } else return false;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
