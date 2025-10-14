<?php
namespace Controllers;

use Model\CalendarioAstronomico;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class CalendarioController {

    public static function index(Router $router){

        $router->render('admin/calendario/index',[
            'titulo' => 'Calendario Astronomico'
        ]);
    }

    public static function eventos() {
        $evento_astronomico = CalendarioAstronomico::all();

        $eventos = [];

        foreach ($evento_astronomico as $evento) {
            $eventos[] = [
                "id"          => $evento->id,
                "title"       => $evento->calendario_titulo,
                "descripcion" => $evento->calendario_descripcion,
                "start"       => $evento->calendario_fecha,
                "end"         => $evento->calendario_fecha,
                "allDay"      => true,
                "color"       => $evento->calendario_color,
                "textColor"   => "#FFFFFF",
                "imagen"      => !empty($evento->calendario_imagen) ? '/img/calendario/' . $evento->calendario_imagen : null
            ];
        }

        echo json_encode($eventos);
    }


    public static function crear(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_FILES['calendario_imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/calendario';
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }
                $imagen_png = Image::make($_FILES['calendario_imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['calendario_imagen']['tmp_name'])->fit(800,800)->encode('webp',80);
                
                $nombre_imagen = md5(uniqid(rand(),true));

                $_POST['calendario_imagen'] = $nombre_imagen;

            }
            $evento_astronomico = new CalendarioAstronomico($_POST);
            $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
            $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
            $resultado =  $evento_astronomico->guardar();
            if($resultado){
                $respuesta = [
                    'tipo' => 'exito',
                    'id' => $resultado['id'] ?? null,
                    'mensaje' => 'Evento Creado Correctamente'
                ];
            } else {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Problema al guardar el evento'
                ];
            }
            echo json_encode($respuesta);            
        }
    }

    public static function actualizar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            // Obtener el evento existente
            $id = $_POST['id'] ?? null;
            
            $evento_astronomico = CalendarioAstronomico::find($id);
            
            if(!$evento_astronomico){
                echo json_encode([
                    'tipo' => 'error',
                    'mensaje' => 'Evento no encontrado'
                ]);
                exit;
            }

            $carpeta_imagenes = '../public/img/calendario';
            if(!is_dir($carpeta_imagenes)){
                mkdir($carpeta_imagenes, 0755, true);
            }

            $nombre_imagen = $evento_astronomico->calendario_imagen; // nombre actual
            $imagen_png = null;
            $imagen_webp = null;

            // Si viene nueva imagen en el FormData
            if(!empty($_FILES['calendario_imagen']['tmp_name'])){
                
                // Generar nuevo nombre único
                $nombre_imagen = md5(uniqid(rand(), true));

                // Procesar nuevas imágenes
                $imagen_png = Image::make($_FILES['calendario_imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['calendario_imagen']['tmp_name'])->fit(800,800)->encode('webp',80);

                // Eliminar imágenes viejas si existen
                $ruta_png_antigua = $carpeta_imagenes . '/' . $evento_astronomico->calendario_imagen . ".png";
                $ruta_webp_antigua = $carpeta_imagenes . '/' . $evento_astronomico->calendario_imagen . ".webp";

                if(file_exists($ruta_png_antigua)) unlink($ruta_png_antigua);
                if(file_exists($ruta_webp_antigua)) unlink($ruta_webp_antigua);

                // Actualizar el POST con el nuevo nombre
                $_POST['calendario_imagen'] = $nombre_imagen;
            } else {
                // Mantener el nombre anterior en caso de no subir nueva imagen
                $_POST['calendario_imagen'] = $nombre_imagen;
            }

            // Actualizar datos del evento
            $evento_astronomico->sincronizar($_POST);
            $resultado = $evento_astronomico->guardar();

            if($resultado){
                // Guardar nuevas imágenes solo si se subieron
                if($imagen_png && $imagen_webp){
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }

                $respuesta = [
                    'tipo' => 'exito',
                    'id' => $id,
                    'mensaje' => 'Evento actualizado correctamente'
                ];
            } else {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Problema al actualizar el evento'
                ];
            }

            echo json_encode($respuesta);
        }
    }


    public static function eliminar(){
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $evento_astronomico = CalendarioAstronomico::find($id);
            if(!isset($evento_astronomico)){
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'No se encuentra ese Evento'
                ];
                echo json_encode($respuesta);
            }else {
                $resultado = $evento_astronomico->eliminar();
                if(!$resultado){
                    $respuesta = [
                        'tipo' => 'error',
                        'mensaje' => 'No se Puede Eliminar ese Evento'
                    ];
                    echo json_encode($respuesta);
                }else {
                    $respuesta = [
                        'tipo' => 'exito',
                        'mensaje' => 'Evento Eliminado Correctamente'
                    ];
                    echo json_encode($respuesta);
                }
            }
         }
    }

}

?>