<?php
class Empleado{ // Clase padre
    public $nombre; // Atributo
    public $sueldo; // Atributo
    public function mostrarDetalles(){ // Método
        echo "El empleado $this->nombre tiene un sueldo de $this->sueldo\n"; // Acción
    }
}
class Gerente extends Empleado{ // Clase hija
    public $departamento; // Atributo
    public function mostrarDetalles(){ // Método
        echo "El gerente $this->nombre tiene un sueldo de $this->sueldo y trabaja en el departamento $this->departamento\n"; // Acción
    }
}
$miGerente = new Gerente(); // Instanciamos la clase
$miGerente->nombre = "Nick"; // Asignamos valor al atributo
$miGerente->sueldo = 5000; // Asignamos valor al atributo
$miGerente->departamento = "Recursos Humanos"; // Asignamos valor al atributo
$miGerente->mostrarDetalles(); // Llamamos
