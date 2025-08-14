<?php 
namespace Model;

class Blog extends ActiveRecord {
    protected static $tabla = 'blog';
    protected static $columnasDB = ['blog_id','usu_blo_id','blog_titulo','blog_date', 'blog_contenido','blog_imagen','blog_colaboradores'];
    public $blog_id;
    public $usu_blo_id;
    public $blog_titulo;
    public $blog_date;
    public $blog_contenido;
    public $blog_imagen;
    public $blog_colaboradores;

    public function __construct($args=[])
    {
        $this->blog_id = $args['blog_id'] ?? null;
        $this->usu_blo_id = $args['usu_blo_id'] ?? null;
        $this->blog_titulo = $args['blog_titulo'] ?? null;
        $this->blog_date = $args['blog_date'] ?? null;
        $this->blog_contenido = $args['blog_contenido'] ?? null;
        $this->blog_imagen = $args['blog_imagen'] ?? null;
        $this->blog_colaboradores = $args['blog_colaboradores'] ?? null;
    }

}

?>