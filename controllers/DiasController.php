<?php
namespace Controllers;

use MVC\Router;
class DiasController {
    public static function index(Router $router){

        
        $router->render('admin/dias/index',[

        ]);
    }
}


?>