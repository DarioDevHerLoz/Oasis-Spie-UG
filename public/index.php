<?php

use Controllers\AuthController;
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

//Login

$router->get('/login',[AuthController::class, 'login']);
$router->post('/login',[AuthController::class, 'login']);
$router->post('/logout',[AuthController::class, 'logout']);

// Area de administracion
$router->get('/admin/dashboard',[DashboardController::class, 'index']);
$router->get('/admin/blog',[BlogController::class, 'index']);

$router->get('/admin/dias',[DiasController::class, 'index']);
$router->get('/admin/dias/crear',[DiasController::class, 'crear']);
$router->post('/admin/dias/crear',[DiasController::class, 'crear']);
$router->get('/admin/dias/actualizar',[DiasController::class, 'actualizar']);
$router->post('/admin/dias/actualizar',[DiasController::class, 'actualizar']);
$router->post('/admin/dias/eliminar',[DiasController::class, 'delete']);

$router->get('/admin/horas',[HorasController::class, 'index']);
$router->get('/admin/horas/crear',[HorasController::class, 'crear']);
$router->post('/admin/horas/crear',[HorasController::class, 'crear']);
$router->get('/admin/horas/actualizar',[HorasController::class, 'actualizar']);
$router->post('/admin/horas/actualizar',[HorasController::class, 'actualizar']);
$router->post('/admin/horas/delete',[HorasController::class, 'delete']);

$router->get('/admin/eventos',[EventosController::class, 'index']);

$router->get('/admin/integrantes',[IntegrantesController::class, 'index']);
$router->get('/admin/integrantes/crear',[IntegrantesController::class, 'crear']);
$router->post('/admin/integrantes/crear',[IntegrantesController::class, 'crear']);
$router->get('/admin/integrantes/actualizar',[IntegrantesController::class, 'actualizar']);
$router->post('/admin/integrantes/actualizar',[IntegrantesController::class, 'actualizar']);
$router->post('/admin/integrantes/delete',[IntegrantesController::class, 'delete']);

$router->get('/admin/noticias',[NoticiasController::class, 'index']);
$router->get('/admin/noticias/crear',[NoticiasController::class, 'crear']);
$router->post('/admin/noticias/crear',[NoticiasController::class, 'crear']);
$router->get('/admin/noticias/actualizar',[NoticiasController::class, 'actualizar']);
$router->post('/admin/noticias/actualizar',[NoticiasController::class, 'actualizar']);
$router->post('/admin/noticias/delete',[NoticiasController::class, 'delete']);


$router->get('/admin/ponentes',[PonentesController::class, 'index']);

$router->get('/admin/usuarios',[UsuariosController::class, 'index']);
$router->get('/admin/usuarios/crear',[UsuariosController::class, 'crear']);
$router->post('/admin/usuarios/crear',[UsuariosController::class, 'crear']);
$router->get('/admin/usuarios/actualizar',[UsuariosController::class, 'actualizar']);
$router->post('/admin/usuarios/actualizar',[UsuariosController::class, 'actualizar']);



$router->comprobarRutas();
