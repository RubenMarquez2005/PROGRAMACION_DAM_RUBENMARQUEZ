<?php
//Creamos las clases
class vehiculo{
    public $marca; // Atributo
    public function encender(){ // Método
        echo "El vehículo de la marca $this->marca está encendido\n"; // Acción
    } 
}
class Coche extends vehiculo{ // Clase hija
    public $modelo; // Atributo
    public function encender(){ // Método
        echo "El coche de la marca $this->marca y modelo $this->modelo está encendido\n"; // Acción
    }
}
$miCoche = new Coche(); // Instanciamos la clase
$miCoche->marca = "Mercedes"; // Asignamos valor al atributo
$miCoche->modelo = "Clase A"; // Asignamos valor al atributo
$miCoche->encender(); // Llamamos al método para que realice la acción