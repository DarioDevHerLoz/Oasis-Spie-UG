<?php

use Controllers\BlogController;
use Controllers\DashboardController;
use Controllers\DiasController;
use Controllers\EventosController;
use Controllers\HorasController;
use Controllers\IntegrantesController;
use Controllers\NoticiasController;
use Controllers\PaginasController;
use Controllers\PonentesController;
use Controllers\UsuariosController;
use Model\Eventos;
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

// Area de administracion
$router->get('/admin/dashboard',[DashboardController::class, 'index']);
$router->get('/admin/blog',[BlogController::class, 'index']);
$router->get('/admin/dias',[DiasController::class, 'index']);
$router->get('/admin/eventos',[EventosController::class, 'index']);
$router->get('/admin/horas',[HorasController::class, 'index']);
$router->get('/admin/integrantes',[IntegrantesController::class, 'index']);
$router->get('/admin/noticias',[NoticiasController::class, 'index']);
$router->get('/admin/ponentes',[PonentesController::class, 'index']);
$router->get('/admin/usuarios',[UsuariosController::class, 'index']);



$router->comprobarRutas();
