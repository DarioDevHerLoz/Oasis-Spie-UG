<?php
 namespace Controllers;

use MVC\Router;

 class PaginasController {
  public static function index(Router $router){
    $inicio = true;
    $router->render('paginas/index', [
      'titulo' => 'inicio',
      'inicio' => $inicio
    ]);
  }
 }
 
 ?>