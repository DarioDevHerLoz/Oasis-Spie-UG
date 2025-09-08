<?php 
namespace Model;

class Noticias extends ActiveRecord {
    protected static $tabla = 'noticias';
    protected static $columnasDB = ['id', 'usu_not_id','noticias_titulo', 'noticias_date','noticias_contenido','noticias_imagen','noticias_colaboradores'];

    public $id;
    public $usu_not_id;
    public $noticias_titulo;
    public $noticias_date;
    public $noticias_contenido;
    public $noticias_imagen;
    public $imagen_actual;
    public $noticias_colaboradores;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usu_not_id = $args['usu_not_id'] ?? null;
        $this->noticias_titulo = $args['noticias_titulo'] ?? null;
        $this->noticias_date = date('Y/m/d');
        $this->noticias_contenido = $args['noticias_contenido'] ?? null;
        $this->noticias_imagen = $args['noticias_imagen'] ?? null;
        $this->noticias_colaboradores = $args['noticias_colaboradores'] ?? null;
    }

    public function validar(){
        if(!$this->noticias_titulo){
            self::$alertas['error'][] = 'El Titulo de la Noticia es obligatorio';
        }

        if(!$this->noticias_contenido){
            self::$alertas['error'][] = 'El Contenido de la Noticia es obligatorio';
        }

        if(!trim($this->noticias_contenido)){
            self::$alertas['error'][] = 'El Contenido de la Noticia es obligatorio';
        }

        if(!$this->noticias_imagen){
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        return self::$alertas;
    }
}

?>