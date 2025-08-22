<?php 
namespace Model;

class Dias extends ActiveRecord {
    protected static $tabla = 'dias';
    protected static $columnasDB = ['id', 'dia_nombre'];

    public $id;
    public $dia_nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->dia_nombre = $args['dia_nombre'] ?? '';
    }

    public function validar() {
        if(!$this->dia_nombre) {
            self::$alertas['error'][] = 'El Dia es Obligatorio';
        }
        return self::$alertas;
    }

}

?>