<?php

class CriaturaMarina extends Criatura {
    private $metrosBuceo;

    function __construct($nombre, $especie, $nivelPeligro, $salud, $metrosBuceo) {
        parent::__construct ($nombre, $especie, $nivelPeligro, $salud);
        $this->metrosBuceo = $metrosBuceo;
    }

    function getMetrosBuceo() {
        return $this->metrosBuceo;
    }

    public function hacerSonido() {
        return "Gola, Glub glub";
    }

}