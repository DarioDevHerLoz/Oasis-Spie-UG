<?php
namespace Controllers;

use Classes\Paginacion;
use Model\Noticias;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class NoticiasController {
    public static function index(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /admin/noticias?page=1');
        }

        $registros_por_pagina = 10;
        $total = Noticias::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/noticias?page=1');
        }

        $noticias = Noticias::paginar($registros_por_pagina, $paginacion->offset());
        
        $router->render('admin/noticias/index',[
            'titulo' => 'Noticias',
            'noticias' => $noticias,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear (Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $alertas = [];
        $noticia = new Noticias;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }

            //Leer imagen
            if(!empty($_FILES['noticias_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/noticias';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['noticias_imagen']['tmp_name'])->fit(1600,900)->encode('png',95);
                $imagen_webp = Image::make($_FILES['noticias_imagen']['tmp_name'])->fit(1600,900)->encode('webp',95);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['noticias_imagen'] = $nombre_imagen;
            }
            $noticia->noticias_colaboradores = $_SESSION['usuario_nombre'] . ' ' . $_SESSION['usuario_apellido'];
            $noticia->usu_not_id = $_SESSION['id'];
            $noticia->sincronizar($_POST);
            $alertas = $noticia->validar();
            if(empty($alertas)){
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                //Guardar en la BD
                $resultado = $noticia->guardar();
                if($resultado){
                    header('Location: /admin/noticias');
                }
            }
        }

        $router->render('admin/noticias/crear',[
            'titulo' => 'Crear Noticia',
            'alertas' => $alertas,
            'noticia' => $noticia
        ]);
    }

    public static function actualizar(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $alertas = [];
        //Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/noticias');
        }

        //Obtener Noticia que se va a editar
        $noticia = Noticias::find($id);

        if(!$noticia){
            header('Location: /admin/noticias');
        }
        $noticia->imagen_actual = $noticia->noticias_imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }
            //Leer imagen
            if(!empty($_FILES['noticias_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/noticias';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['noticias_imagen']['tmp_name'])->fit(1600,900)->encode('png',95);
                $imagen_webp = Image::make($_FILES['noticias_imagen']['tmp_name'])->fit(1600,900)->encode('webp',95);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['noticias_imagen'] = $nombre_imagen;
            }else {
                $_POST['noticias_imagen'] = $noticia->imagen_actual;
            }

            $noticia->sincronizar($_POST);

            $alertas = $noticia->validar();
            // Guardar el regidtro
            if(empty($alertas)){
                if(isset($nombre_imagen)){
                    //Guardar las imagenes 
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");                    
                }

                //Guardar en la BD
                $resultado = $noticia->guardar();
                if($resultado) {
                    header('Location: /admin/noticias');
                }
            }
        }
        
        $router->render('admin/noticias/actualizar',[
            'titulo' => 'Actualizar Noticia',
            'alertas' => $alertas,
            'noticia' => $noticia
            
        ]);
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }

            $id = $_POST['id'];
            $noticia = Noticias::find($id);
            if(!isset($noticia)){
                header('Location: /admin/noticias');
            }
            $resultado = $noticia->eliminar();
            if($resultado){
                header('Location: /admin/noticias');
            }
        }
        
    }
}


?>