<?php 
namespace Model;

class Eventos extends ActiveRecord {
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'pon_eve_id','dia_eve_id', 'hor_eve_id', 'evento_nombre', 'evento_descripcion', 'evento_disponibles', 'evento_aula','evento_fecha','evento_imagen'];

    public $id;
    public $pon_eve_id;
    public $dia_eve_id;
    public $hor_eve_id;
    public $evento_nombre;
    public $evento_descripcion;
    public $evento_disponibles;
    public $evento_aula;
    public $evento_fecha;
    public $evento_imagen;
    public $imagen_actual;
    public $dia;
    public $hora;
    public $ponente;

    public function __construct($args = [])
    {
        $this->id = $args['eventos_id'] ?? null;
        $this->pon_eve_id = $args['pon_eve_id'] ?? null;
        $this->dia_eve_id = $args['dia_eve_id'] ?? null;
        $this->hor_eve_id = $args['hor_eve_id'] ?? null;
        $this->evento_nombre = $args['dia_nombre'] ?? null;
        $this->evento_descripcion = $args['evento_descripcion'] ?? null;
        $this->evento_disponibles = $args['eventos_disponibles'] ?? null;
        $this->evento_aula = $args['evento_aula'] ?? null;
        $this->evento_fecha = $args['evento_fecha'] ?? null;

    }

    public function validar() {
        if(!$this->evento_nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->evento_descripcion) {
            self::$alertas['error'][] = 'La descripción es Obligatoria';
        }

        if(!$this->evento_aula) {
            self::$alertas['error'][] = 'La Aula es Obligatoria';
        }

        if(!$this->evento_fecha) {
            self::$alertas['error'][] = 'La fecha es Obligatoria';
        }
        if(!$this->dia_eve_id  || !filter_var($this->dia_eve_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige el Día del evento';
        }
        if(!$this->hor_eve_id  || !filter_var($this->hor_eve_id, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Elige la hora del evento';
        }
        if(!$this->evento_disponibles  || !filter_var($this->evento_disponibles, FILTER_VALIDATE_INT)) {
            self::$alertas['error'][] = 'Añade una cantidad de Lugares Disponibles';
        }
        if(!$this->pon_eve_id || !filter_var($this->pon_eve_id, FILTER_VALIDATE_INT) ) {
            self::$alertas['error'][] = 'Selecciona la persona encargada del evento';
        }

        if(!$this->evento_imagen){
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }

        return self::$alertas;
    }

}

?>