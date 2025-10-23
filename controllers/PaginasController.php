<?php
 namespace Controllers;

use MVC\Router;
use Model\Noticias;
use Model\Integrantes;
use Classes\Paginacion;
use Model\Blog;
use Model\Eventos;
use Model\Horas;
use Model\Ponentes;

 class PaginasController {
  public static function index(Router $router){

    //Equipo
    $equipo = Integrantes::all();

    //eventos
    $eventos = Eventos::get(3);

    //Blog
    $blogs_slider = Blog::get(5);

    //Noticias
    $noticias = Noticias::get(4);

    $router->render('paginas/index', [
      'titulo' => 'inicio',
      'equipo' => $equipo,
      'eventos' => $eventos,
      'blogs_slider' => $blogs_slider,
      'noticias' => $noticias
    ]);
  }

  public static function nosotros(Router $router){
    
    $router->render('paginas/nosotros', [
      'titulo' => 'Nosotros',
    ]);
  }

  public static function equipo(Router $router){

    $equipo = Integrantes::all();

    $router->render('paginas/equipo', [
      'titulo' => 'Equipo',
      'equipo' => $equipo
    ]);
  }

  public static function noticias(Router $router){
    $pagina_actual = $_GET['page'];
    $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
    if(!$pagina_actual || $pagina_actual < 1){
        header('Location: /noticias?page=1');
    }

    $registros_por_pagina = 12;
    $total = Noticias::total();
    $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
    if($paginacion->total_paginas() < $pagina_actual) {
        header('Location: /noticias?page=1');
    }
    $noticias = Noticias::paginar($registros_por_pagina, $paginacion->offset());
    $router->render('paginas/noticias', [
      'titulo' => 'Noticias',
      'noticias' => $noticias,
      'paginacion' => $paginacion->paginacion()
    ]);
  }

  public static function noticia(Router $router){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id || $id < 1){
        header('Location: /noticias?page=1');
    }
    $noticia = Noticias::find($id);
    $router->render('paginas/noticia',[
      'titulo' => $noticia->noticias_titulo,
      'noticia' => $noticia
    ]);
  }

  public static function eventos(Router $router){
    $pagina_actual = $_GET['page'];
    $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
    if(!$pagina_actual || $pagina_actual < 1){
        header('Location: /eventos?page=1');
    }

    $registros_por_pagina = 12;
    $total = Eventos::total();
    $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
    if($paginacion->total_paginas() < $pagina_actual) {
        header('Location: /eventos?page=1');
    }
    $eventos = Eventos::paginar($registros_por_pagina, $paginacion->offset());

    $router->render('paginas/eventos', [
      'titulo' => 'Eventos',
      'eventos' => $eventos,
      'paginacion' => $paginacion->paginacion()
    ]);
  }

  public static function evento(Router $router){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id || $id < 1){
        header('Location: /evento?page=1');
    }
    $evento = Eventos::find($id);
    $ponente = Ponentes::find($evento->pon_eve_id);
    $hora = Horas::find($evento->hor_eve_id);

    $router->render('paginas/evento',[
      'titulo' => $evento->evento_nombre,
      'evento' => $evento,
      'ponente' => $ponente,
      'hora' => $hora
    ]);
  }

  public static function blogs(Router $router){
    $pagina_actual = $_GET['page'];
    $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
    if(!$pagina_actual || $pagina_actual < 1){
        header('Location: /blogs?page=1');
    }

    $registros_por_pagina = 10;
    $total = Blog::total();
    $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
    if($paginacion->total_paginas() < $pagina_actual) {
        header('Location: /blogs?page=1');
    }
    $blogs = Blog::paginar($registros_por_pagina, $paginacion->offset());

    $blogs_slider = null;
    if($pagina_actual === 1){
      $blogs_slider = Blog::get(5);
    }

    $router->render('paginas/blogs', [
      'titulo' => 'Blog',
      'blogs' => $blogs,
      'paginacion' => $paginacion->paginacion(),
      'blogs_slider' => $blogs_slider
    ]);
  }

  public static function blog(Router $router){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id || $id < 1){
        header('Location: /blogs?page=1');
    }
    $blog = Blog::find($id);

    $router->render('paginas/blog', [
      'titulo' => $blog->blog_titulo,
      'blog' => $blog
    ]);
  }

  public static function calendario_astronomico(Router $router){

    $router->render('paginas/calendario-astronomico', [
      'titulo' => 'Calendario-Astronomico',
    ]);
  }



 }
 
 ?>