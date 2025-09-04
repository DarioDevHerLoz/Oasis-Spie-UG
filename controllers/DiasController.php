<?php
namespace Controllers;

use Model\Dias;
use MVC\Router;
class DiasController {
    public static function index(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $dias = Dias::all();

        $router->render('admin/dias/index',[
            'titulo' => 'Dias',
            'dias' => $dias 
        ]);
    }

    public static function crear(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $alertas = [];
        $dia = new Dias;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }

            $dia->sincronizar($_POST);

            $alertas = $dia->validar();

            if(empty($alertas)){
                
                $resultado = $dia->guardar();

                if($resultado) {
                    header('Location: /admin/dias');
                }
            }
        }
        $router->render('admin/dias/crear',[
            'titulo' => 'Registrar Dias',
            'alertas' => $alertas,
            'dia' => $dia
        ]);
    }

    public static function actualizar(Router $router){
        if(!is_auth()) {
            header('Location: /login');
        }

        $alertas = [];

        //Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/dias');
        }   

        $dia = Dias::find($id);
        
        if(!$dia){
            header('Location: /admin/dia');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()) {
                header('Location: /login');
            }
            $dia->sincronizar(($_POST));
            $alertas = $dia->validar();

            if(empty($alertas)){
                $resultado = $dia->guardar();
                if($resultado){
                    header('Location: /admin/dias');
                }
            }
        }


     $router->render('admin/dias/actualizar',[
            'titulo' => 'Dias',
            'alertas' => $alertas,
            'dia' => $dia,
        ]);
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()) {
            header('Location: /login');
            }
            $id = $_POST['id'];
            $dia = Dias::find($id);

            if(!isset($dia)){
                header('Location: /admin/dias');
            }
            $resultado = $dia->eliminar();
            if($resultado){
                header('Location: /admin/dias');
            }

        }
  
    }
}


?>