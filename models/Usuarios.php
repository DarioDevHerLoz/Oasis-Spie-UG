<?php 
namespace Model;

class Usuarios extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['usuario_id', 'usuario_nombre','usuario_apellido', 'usuario_password','usuario_rol'];

    public $usuario_id;
    public $usuario_nombre;
    public $usuario_apellido;
    public $usuario_password;
    public $usuario_rol;


    public function __construct($args = [])
    {
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->usuario_nombre = $args['usuario_nombre'] ?? null;
        $this->usuario_apellido = $args['usuario_apellido'] ?? null;
        $this->usuario_password = $args['usuario_password'] ?? null;
        $this->usuario_rol = $args['usuario_rol'] ?? null;
    }

}

?>