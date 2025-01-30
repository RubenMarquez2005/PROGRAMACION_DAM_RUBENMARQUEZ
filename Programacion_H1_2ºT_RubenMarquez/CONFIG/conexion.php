<?php
class Conexion {
    // Propiedades para la configuración de la conexión a la base de datos
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $password = 'curso';
    private $base_datos = 'streamweb';
    public $conexion;


    // Constructor que establece la conexión a la base de datos
    public function __construct() {
        // Crear una nueva conexión a la base de datos usando mysqli
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);


        // Verificar si hay algún error en la conexión
        if ($this->conexion->connect_error) {
            // Terminar el script si hay un error de conexión
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }


    // Función para cerrar la conexión a la base de datos
    public function cerrar() {
        $this->conexion->close();
    }
}
?>
