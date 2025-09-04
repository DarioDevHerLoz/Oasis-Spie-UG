<?php
namespace Controllers;

use Model\Usuarios;
use MVC\Router;
class UsuariosController {
    public static function index(Router $router){
        // if(!is_admin()){
        //     header('Location: /login');
        // }
        $usuarios = Usuarios::all();


        
        $router->render('admin/usuarios/index',[
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios
        ]);
    }

    public static function crear(Router $router){
        // if(!is_admin()){
        //     header('Location: /login');
        // }
        $alertas = [];
        $usuario = new Usuarios;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario->sincronizar($_POST);

            //Validar
            $alertas = $usuario->validar_usuario();

            if(empty($alertas)){
                $existeUsuario = Usuarios::where('usuario_correo', $usuario->usuario_correo);
                if($existeUsuario){
                    Usuarios::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuarios::getAlertas();
                } else {
                    //Hashear password
                    $usuario->hashPassword();

                    //Eliminar password2
                    unset($usuario->usuario_password2);

                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('Location: /admin/usuarios');
                    }
                }
            }
        }

        $router->render('admin/usuarios/crear',[
            'titulo' => 'Crear Usuario',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }

    public static function actualizar(Router $router){
        // if(!is_admin()){
        //     header('Location: /login');
        // }
        $alertas = [];
        //Validar el id 
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id){
            header('Location: /admin/usuarios');
        }

        $usuario = Usuarios::find($id);

        if(!$usuario){
            header('Location: /admin/usuarios');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // if(!is_admin()){
            //     header('Location: /login');
            // } 
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_actualizar();
            if(empty($alertas)){
                if(password_verify($_POST['usuario_password_actual'], $usuario->usuario_password)){
                    $resultado = $usuario->guardar();
                    if($resultado){
                        header('Location: /admin/usuarios');
                    }
                }
                else {
                    Usuarios::setAlerta('error', 'Password Incorrecto');
                }
            }
        }
        $router->render('admin/usuarios/actualizar',[
            'titulo' => 'Actualizar Usuario',
            'alertas' => $alertas,
            'usuario' => $usuario

        ]);
    }
}


?>