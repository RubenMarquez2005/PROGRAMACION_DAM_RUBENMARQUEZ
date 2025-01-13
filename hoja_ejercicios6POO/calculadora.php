<?php
// Creamos la clase
class Calculadora { // Clase
    public $num1; // Atributo
    public $num2; // Atributo
    public function sumar(){ // Método
        return $this->num1 + $this->num2; // Acción
    } 
    public function restar(){ // Método
        return $this->num1 - $this->num2; // Acción
    }
    public function multiplicar(){ // Método
        return $this->num1 * $this->num2; // Acción
    }
    public function dividir(){ // Método
        if ($this->num2 == 0){ // Condición
            return "No se puede dividir por 0"; // Acción
        }
        else{
            return $this->num1 / $this->num2; // Acción
        }
    }
}
$miCalculadora = new Calculadora(); // Instanciamos la claseS
$miCalculadora->num1 = 10; // Asignamos valor 
$miCalculadora->num2 = 5; // Asignamos valor
echo "La suma de los números es: ".$miCalculadora->sumar()."\n"; // Llamamos
echo "La resta de los números es: ".$miCalculadora->restar()."\n"; // Llamamos
echo "La multiplicación de los números es: ".$miCalculadora->multiplicar()."\n"; // Llamamos
echo "La división de los números es: ".$miCalculadora->dividir()."\n"; // Llamamos
?>