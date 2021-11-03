<?php

namespace App\Controller\Checkout;

use App\Controller\Template\Page;
use App\Utils\View;

class Checkout extends Page
{
    public static function getCheckout()
    {
        $content =  View::render('checkout/checkout');
        return parent::getPage('Burguer Foods', $content);
    }
}