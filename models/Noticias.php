<?php 
namespace Model;

class Noticias extends ActiveRecord {
    protected static $tabla = 'noticias';
    protected static $columnasDB = ['noticias_id', 'usu_not_id','noticias_titulo', 'noticias_date','noticias_contenido','noticias_imagen','noticias_colaboradores'];

    public $noticias_id;
    public $usu_not_id;
    public $noticias_titulo;
    public $noticias_date;
    public $noticias_contenido;
    public $noticias_imagen;
    public $noticias_colaboradores;

    public function __construct($args = [])
    {
        $this->noticias_id = $args['noticias_id'] ?? null;
        $this->usu_not_id = $args['usu_not_id'] ?? null;
        $this->noticias_titulo = $args['noticias_titulo'] ?? null;
        $this->noticias_date = $args['noticias_date'] ?? null;
        $this->noticias_contenido = $args['noticias_contenido'] ?? null;
        $this->noticias_imagen = $args['noticias_imagen'] ?? null;
        $this->noticias_colaboradores = $args['noticias_colaboradores'] ?? null;
    }

}

?>