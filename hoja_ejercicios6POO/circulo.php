<?php
class circulo{ // Clase
    public $radio;  // Atributo
    public function calcularArea(){ // Método
        $area = 3.1416 * pow($this->radio, 2); // Acción
        echo "El área del círculo es $area\n"; // Acción
    }
}
$miCirculo = new circulo(); // Instanciamos la clase
$miCirculo->radio = 5; // Asignamos valor
$miCirculo->calcularArea(); // Llamamos
