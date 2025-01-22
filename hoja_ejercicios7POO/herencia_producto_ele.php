<?php
class Producto { // Clase padre
    public $nombre; // Atributo
    public $precio; // Atributo
    public function mostrarDetalles(){ // Método
        echo "El producto $this->nombre cuesta $this->precio euros\n"; // Acción
    }
}
class Electrodomestico extends Producto{ // Clase hija
    public $consumo; // Atributo
    public function mostrarDetalles(){ // Método
        echo "El electrodoméstico $this->nombre cuesta $this->precio euros y tiene un voltaje de $this->consumo\n"; // Acción
    }
}
$miElectrodomestico = new Electrodomestico(); // Instanciamos la clase
$miElectrodomestico->nombre = "Lavadora"; // Asignamos valor al atributo
$miElectrodomestico->precio = 300; // Asignamos valor al atributo
$miElectrodomestico->consumo = "2.20 kWh"; // Asignamos valor al atributo
$miElectrodomestico->mostrarDetalles(); // Llamamos