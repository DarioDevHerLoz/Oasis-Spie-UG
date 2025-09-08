<?php
namespace Controllers;

use Model\Blog;
use MVC\Router;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController {
    public static function index(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /admin/blog?page=1');
        }

        $registros_por_pagina = 10;
        $total = Blog::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/blog?page=1');
        }

        $blogs = Blog::paginar($registros_por_pagina, $paginacion->offset());
        
        $router->render('admin/blog/index',[
            'titulo' => 'Blog',
            'blogs' => $blogs,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
        if(!is_auth()){
            header('Location: /login');
        }

        $alertas = [];
        $blog = new Blog;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }

                        //Leer imagen
            if(!empty($_FILES['blog_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/blog';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['blog_imagen']['tmp_name'])->fit(1600,900)->encode('png',95);
                $imagen_webp = Image::make($_FILES['blog_imagen']['tmp_name'])->fit(1600,900)->encode('webp',95);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['blog_imagen'] = $nombre_imagen;
            }
            $blog->blog_colaboradores = $_SESSION['usuario_nombre'] . ' ' . $_SESSION['usuario_apellido'];
            $blog->usu_blo_id = $_SESSION['id'];
            $blog->sincronizar($_POST);
            $alertas = $blog->validar();
            if(empty($alertas)){
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                //Guardar en la BD
                $resultado = $blog->guardar();
                if($resultado){
                    header('Location: /admin/blog');
                }
            }
        }
        $router->render('admin/blog/crear',[
            'titulo' => 'Agregar Blog',
            'alertas' => $alertas,
            'blog' => $blog
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
            header('Location: /admin/blog');
        }
        $blog = Blog::find($id);
        if(!$blog){
            header('Location: /admin/blog');
        }
        $blog->imagen_actual = $blog->blog_imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }
            //Leer imagen
            if(!empty($_FILES['blog_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/blog';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['blog_imagen']['tmp_name'])->fit(1600,900)->encode('png',95);
                $imagen_webp = Image::make($_FILES['blog_imagen']['tmp_name'])->fit(1600,900)->encode('webp',95);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['blog_imagen'] = $nombre_imagen;
            }else {
                $_POST['blog_imagen'] = $blog->imagen_actual;
            }

            $blog->sincronizar($_POST);

            $alertas = $blog->validar();
            // Guardar el regidtro
            if(empty($alertas)){
                if(isset($nombre_imagen)){
                    //Guardar las imagenes 
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");                    
                }

                //Guardar en la BD
                $resultado = $blog->guardar();
                if($resultado) {
                    header('Location: /admin/blog');
                }
            }
        }

        $router->render('admin/blog/actualizar',[
            'titulo' => 'Blog',
            'alertas' => $alertas,
            'blog' => $blog
        ]);
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
            }

            $id = $_POST['id'];
            $blog = Blog::find($id);
            if(!isset($blog)){
                header('Location: /admin/noticias');
            }
            $resultado = $blog->eliminar();
            if($resultado){
                header('Location: /admin/blog');
            }
        }
    }
}


?>