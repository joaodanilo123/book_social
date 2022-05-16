<?php

ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

require_once("./vendor/autoload.php");
require_once("./src/config/conexao.php");

const TEMPLATE_PATH = "src/View/";
const MODEL_PATH = "src/Model/";
const CONTROLLER_PATH = "src/Controller/";

$rota = explode('/', $_GET['url'] ?? 'home');
$nomeController =  ucfirst($rota[0]) . 'Controller';
$arquivoController = CONTROLLER_PATH . $nomeController . '.php';
$controller;

if(file_exists($arquivoController)){
  
  require_once($arquivoController);
  
  if(class_exists($nomeController)){
  
    $controller = new $nomeController;
  
  }
}

ob_start();
$controller->carregar();
$conteudo = ob_get_contents();
ob_end_clean();

$pagina = file_get_contents('public/html/layout.html');

$pagina = str_replace('{{area-dinamica}}', $conteudo, $pagina);

echo $pagina;
