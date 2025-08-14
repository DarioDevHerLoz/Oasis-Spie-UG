<?php
namespace Controllers;

use MVC\Router;
class HorasController {
    public static function index(Router $router){

        
        $router->render('admin/horas/index',[

        ]);
    }
}


?>