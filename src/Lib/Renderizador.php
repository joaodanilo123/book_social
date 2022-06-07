<?php

abstract class Renderizador
{

    private static $loader = null;
    private static $twig = null;
    private static $parametros_padrao = [
        'IMG_PATH' => ROOT_PATH . 'img/',
        'CSS_PATH' => ROOT_PATH . 'css/'
    ];

    private static function configurar()
    {
        if (self::$loader == null || self::$twig == null) {
            self::$loader = new \Twig\Loader\FilesystemLoader(TEMPLATE_PATH);
            self::$twig = new \Twig\Environment(self::$loader);
        }
    }

    public static function carregarPaginaComParametros($template, $parametros)
    {

        self::configurar();
        $parametros = array_merge($parametros, self::$parametros_padrao);
        $template = self::$twig->load($template);
        echo $template->render($parametros);
    }
}
