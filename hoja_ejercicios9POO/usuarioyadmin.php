<?php
class Usuario {
    protected $nombre;
    protected $email;

    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function mostrarInfo() {
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Email: " . $this->email . "<br>";
    }
}

class Administrador extends Usuario {
    private $nivelAcceso;

    public function __construct($nombre, $email, $nivelAcceso) {
        parent::__construct($nombre, $email);
        $this->nivelAcceso = $nivelAcceso;
    }

    public function mostrarInfo() {
        parent::mostrarInfo();
        echo "Nivel de Acceso: " . $this->nivelAcceso . "<br>";
    }
}

// Prueba
$usuario = new Usuario("Juan Perez", "juan@example.com");
$admin = new Administrador("Ana Gomez", "ana@example.com", "SuperAdmin");

echo "Información del Usuario:<br>";
$usuario->mostrarInfo();

echo "<br>Información del Administrador:<br>";
$admin->mostrarInfo();
?>