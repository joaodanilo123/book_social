<?php

require_once(INTERFACE_PATH . 'Controller.php');

class ErroController implements Controller
{

  private string $acao;
  private string $argumento;
  private $acoesPermitidas = ['mostrar'];

  public function mostrar(){
    echo $this->argumento;
  }

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

}