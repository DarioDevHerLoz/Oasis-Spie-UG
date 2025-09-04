<?php 
    namespace Controllers;

use Model\Usuarios;
use MVC\Router;

    class AuthController {
        public static function login(Router $router){

            $alertas = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $usuario = new Usuarios($_POST);
                $alertas = $usuario->validar_login();
                if(empty($alertas)){
                    $usuario = Usuarios::where('usuario_correo', $usuario->usuario_correo);
                    if(!$usuario){
                        Usuarios::setAlerta('error', 'El Usuario No existe o no esta confirmado');
                    } else {
                        if( password_verify($_POST['usuario_password'], $usuario->usuario_password) ){
                            //Iniciar la sesion
                            session_start();
                            $_SESSION['id'] = $usuario->id;
                            $_SESSION['usuario_nombre'] = $usuario->usuario_nombre;
                            $_SESSION['usuario_apellido'] = $usuario->usuario_apellido;
                            $_SESSION['usuario_email'] = $usuario->usuario_email;
                            
                            //Redireccion
                            header('Location: /admin/dashboard');
                        } else {
                            Usuarios::setAlerta('error', 'Password Incorrecto');
                        }
                    }
                }
            }

            $alertas = Usuarios::getAlertas();

            $router->render('auth/login', [
                'titulo'=>'Iniciar Sesion',
                'alertas' => $alertas,
            ]);

        }
        public static function logout() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                session_start();
                $_SESSION = [];
                header('Location: /login');
            } 
        }
    }

?>