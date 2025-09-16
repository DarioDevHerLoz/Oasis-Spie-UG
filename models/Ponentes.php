<?php 
namespace Model;

class Ponentes extends ActiveRecord {
    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['id', 'ponentes_nombre','ponentes_apellido', 'ponentes_habilidades','ponentes_imagen'];

    public $id;
    public $ponentes_nombre;
    public $ponentes_apellido;
    public $ponentes_habilidades;
    public $ponentes_imagen;
    public $imagen_actual;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->ponentes_nombre = $args['ponentes_nombre'] ?? null;
        $this->ponentes_apellido = $args['ponentes_apellido'] ?? null;
        $this->ponentes_habilidades = $args['ponentes_habilidades'] ?? null;
        $this->ponentes_imagen = $args['ponentes_imagen'] ?? null;
    }

    public function validar() {
        if(!$this->ponentes_nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->ponentes_apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->ponentes_imagen) {
            self::$alertas['error'][] = 'La Imagen es obligatoria';
        }
        if(!$this->ponentes_habilidades) {
            self::$alertas['error'][] = 'El Campo áreas es obligatorio';
        }
    
        return self::$alertas;
    }

    

}

?>