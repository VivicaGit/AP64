<?php

class CriaturaVoladora extends Criatura {
    private $envergadura;

    function __construct($nombre, $especie, $nivelPeligro, $salud, $envergadura) {
        parent::__construct ($nombre, $especie, $nivelPeligro, $salud);
        $this->envergadura = $envergadura;
    }

    function getEnvergadura() {
        return $this->envergadura;
    }

    public function hacerSonido() {
        return "Hola, soy Josevas";
    }

}