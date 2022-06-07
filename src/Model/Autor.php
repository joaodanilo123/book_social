<?php

class Autor {
    private int $id;
    private string $nome;

    public function __construct(int $id, string $nome) {
        $this->id = $id;
        $this->nome = $nome; 
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }
}