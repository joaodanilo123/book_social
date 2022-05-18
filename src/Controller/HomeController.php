<?php

require_once(MODEL_PATH . 'Categoria.php');
require_once(INTERFACE_PATH . 'Controller.php');

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

    $loader = new \Twig\Loader\FilesystemLoader(TEMPLATE_PATH);
    $twig = new \Twig\Environment($loader);

    $template = $twig->load('home.html');

    echo $template->render($parametros);
  }
}
