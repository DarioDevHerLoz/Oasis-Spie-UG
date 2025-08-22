<?php
namespace Controllers;

use MVC\Router;
class UsuariosController {
    public static function index(Router $router){

        
        $router->render('admin/usuarios/index',[
            'titulo' => 'Usuarios',
        ]);
    }
}


?>