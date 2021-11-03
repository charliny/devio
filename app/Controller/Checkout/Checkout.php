<?php

namespace App\Controller\Checkout;

use App\Utils\View;
use App\Controller\Template\Page;

class Checkout extends Page
{
    /**
     * Método responsavel por renderizar a pagina de checkout
     * @return string
     */
    public static function getCheckout()
    {
        $content =  View::render('checkout/checkout');

        return parent::getPage($content);
    }
}