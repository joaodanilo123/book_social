<?php

require_once(INTERFACE_PATH . 'Controller.php');

class ErroController implements Controller
{

  public function acionar(){
    echo "<h1>Essa é a página de erro</h1>";
  }

  public function setArgumento(string $argumento){}
  public function setAcao(string $acao){}

}