<?php

require_once(MODEL_PATH . 'Categoria.php');
require_once(MODEL_PATH . 'Autor.php');

class Livro {

    private int $id;
    private string $nome;
    private string $ano;
    private string $editora;
    private $categorias = [];
    private $autores = []; 

    function __construct(int $id, string $nome, string $ano, string $editora)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->ano = $ano;
        $this->editora = $editora;
    }

    public function getId(): int {
        return $this->id;
    }
}