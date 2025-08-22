<?php 
namespace Model;

class Ponentes extends ActiveRecord {
    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['ponentes_id', 'ponentes_nombre','ponentes_apellido', 'ponentes_habilidades','ponentes_imagen'];

    public $id;
    public $ponentes_nombre;
    public $ponentes_apellido;
    public $ponentes_habilidades;
    public $ponentes_imagen;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->ponentes_nombre = $args['ponentes_nombre'] ?? null;
        $this->ponentes_apellido = $args['ponentes_apellido'] ?? null;
        $this->ponentes_habilidades = $args['ponentes_habilidades'] ?? null;
        $this->ponentes_imagen = $args['ponentes_imagen'] ?? null;
    }

}

?>