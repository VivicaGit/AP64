<?php

class CriaturaTerrestre extends Criatura {
    private $tipoTerreno;

    function __construct($nombre, $especie, $nivelPeligro, $salud, $tipoTerreno) {
        parent::__construct ($nombre, $especie, $nivelPeligro, $salud);
        $this->tipoTerreno = $tipoTerreno;
    }

    function getTipoTerreno() {
        return $this->tipoTerreno;
    }

    public function hacerSonido() {
        return "Hola, soy Antonio Lobato";
    }

}