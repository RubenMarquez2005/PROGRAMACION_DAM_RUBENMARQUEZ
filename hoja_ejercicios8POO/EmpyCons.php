<?php
class Empleado {
    public $nombre;
    public $sueldo;
    public $aniosExperiencia;
    public function __construct($nombre, $sueldo, $aniosExperiencia){
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->aniosExperiencia = $aniosExperiencia;
    }
    public function calcularBonus(){
        $bonus = 0.05;
        return $this->sueldo * $bonus * ($this->aniosExperiencia / 2);
    }
    public function mostrarDetalles(){
        echo "Nombre: $this->nombre\n";
        echo "Sueldo: $this->sueldo\n";
        echo "Años de experiencia: $this->aniosExperiencia\n";
    }
}

class Consultor extends Empleado {
    public $horasPorProyecto;
    public function __construct($nombre, $sueldo, $aniosExperiencia, $horasPorProyecto){ // Método 
        parent::__construct($nombre, $sueldo, $aniosExperiencia); // Llamamos 
        $this->horasPorProyecto = $horasPorProyecto; // Asignamos valor 
    }
    public function calcularBonus(){ // Calcular el bonus
        $bonus = 0.05;
        $bonusHoras = 0.02;
        if($this->horasPorProyecto > 100){
            return parent::calcularBonus() + $this->sueldo * $bonusHoras;
        } else {
            return parent::calcularBonus();
        }
    }
    public function mostrarDetalles(){
        parent::mostrarDetalles();
        echo "Horas por proyecto: $this->horasPorProyecto\n";
    }
}
$empleado = new Empleado("Juan", 1200, 5);
$empleado->mostrarDetalles();
echo "Bonus: " . $empleado->calcularBonus() . "\n";
$consultor = new Consultor("Pedro", 1500, 5, 120);
$consultor->mostrarDetalles();
echo "Bonus: " . $consultor->calcularBonus() . "\n";
