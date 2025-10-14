<?php 
namespace Model;

class CalendarioAstronomico extends ActiveRecord {
    protected static $tabla = 'calendario';
    protected static $columnasDB = ['id', 'calendario_titulo','calendario_descripcion','calendario_fecha','calendario_imagen','calendario_color'];

    public $id;
    public $calendario_titulo;
    public $calendario_descripcion;
    public $calendario_fecha;
    public $calendario_imagen;
    public $calendario_color;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->calendario_titulo = $args['calendario_titulo'] ?? '';
        $this->calendario_descripcion = $args['calendario_descripcion'] ?? '';
        $this->calendario_fecha = $args['calendario_fecha'] ?? '';
        $this->calendario_imagen = $args['calendario_imagen'] ?? '';
        $this->calendario_color = $args['calendario_color'] ?? '';
    }

}

?>