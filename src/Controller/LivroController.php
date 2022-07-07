<?php

class LivroController implements Controller
{

    private $acao;
    private $acoesPermitidas = ['cadastrar', 'mostrar', 'avaliar'];
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

    private function avaliar()
    {

        $livroId = $this->argumento;
        var_dump(Sessao::getUsuario());
        $usuarioId = Sessao::getUsuario()->getId();
        $nota = $_POST['nota'];
        $texto = $_POST['texto'];

        $avaliacao = new Avaliacao($nota, $texto);

        Avaliacao::salvarNoBanco($avaliacao, $usuarioId, $livroId);
        header(sprintf("Location: %slivro/mostrar/%d", ROOT_PATH, $livroId));

    }

    private function mostrar()
    {
        $livro = Livro::getLivroById($this->argumento);
        $avaliacoes = Avaliacao::listarPorLivro($livro->getId());
        $parametros = ['livro' => $livro, 'logado' => Sessao::isLogado(), 'avaliacoes' => $avaliacoes];
        Renderizador::carregarPaginaComParametros('mostrarLivro.html', $parametros);
    }

    private function cadastrar()
    {
    }
}
