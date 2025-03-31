<?php

use Controllers\PaginasController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';

$router =  new Router();


//Paginas Publicas

$router->get('/',[PaginasController::class, 'index']);

$router->comprobarRutas();
