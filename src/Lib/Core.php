<?php

require_once(LIB_PATH . 'Rota.php');
require_once(INTERFACE_PATH . 'Controller.php');
require_once(CONTROLLER_PATH . 'ErroController.php');

class Core
{

    private Rota $rota;
    private Controller $controller;
    private $layout_padrao;

    public function __construct($layout)
    {
        $this->layout_padrao = $layout;
        $this->rota = new Rota(explode('/', $_GET['url'] ?? 'home'));
        $this->validarRota($this->rota);
        //$this->acionarController();
    }

    private function validarRota(Rota $rota): bool
    {

        $arquivoController = CONTROLLER_PATH . $rota->getController() . '.php';
        $nomeController = $rota->getController();
        if (file_exists($arquivoController)) {

            require_once($arquivoController);

            if (class_exists($nomeController)) {
                $this->controller = new $nomeController;
                return true;
            }
        }

        $this->controller = new ErroController;
        return false;
    }

    public function ativar()
    {

        $this->controller->setAcao($this->rota->getAcao());
        $this->controller->setArgumento($this->rota->getArgumento());

        ob_start();
        $this->controller->acionar();
        $conteudo = ob_get_contents();
        ob_end_clean();

        $pagina = file_get_contents($this->layout_padrao);

        $pagina = str_replace('{{area-dinamica}}', $conteudo, $pagina);

        echo $pagina;
    }
}
