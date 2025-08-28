<?php 
namespace Model;

class Horas extends ActiveRecord {
    protected static $tabla = 'horas';
    protected static $columnasDB = ['id', 'hora_hora'];

    public $id;
    public $hora_hora;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->hora_hora = $args['hora_hora'] ?? null;
    }

    public function validar(){
        if(!$this->hora_hora){
            self::$alertas['error'][] = 'La Hora es Obligatoria';
        }
        return self::$alertas;
    }

}

?>