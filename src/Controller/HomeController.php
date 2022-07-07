<?php



class HomeController implements Controller
{

  public function setAcao(string $acao)
  {
  }

  public function setArgumento(string $argumento)
  {
  }

  public function acionar()
  {

    try {

      $busca = $this->carregarDadosModel();
      if ($busca) {
        $parametros = ['categorias' => $busca];
        $this->renderizar($parametros);
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function carregarDadosModel()
  {
    return Categoria::buscarLivrosPorCategoria(Conexao::getConexao());
  }

  public function renderizar($parametros)
  {

    Renderizador::carregarPaginaComParametros('home.html', $parametros);
    
  }
}
