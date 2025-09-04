<?php
namespace Controllers;

use Model\Horas;
use MVC\Router;
class HorasController {
    public static function index(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $horas = Horas::all();
        
        $router->render('admin/horas/index',[
            'titulo' => 'Horas',
            'horas' => $horas
        ]);
    }

    public static function crear(Router $router) {
        if(!is_auth()){
            header('Location: /login');
        }

        $alertas = [];
        $hora = new Horas;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()){
                header('Location: /login');
            }

            $hora->sincronizar($_POST);

            $alertas = $hora->validar();

            if(empty($alertas)){
                $resultado = $hora->guardar();
                if($resultado) {
                    header('Location: /admin/horas');
                }
            }
        }

        $router->render('admin/horas/crear',[
            'titulo' => 'Horas',
            'alertas' => $alertas,
            'hora' => $hora
        ]);
    }

    public static function actualizar(Router $router) {
        if(!is_auth()){
            header('Location: /login');
        }
        $alertas = [];

        //validar el id
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /adimin/horas');
        }
        $hora = Horas::find($id);
        if(!$hora){
            header('Location: /adimin/horas');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()) {
                header('Location: /login');
            } 
            $hora->sincronizar($_POST);
            $alertas = $hora->validar();
            if(empty($alertas)){
                $resultado=$hora->guardar();
                if($resultado){
                    header('Location: /admin/horas');
                }
            }
        }
        $router->render('admin/horas/actualizar',[
            'titulo' => 'Horas',
            'alertas' => $alertas,
            'hora' => $hora
        ]);
    }

    public static function delete(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()) {
            header('Location: /login');
            }
            $id = $_POST['id'];
            $hora = Horas::find($id);

            if(!isset($hora)){
                header('Location: /admin/dias');
            }
            $resultado = $hora->eliminar();
            if($resultado){
                header('Location: /admin/horas');
            }

        }

    }
}


?>