<?php 
namespace Model;

class Integrantes extends ActiveRecord {
    protected static $tabla = 'integrantes';
    protected static $columnasDB = ['id', 'integrantes_nombre','integrantes_apellido', 'integrantes_rol','integrantes_correo','integrantes_imagen'];

    public $id;
    public $integrantes_nombre;
    public $integrantes_apellido;
    public $integrantes_rol;
    public $integrantes_correo;
    public $integrantes_imagen;
    public $imagen_actual;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->integrantes_nombre = $args['integrantes_nombre'] ?? null;
        $this->integrantes_apellido = $args['integrantes_apellido'] ?? null;
        $this->integrantes_rol = $args['integrantes_rol'] ?? null;
        $this->integrantes_correo = $args['integrantes_correo'] ?? null;
        $this->integrantes_imagen = $args['integrantes_imagen'] ?? null;
        $this->imagen_actual = $args['imagen_actual'] ?? null;
    }

    public function validar(){
        if(!$this->integrantes_nombre){
            self::$alertas['error'][] = 'El Nombre es obligatorio';
        }

        if(!$this->integrantes_apellido){
            self::$alertas['error'][] = 'El Apellido es obligatorio';
        }

        if(!$this->integrantes_rol){
            self::$alertas['error'][] = 'El Rol es obligatorio';
        }

        if(!$this->integrantes_correo){
            self::$alertas['error'][] = 'El Correo es obligatorio';
        }

        if(!$this->integrantes_imagen){
            self::$alertas['error'][] = 'El Nombre es obligatorio';
        }
        return self::$alertas;
    }

    
}

?>