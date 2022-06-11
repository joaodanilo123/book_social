<?php

require_once(MODEL_PATH . 'Livro.php');
require_once(MODEL_PATH . 'Usuario.php');
require_once(INTERFACE_PATH . 'Controller.php');
require_once(LIB_PATH . 'Renderizador.php');

class UsuarioController implements Controller
{

    private $acao;
    private $acoesPermitidas = ['cadastrar', 'login'];
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

    private function login(){

    }

    private function cadastrar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];

            if(empty($nome) || empty($senha) || empty($email)){
                return false;
            }

            $usuario = new Usuario($nome, $senha, $email);
            Usuario::salvarNoBanco($usuario);

            header(sprintf("Location: %susuario/login", ROOT_PATH));

        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
            Renderizador::carregarPaginaComParametros('cadastro.html', []);
        }
    }
}
