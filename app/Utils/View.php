<?php

namespace App\Utils;

class View
{
    /**
     * Método responsavel por retornar o conteudo de uma view
     * @param string $view
     * @return string
     */
    public static function getContentView($view)
    {
        $file = __DIR__ . '/../View/pages/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Metodo responsavel por retornar o conteudo renderizado de uma view
     * @param string $view
     * @param array $vars (string/numeric)
     * @retun string
     */
    public static function render($view, $vars = [])
    {

        $contentView = self::getContentView($view);

        $keys = array_keys($vars);
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        return  str_replace($keys, array_values($vars), $contentView);
    }
}
