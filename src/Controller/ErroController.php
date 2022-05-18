<?php

require_once(INTERFACE_PATH . 'Controller.php');

class ErroController implements Controller
{

  public function acionar(){
    echo "Erro";
  }

  public function setArgumento(string $argumento){}
  public function setAcao(string $acao){}

}