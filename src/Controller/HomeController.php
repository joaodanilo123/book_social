<?php

require_once(MODEL_PATH . 'Categoria.php');

class HomeController
{

  public function carregar()
  {

    $loader = new \Twig\Loader\FilesystemLoader(TEMPLATE_PATH);
    $twig = new \Twig\Environment($loader);

    try {

      $template = $twig->load('home.html');
      $busca = Categoria::buscarLivrosPorCategoria(Conexao::getConexao());
      $parametros = ['categorias' => $busca];
      $conteudo = $template->render($parametros);

      echo $conteudo;
    
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
