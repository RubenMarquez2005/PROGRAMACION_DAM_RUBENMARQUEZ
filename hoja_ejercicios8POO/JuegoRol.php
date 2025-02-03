<?php
class Personaje {
    public $nombre;
    public $nivel;
    public $puntosVida;
    public $puntosAtaque;

    public function __construct($nombre, $nivel = 1, $puntosVida = 100, $puntosAtaque = 10) {
        $this->nombre = $nombre;
        $this->nivel = $nivel;
        $this->puntosVida = $puntosVida;
        $this->puntosAtaque = $puntosAtaque;
    }

    public function atacar(Personaje $objetivo) {
        $objetivo->puntosVida -= $this->puntosAtaque;
        echo "{$this->nombre} ataca a {$objetivo->nombre} y le causa {$this->puntosAtaque} puntos de daño.\n";
    }

    public function curarse() {
        $this->puntosVida += 20;
        echo "{$this->nombre} se cura y recupera 20 puntos de vida.\n";
    }

    public function subirNivel() {
        $this->nivel++;
        $this->puntosAtaque += 5;
        $this->puntosVida += 10;
        echo "{$this->nombre} sube al nivel {$this->nivel}. Puntos de ataque: {$this->puntosAtaque}, Puntos de vida: {$this->puntosVida}.\n";
    }
}

// Creación personajes
$personaje1 = new Personaje("Guerrero");
$personaje2 = new Personaje("Mago");

// Simulación 
$personaje1->atacar($personaje2);
$personaje2->curarse();
$personaje2->atacar($personaje1);
$personaje1->subirNivel();
$personaje1->atacar($personaje2);
$personaje2->subirNivel();
$personaje2->atacar($personaje1);
$personaje1->curarse();
$personaje1->atacar($personaje2);
$personaje2->curarse();
$personaje2->atacar($personaje1);
?>