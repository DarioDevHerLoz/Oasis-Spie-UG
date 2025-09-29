<?php
namespace Controllers;

use Model\Blog;
use Model\Eventos;
use Model\Noticias;
use MVC\Router;
class DashboardController {
    public static function index(Router $router){
        //Obtener blogs
        $blogs = Blog::get(5);

        //Obtener eventos
        $eventos = Eventos::get(5);

        //Eventos conmenos lugares
        $menos_disponibles = Eventos::ordenarLimite('evento_disponibles', 'ASC', 5);

        //Obtener noticias
        $noticias = Noticias::get(5);

        
        $router->render('admin/dashboard/index',[
            'titulo' => 'Panel de Administracion',
            'blogs' => $blogs ,
            'eventos' => $eventos ,
            'menos_disponibles' => $menos_disponibles ,
            'noticias' => $noticias
        ]);
    }
}


?>