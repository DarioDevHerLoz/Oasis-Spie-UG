<?php 
namespace Model;

class Dias extends ActiveRecord {
    protected static $tabla = 'dias';
    protected static $columnasDB = ['dia_id', 'dia_nombre'];

    public $dia_id;
    public $dia_nombre;

    public function __construct($args = [])
    {
        $this->dia_id = $args['dia_id'] ?? null;
        $this->dia_nombre = $args['dia_nombre'] ?? null;
    }

}

?>