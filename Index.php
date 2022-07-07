<?php

ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

const TEMPLATE_PATH = "src/View/";
const MODEL_PATH = "src/Model/";
const CONTROLLER_PATH = "src/Controller/";
const INTERFACE_PATH = "src/Interface/";
const LIB_PATH = "src/Lib/";
const DEFAULT_LAYOUT_PATH = "public/html/layout.html";
const ROOT_PATH = 'http://localhost/booksocial/';

require_once(MODEL_PATH . 'Livro.php');
require_once(INTERFACE_PATH . 'Controller.php');
require_once(LIB_PATH . 'Renderizador.php');
require_once(LIB_PATH . 'Sessao.php');
require_once(MODEL_PATH . 'Avaliacao.php');
require_once(MODEL_PATH . 'Categoria.php');
require_once(MODEL_PATH . 'Usuario.php');
require_once(LIB_PATH . 'Rota.php');
require_once(CONTROLLER_PATH . 'ErroController.php');
require_once(MODEL_PATH . 'Autor.php');
require_once(LIB_PATH . 'conexao.php');
require_once(MODEL_PATH . 'Autor.php');
require_once("./vendor/autoload.php");
require_once("./src/Lib/Core.php");

session_start();
$core = new Core(DEFAULT_LAYOUT_PATH);
$core->ativar();
