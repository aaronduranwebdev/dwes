<?php

class Visita {

    private $tiempo;

    public function setTiempo($momento) {
        $this->tiempo = $momento;
    }

    public function __toString() {
        return "La última visita fue en $this->tiempo";
    }

}
