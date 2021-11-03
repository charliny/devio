<?php

use App\Http\Response;
use App\Controller\Checkout;

/**
 * Rota de Home
 */
$obRouter->get('/',[
    function(){
        return new Response(200,Checkout\Checkout::getCheckout());
    }
]);

/**
 * Rota de Checkout
 */
$obRouter->get('/checkout',[
    function(){
        return new Response(200,Checkout\Checkout::getCheckout());
    }
]);

