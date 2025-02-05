<?php
class Empleado {
    private $nombre;
    private $sueldo;
    private $puesto;

    public function __construct($nombre, $sueldo, $puesto) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->puesto = $puesto;
    }

    public function setSueldo($nuevoSueldo) {
        $this->sueldo = $nuevoSueldo;
    }

    public function getSueldo() {
        return $this->sueldo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPuesto() {
        return $this->puesto;
    }
}

class Manager extends Empleado {
    private $departamento;

    public function __construct($nombre, $sueldo, $puesto, $departamento) {
        parent::__construct($nombre, $sueldo, $puesto);
        $this->departamento = $departamento;
    }

    public function revisarEmpleado(Empleado $empleado) {
        echo "Revisando empleado: " . $empleado->getNombre() . ", Puesto: " . $empleado->getPuesto() . "\n";
    }
}

// Prueba
$empleado1 = new Empleado("Juan Perez", 3000, "Desarrollador");
$empleado2 = new Empleado("Ana Gomez", 3500, "Diseñadora");

$manager = new Manager("Carlos Lopez", 5000, "Gerente", "IT");

$manager->revisarEmpleado($empleado1);
$manager->revisarEmpleado($empleado2);

$empleado1->setSueldo(3200);
echo "Nuevo sueldo de " . $empleado1->getNombre() . ": " . $empleado1->getSueldo() . "\n";