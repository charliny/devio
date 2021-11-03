<?php

require __DIR__ . '/vendor/autoload.php';

use App\Http\Router;
use App\Http\Response;
use App\Controller\Checkout\Checkout;
use App\Utils\View;

define('URL','http://localhost/devio');

View::init([
    'URL' => URL
]); 

$obRouter = new Router(URL);

include __DIR__.'/app/routes/pages.php';

$obRouter->run()->sendResponse();
