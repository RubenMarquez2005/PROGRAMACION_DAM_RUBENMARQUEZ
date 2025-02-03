<?php
class CuentaBancaria { // Clase CuentaBancaria
    public $titular; // Atributo
    public $saldo; // Atributo
    public $tipoDeCuenta; // Atributo
    public function __construct($titular, $saldo, $tipoDeCuenta){ // Método 
        $this->titular = $titular; // Asignamos valor 
        $this->saldo = $saldo;  // Asignamos valor 
        $this->tipoDeCuenta = $tipoDeCuenta; // Asignamos valor 
    }
    public function depositar($cantidad){ // Método para depositar
        $this->saldo += $cantidad; // Acción
    }
    public function retirar($cantidad){ // Método para retirar
        $this->saldo -= $cantidad; // Acción
    }
    public function mostrarInfo(){ // Método para mostrar información
        echo "Titular: $this->titular\n"; // Acción
        echo "Saldo: $this->saldo\n"; // Acción
        echo "Tipo de cuenta: $this->tipoDeCuenta\n"; // Acción
    }
    
}
$cuenta = new CuentaBancaria("Juan", 1000, "Corriente"); // Instanciamos la clase
$cuenta->depositar(500); // Llamamos, es lo que vamos a hacer
$cuenta->retirar(200); // Llamamos, es lo que vamos a hacer
$cuenta->mostrarInfo(); // Llamamos, es lo que vamos a hacer


