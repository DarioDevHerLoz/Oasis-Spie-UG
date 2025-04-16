<?php
 namespace Controllers;

use MVC\Router;

 class PaginasController {
  public static function index(Router $router){

    $router->render('paginas/index', [
      'titulo' => 'inicio',
    ]);
  }

  public static function nosotros(Router $router){

    $router->render('paginas/nosotros', [
      'titulo' => 'Nosotros',
    ]);
  }

  public static function equipo(Router $router){

    $router->render('paginas/equipo', [
      'titulo' => 'Equipo',
    ]);
  }

  public static function noticias(Router $router){

    $router->render('paginas/noticias', [
      'titulo' => 'Noticias',
    ]);
  }

  public static function eventos(Router $router){

    $router->render('paginas/eventos', [
      'titulo' => 'Enicio',
    ]);
  }

  public static function blog(Router $router){

    $router->render('paginas/blog', [
      'titulo' => 'Blog',
    ]);
  }

  public static function calendario_astronomico(Router $router){

    $router->render('paginas/calendario-astronomico', [
      'titulo' => 'Calendario-Astronomico',
    ]);
  }



 }
 
 ?>