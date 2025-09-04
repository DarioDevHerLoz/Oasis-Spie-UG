<?php 
namespace Model;

class Usuarios extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'usuario_nombre','usuario_apellido', 'usuario_correo','usuario_password'];

    public $id;
    public $usuario_nombre;
    public $usuario_apellido;
    public $usuario_correo;
    public $usuario_password;
    public $usuario_password_actual;
    public $usuario_password2;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario_nombre = $args['usuario_nombre'] ?? null;
        $this->usuario_apellido = $args['usuario_apellido'] ?? null;
        $this->usuario_correo = $args['usuario_correo'] ?? null;
        $this->usuario_password = $args['usuario_password'] ?? null;
        $this->usuario_password2 = $args['usuario_password2'] ?? null;
        $this->usuario_password_actual = $args['usuario_password_actual'] ?? null;
    }

    public function validar_login(){
        if(!$this->usuario_correo) {
            self::$alertas['error'][] = 'El Correo es Obligatorio';
        }
        if(!filter_var($this->usuario_correo, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        if(!$this->usuario_password){
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        return self::$alertas;
    }

    public function validar_usuario() {
        if(!$this->usuario_nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }

        if(!$this->usuario_apellido){
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }

        if(!$this->usuario_password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if(!$this->usuario_correo) {
            self::$alertas['error'][] = 'El Correo es Obligatorio';
        }
        if(!$this->usuario_password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->usuario_password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        if($this->usuario_password !== $this->usuario_password2){
            self::$alertas['error'][] = 'Los password son diferentes';
        }
        return self::$alertas;
    }

    public function validar_actualizar(){
        if(!$this->usuario_nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }

        if(!$this->usuario_apellido){
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }

        if(!$this->usuario_correo) {
            self::$alertas['error'][] = 'El Correo es Obligatorio';
        }

        if(!$this->usuario_password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if(!$this->usuario_password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->usuario_password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    public function validarEmail() {
        if(!$this->usuario_correo) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!filter_var($this->usuario_correo, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        return self::$alertas;
    }

    // Valida el Password 
    public function validarPassword() {
        if(!$this->usuario_password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->usuario_password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

   // Hashea el password
    public function hashPassword() : void {
        $this->usuario_password = password_hash($this->usuario_password, PASSWORD_BCRYPT);
    }

}

?>