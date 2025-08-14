<?php 
namespace Model;

class Horas extends ActiveRecord {
    protected static $tabla = 'horas';
    protected static $columnasDB = ['hora_id', 'hora_hora'];

    public $hora_id;
    public $hora_hora;

    public function __construct($args = [])
    {
        $this->hora_id = $args['hora_id'] ?? null;
        $this->hora_hora = $args['hora_hora'] ?? null;
    }

}

?>