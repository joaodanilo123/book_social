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

require_once("./vendor/autoload.php");
require_once("./src/Lib/conexao.php");
require_once("./src/Lib/Core.php");

$core = new Core(DEFAULT_LAYOUT_PATH);
$core->ativar();
var_dump($_SERVER['SERVER_NAME']);

