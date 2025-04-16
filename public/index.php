<?php

use Controllers\PaginasController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';

$router =  new Router();


//Paginas Publicas

$router->get('/',[PaginasController::class, 'index']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/equipo',[PaginasController::class, 'equipo']);
$router->get('/noticias',[PaginasController::class, 'noticias']);
$router->get('/eventos',[PaginasController::class, 'eventos']);
$router->get('/blog',[PaginasController::class, 'blog']);
$router->get('/calendario-astronomico',[PaginasController::class, 'calendario_astronomico']);

$router->comprobarRutas();
