<?php

namespace Model;

class EventoHorario extends ActiveRecord {
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'evento_aula', 'evento_fecha','dia_eve_id', 'hor_eve_id'];

    public $id;
    public $evento_aula;
    public $evento_fecha;
    public $dia_eve_id;
    public $hor_eve_id;
}