<?php
namespace Controllers;

use MVC\Router;
class EventosController {
    public static function index(Router $router){

        
        $router->render('admin/eventos/index',[
            'titulo' => 'Eventos',
        ]);
    }

    public static function crear(Router $router){

        
        $router->render('admin/eventos/crear',[
            'titulo' => 'Crear Evento',
        ]);
    }

    public static function actualizar(Router $router){

        
        $router->render('admin/eventos/actualizar',[
            'titulo' => 'Actualizar Evento',
        ]);
    }

    public static function delete(Router $router){

    }
}


?>