<?php
namespace Controllers;

use MVC\Router;
class UsuariosController {
    public static function index(Router $router){

        
        $router->render('admin/usuarios/index',[
            'titulo' => 'Usuarios',
        ]);
    }

    public static function crear(Router $router){

        $router->render('admin/usuarios/crear',[
            'titulo' => 'Crear Usuario'
        ]);
    }

    public static function actualizar(Router $router){

        $router->render('admin/usuarios/actualizar',[
            'titulo' => 'Actualizar Usuario'
        ]);
    }

    public static function delete(Router $router){
        
    }
}


?>