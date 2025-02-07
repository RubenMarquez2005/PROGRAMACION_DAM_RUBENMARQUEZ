<?php
// Esta clase se encarga de la conexión a la base de datos.

class Conexion { //Clase para la conexión a la base de datos
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $password = 'curso';
    private $base_datos = 'gestion_tareas';
    public $conexion;

    public function __construct() { //Función para la conexión
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);

        if ($this->conexion->connect_error) { //Si hay un error en la conexión
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function cerrar() { //Función para cerrar la conexión
        $this->conexion->close();
    }
}
?>
