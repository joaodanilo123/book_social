<?php



class Categoria
{
    private int $id;
    private string $nome;
    private $livros = [];

    function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    public static function buscarLivrosPorCategoria(PDO $conexao)
    {

        $sql = "SELECT livro.*, categoria.nome as categoria, categoria.id as categoria_id FROM livro 
                INNER JOIN livro_categoria ON livro_categoria.livro_id=livro.id 
                INNER JOIN categoria ON livro_categoria.categoria_id=categoria.id ORDER BY categoria.id";

        $sql = $conexao->prepare($sql);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $resultado = $sql->fetchAll();

        $categorias = [];

        foreach ($resultado as $row) {

            $posicaoCategoria = -1;

            for ($i = 0; $i < count($categorias); $i++) {
                if ($categorias[$i]->getId() == $row['categoria_id']) $posicaoCategoria = $i;
            }

            if ($posicaoCategoria < 0) {
                $novaCategoria = new Categoria($row['categoria_id'], $row['categoria']);
                array_push($categorias, $novaCategoria);
                $posicaoCategoria = count($categorias) - 1;
            }

            $livro = new Livro($row['id'], $row['titulo'], $row['ano'], $row['editora'], $row['sinopse']);

            array_push($categorias[$posicaoCategoria]->livros, $livro);
        }

        if(!$categorias) {
            throw new Exception("Nenhum Registro Encontrado");
        }

        return $categorias;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getLivros(): array
    {
        return $this->livros;
    }
}
