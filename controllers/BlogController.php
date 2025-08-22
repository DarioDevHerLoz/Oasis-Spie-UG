<?php
namespace Controllers;

use MVC\Router;
class BlogController {
    public static function index(Router $router){

        
        $router->render('admin/blog/index',[
            'titulo' => 'Blog',
        ]);
    }
}


?>