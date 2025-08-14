<?php
namespace Controllers;

use MVC\Router;
class NoticiasController {
    public static function index(Router $router){

        
        $router->render('admin/noticias/index',[

        ]);
    }
}


?>