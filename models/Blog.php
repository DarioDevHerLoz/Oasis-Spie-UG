<?php 
namespace Model;

class Blog extends ActiveRecord {
    protected static $tabla = 'blog';
    protected static $columnasDB = ['id','usu_blo_id','blog_titulo','blog_date', 'blog_contenido','blog_imagen','blog_colaboradores'];
    public $id;
    public $usu_blo_id;
    public $blog_titulo;
    public $blog_date;
    public $blog_contenido;
    public $blog_imagen;
    public $imagen_actual;
    public $blog_colaboradores;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->usu_blo_id = $args['usu_blo_id'] ?? null;
        $this->blog_titulo = $args['blog_titulo'] ?? null;
        $this->blog_date = date('Y/m/d');
        $this->blog_contenido = $args['blog_contenido'] ?? null;
        $this->blog_imagen = $args['blog_imagen'] ?? null;
        $this->blog_colaboradores = $args['blog_colaboradores'] ?? null;
    }

    public function validar(){
        if(!$this->blog_titulo){
            self::$alertas['error'][] = 'El Titulo del Blog es obligatorio';
        }

        if(!$this->blog_contenido){
            self::$alertas['error'][] = 'El Contenido del Blog es obligatorio';
        }

        if(!trim($this->blog_contenido)){
            self::$alertas['error'][] = 'El Contenido del Blog es obligatorio';
        }

        if(!$this->blog_imagen){
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        return self::$alertas;
    }
}

?>