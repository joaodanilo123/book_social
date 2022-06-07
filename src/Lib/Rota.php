<?php

class Rota
{

    //controller/?acao/?argumento

    private $controller = '';
    private $acao = '';
    private $argumento = '';

    //argumento é um array
    public function __construct($caminho)
    {
        $numeroDeParametros = count($caminho);
        $this->caminho = $caminho;
        $this->montarRota($caminho, $numeroDeParametros);
    }

    private function montarRota($caminho, $n)
    {
        switch ($n) {
            case 1:
                $this->setController($caminho[0]);
                break;

            case 2:
                $this->setController($caminho[0]);
                $this->setAcao($caminho[1]);
                break;
                
            case 3:
                $this->setController($caminho[0]);
                $this->setAcao($caminho[1]);
                $this->setArgumento($caminho[2]);
                break;
            
            default:
                $this->setController('home');
        }
    }

    private function setController($controller)
    {
        $this->controller = ucfirst($controller).'Controller';
    }

    private function setAcao($acao)
    {
        $this->acao = $acao;
    }

    private function setArgumento($argumento)
    {
        $this->argumento = $argumento;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAcao()
    {
        return $this->acao;
    }

    public function getArgumento()
    {
        return $this->argumento;
    }
}
