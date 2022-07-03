<?php

require_once(MODEL_PATH . 'Livro.php');
require_once(MODEL_PATH . 'Usuario.php');
require_once(INTERFACE_PATH . 'Controller.php');
require_once(LIB_PATH . 'Renderizador.php');
require_once(LIB_PATH . 'Sessao.php');

class UsuarioController implements Controller
{

    private $acao;
    private $acoesPermitidas = ['cadastrar', 'login', 'mostrar'];
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
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $senha = $_POST['senha'];
            $email = $_POST['email'];

            if(empty($senha) || empty($email)){
                return false;
            }

            if(Usuario::autenticar($email, $senha)){
                var_dump(Sessao::getUsuario());
                header(sprintf("Location: %susuario/mostrar", ROOT_PATH));
            } else {
                header(sprintf("Location: %susuario/login?error=invalida", ROOT_PATH));
            };

            

        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $parametros = [];
            if(array_key_exists('erro', $_GET)) $parametros['erro'] = $_GET['erro'];

            Renderizador::carregarPaginaComParametros('login.html', $parametros);
        }
    }

    private function cadastrar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];

            if(empty($nome) || empty($senha) || empty($email)){
                return false;
            }

            $usuario = new Usuario($nome, $email);
            $usuario = $usuario->comSenha($senha);
            Usuario::salvarNoBanco($usuario);

            header(sprintf("Location: %susuario/login", ROOT_PATH));

        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
            Renderizador::carregarPaginaComParametros('cadastro.html', []);
        }
    }
}
