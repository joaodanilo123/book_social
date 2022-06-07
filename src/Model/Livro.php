<?php

require_once(MODEL_PATH . 'Categoria.php');
require_once(MODEL_PATH . 'Autor.php');
require_once(LIB_PATH . 'conexao.php');


class Livro
{

    private int $id;
    private string $titulo;
    private string $ano;
    private string $editora;
    private string $sinopse;
    private $categorias = [];
    private $autores = [];

    function __construct(int $id, string $titulo, string $ano, string $editora, string $sinopse)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->ano = $ano;
        $this->editora = $editora;
        $this->sinopse = $sinopse;
    }

    public static function getLivroById($id): Livro
    {

        $sql = 'SELECT * FROM livro WHERE id = :id';
        $livro = Conexao::selectQuery($sql, ['id' => $id])->fetch();

        $sql = 'SELECT autor.* FROM livro 
                INNER JOIN autor_livro ON autor_livro.livro_id=livro.id 
                INNER JOIN autor ON autor_livro.autor_id=autor.id 
                WHERE livro.id=:id';
        $autores = Conexao::selectQuery($sql, ['id' => $id])->fetchAll();


        $sql = 'SELECT categoria.* FROM livro 
                INNER JOIN livro_categoria ON livro_categoria.livro_id=livro.id 
                INNER JOIN categoria ON livro_categoria.categoria_id=categoria.id
                WHERE livro.id=:id';

        $categorias = Conexao::selectQuery($sql, ['id' => $id])->fetchAll();
        $livro = new Livro($livro['id'], $livro['titulo'], $livro['ano'], $livro['editora'], $livro['sinopse']);

        foreach ($autores as $autor) {
            $autor = new Autor($autor['id'], $autor['nome']);
            $livro->addAutor($autor);
        }

        foreach ($categorias as $categoria) {
            $categoria = new Categoria($categoria['id'], $categoria['nome']);
            $livro->addCategoria($categoria);
        }

        return $livro;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAno(): string
    {
        return $this->ano;
    }

    public function getEditora(): string
    {
        return $this->editora;
    }

    public function getSinopse(): string
    {
        return $this->sinopse;
    }

    public function getAutores()
    {
        return $this->autores;
    }

    public function getCategorias()
    {
        return $this->categorias;
    }

    private function addCategoria(Categoria $categoria): void
    {
        array_push($this->categorias, $categoria);
    }

    private function addAutor(Autor $autor): void
    {
        array_push($this->autores, $autor);
    }
}
