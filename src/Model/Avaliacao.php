<?php

class Avaliacao
{
    private ?int $id = null;
    private int $nota;
    private string $texto;
    private ?string $criadoEm = null;

    public function __construct(int $nota, string $texto)
    {
        $this->nota = $nota;
        $this->texto = $texto;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function salvarNoBanco(Avaliacao $avaliacao, int $idUsuario, int $idLivro)
    {
        $sql = "INSERT INTO avaliacao (nota, texto, usuario_id, livro_id, criado_em) VALUES (:nota, :texto, :usuario, :livro, now())";
        $parametros = [
            'nota' => $avaliacao->nota,
            'texto' => $avaliacao->texto,
            'usuario' => $idUsuario,
            'livro' => $idLivro
        ];

        return Conexao::insertQuery($sql, $parametros);
    }

    public static function listarPorLivro(int $idLivro)
    {
        $sql = "SELECT * FROM avaliacao WHERE livro_id = :livro";
        $parametros = [
            'livro' => $idLivro
        ];

        $resultado = Conexao::selectQuery($sql, $parametros);
        return $resultado->fetchAll();
    }

    public static function listarPorUsuario(int $idUsuario)
    {
        $sql = "SELECT * FROM avaliacao inne WHERE usuario_id = :usuario";
        $parametros = [
            'usuario' => $idUsuario
        ];

        $resultado = Conexao::selectQuery($sql, $parametros);
        return $resultado->fetchAll();
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function getCriadoEm()
    {
        return $this->criadoEm;
    }

    public function getNota()
    {
        return $this->nota;
    }
}
