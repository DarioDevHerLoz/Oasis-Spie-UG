<?php 
namespace Model;

class Integrantes extends ActiveRecord {
    protected static $tabla = 'integrantes';
    protected static $columnasDB = ['integrantes_id', 'integrantes_nombre','integrantes_apellido', 'integrantes_rol','integrantes_correo'];

    public $integrantes_id;
    public $integrantes_nombre;
    public $integrantes_rol;
    public $integrantes_correo;

    public function __construct($args = [])
    {
        $this->integrantes_id = $args['integrantes_id'] ?? null;
        $this->integrantes_nombre = $args['integrantes_nombre'] ?? null;
        $this->integrantes_rol = $args['integrantes_rol'] ?? null;
        $this->integrantes_correo = $args['integrantes_correo'] ?? null;
    }

}

?>