<?php
namespace Controllers;

use MVC\Router;
class IntegrantesController {
    public static function index(Router $router){

        
        $router->render('admin/integrantes/index',[
            'titulo' => 'Integrantes',
        ]);
    }
}


?>