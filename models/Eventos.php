<?php 
namespace Model;

class Eventos extends ActiveRecord {
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['eventos_id', 'pon_eve_id','dia_eve_id', 'hor_eve_id', 'eventos_nombre', 'eventos_disponibles', 'evento_aula','evento_fecha'];

    public $eventos_id;
    public $pon_eve_id;
    public $dia_eve_id;
    public $hor_eve_id;
    public $eventos_nombre;
    public $eventos_disponibles;
    public $evento_aula;
    public $evento_fecha;

    public function __construct($args = [])
    {
        $this->eventos_id = $args['dia_id'] ?? null;
        $this->pon_eve_id = $args['dia_nombre'] ?? null;
        $this->dia_eve_id = $args['dia_nombre'] ?? null;
        $this->hor_eve_id = $args['dia_nombre'] ?? null;
        $this->eventos_nombre = $args['dia_nombre'] ?? null;
        $this->eventos_disponibles = $args['dia_nombre'] ?? null;
        $this->evento_aula = $args['dia_nombre'] ?? null;
        $this->evento_fecha = $args['dia_nombre'] ?? null;

    }

}

?>