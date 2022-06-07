<?php

require_once(MODEL_PATH . 'Livro.php');
require_once(INTERFACE_PATH . 'Controller.php');
require_once(LIB_PATH . 'Renderizador.php');

class LivroController implements Controller
{

    private $acao;
    private $acoesPermitidas = ['cadastrar', 'mostrar'];
    private $argumento;

    public function setAcao(string $acao)
    {
        if (in_array(strtolower($acao), $this->acoesPermitidas)) {
            $this->acao = $acao;
        } else {
            throw new Exception("Este recurso não existe");
        }
    }

    public function setArgumento(string $argumento)
    {
        if (!empty($argumento)) {
            $this->argumento = $argumento;
        }
    }

    public function acionar()
    {
        $method = $this->acao;
        $this->$method();
    }

    private function mostrar()
    {
        $livro = Livro::getLivroById($this->argumento);
        $parametros = ['livro' => $livro];
        Renderizador::carregarPaginaComParametros('mostrarLivro.html', $parametros);
    }

    private function cadastrar()
    {
    }
}
