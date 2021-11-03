<?php

namespace App\Controller\Template;

use App\Utils\View;

class Page
{

    /** 
     * Método responsavel por retornar o header da pagina
     */
    public static function getHeader()
    {
        return View::render('template/header');
    }

    /** 
     * Método responsavel por retornar o header da pagina
     */
    public static function getFooter()
    {
        return View::render('template/footer');
    }


    /** 
     * Método responsavel por retornar pagina template
     * @return string
     */
    public static function getPage($title, $content)
    {
        $content = View::render('template/page',[
            'title'     => $title,
            'header'    =>self::getHeader(),
            'content'   => $content,
            'footer'    => self::getFooter()
        ]);
    }
}
