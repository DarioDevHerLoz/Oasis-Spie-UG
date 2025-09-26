<?php
namespace Controllers;

use Model\Dias;
use MVC\Router;
use Model\Horas;
use Model\Eventos;
use Model\Ponentes;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;

class EventosController {
    public static function index(Router $router){
        if(!is_auth()){
            header('location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/eventos?page=1');
        }

        $por_pagina = 10;
        $total = Eventos::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        $eventos = Eventos::paginar($por_pagina, $paginacion->offset());

        foreach($eventos as $evento) {
            $evento->dia = Dias::find($evento->dia_eve_id);
            $evento->hora = Horas::find($evento->hor_eve_id);
            $evento->ponente = Ponentes::find($evento->pon_eve_id);
        }

        $router->render('admin/eventos/index',[
            'titulo' => 'Eventos',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
        if(!is_auth()){
            header('Location: /login');
            return;
        }

        $alertas = [];

        $dias = Dias::all('ASC');
        $horas = Horas::all('ASC');

        $evento = new Eventos;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()){
                header('Location: /login');
                return;
            }

            //Leer imagen
            
            
            if(!empty($_FILES['evento_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/eventos';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['evento_imagen']['tmp_name'])->fit(1600,900)->encode('png',95);
                $imagen_webp = Image::make($_FILES['evento_imagen']['tmp_name'])->fit(1600,900)->encode('webp',95);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['evento_imagen'] = $nombre_imagen;
            }
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if(empty($alertas)){
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                //Guardar en la BD
                $resultado = $evento->guardar();
                if($resultado){
                    header('Location: /admin/eventos');
                }
            }
        }
        
        $router->render('admin/eventos/crear',[
            'titulo' => 'Crear Evento',
            'alertas' => $alertas,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function actualizar(Router $router){
        if(!is_auth()){
            header('location: /login');
        }

        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/eventos');
            return;
        }

        $dias = Dias::all('ASC');
        $horas = Horas::all('ASC');

        $evento = Eventos::find($id);

        if(!$evento) {
            header('Location: /admin/eventos');
            return;
        }

        $evento->imagen_actual = $evento->evento_imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }

            if(!empty($_FILES['evento_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/eventos';
                //Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['evento_imagen']['tmp_name'])->fit(1600,900)->encode('png',95);
                $imagen_webp = Image::make($_FILES['evento_imagen']['tmp_name'])->fit(1600,900)->encode('webp',95);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['evento_imagen'] = $nombre_imagen;
            }else {
                $_POST['evento_imagen'] = $evento->imagen_actual;
            }

            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if(empty($alertas)){
                if(isset($nombre_imagen)){
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }
                //Guardar en la BD
                $resultado = $evento->guardar();
                if($resultado){
                    header('Location: /admin/eventos');
                }
            }
        }
        
        $router->render('admin/eventos/actualizar',[
            'titulo' => 'Actualizar Evento',
            'alertas' => $alertas,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento

        ]);
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $evento = Eventos::find($id);
            if(!isset($evento) ) {
                header('Location: /admin/eventos');
            }
            $resultado = $evento->eliminar();
            if($resultado) {
                header('Location: /admin/eventos');
            }
        }
    }
}


?>