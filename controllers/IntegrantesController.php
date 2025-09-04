<?php
namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Integrantes;
use Intervention\Image\ImageManagerStatic as Image;

class IntegrantesController {
    public static function index(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/integrantes?page=1');
        }

        $registros_por_pagina = 10;
        $total = Integrantes::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual ) {
            header('Location: /admin/integrantes?page=1');
        }

        $integrantes = Integrantes::paginar($registros_por_pagina, $paginacion->offset());
        
        $router->render('admin/integrantes/index',[
            'titulo' => 'Integrantes',
            'integrantes' => $integrantes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }
        $alertas = [];
        $integrante = new Integrantes;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }

            //Leer imagen
            if(!empty($_FILES['integrantes_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/integrantes';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['integrantes_imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['integrantes_imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['integrantes_imagen'] = $nombre_imagen;
            }
            $integrante->sincronizar($_POST);

            //Validar
            $alertas = $integrante->validar();

            // Guardar el regidtro
            if(empty($alertas)){
                //Guardar las imagenes 
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                //Guardar en la BD
                $resultado = $integrante->guardar();
                if($resultado) {
                    header('Location: /admin/integrantes');
                }
            }
        }



        $router->render('admin/integrantes/crear',[
            'titulo' => 'Crear Integrantes',
            'alertas' => $alertas,
            'integrante' => $integrante 
        ]);
    }

    public static function actualizar(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $alertas = [];
        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/integrantes');
        }

        //Obtener Integrante que se va a editar
        $integrante = Integrantes::find($id);

        if(!$integrante){
            header('Location: /admin/integrantes');
        }

        $integrante->imagen_actual = $integrante->integrantes_imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }
            //Leer imagen
            if(!empty($_FILES['integrantes_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/integrantes';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['integrantes_imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['integrantes_imagen']['tmp_name'])->fit(800,800)->encode('webp',80);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['integrantes_imagen'] = $nombre_imagen;
            }else {
                $_POST['integrantes_imagen'] = $integrante->imagen_actual;
            }

            $integrante->sincronizar($_POST);

            $alertas = $integrante->validar();
            // Guardar el regidtro
            if(empty($alertas)){
                if(isset($nombre_imagen)){
                    //Guardar las imagenes 
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");                    
                }

                //Guardar en la BD
                $resultado = $integrante->guardar();
                if($resultado) {
                    header('Location: /admin/integrantes');
                }
            }
        }



        $router->render('admin/integrantes/actualizar',[
            'titulo' => 'Actualizar Integrantes',
            'alertas' => $alertas,
            'integrante' => $integrante

        ]);
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }

            $id = $_POST['id'];
            $integrante = Integrantes::find($id);
            if(!isset($integrante)){
                header('Location: /admin/integrantes');
            }
            $resultado = $integrante->eliminar();
            if($resultado){
                header('Location: /admin/integrantes');
            }
        }
    }
}


?>