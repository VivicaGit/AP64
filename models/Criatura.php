<?php
abstract class Criatura {
    protected $nombre;
    protected $especie;
    protected $nivelPeligro;
    protected $salud;
    
    function __construct($nombre, $especie, $nivelPeligro, $salud){
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->nivelPeligro = $nivelPeligro;
        $this->salud = $salud;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEspecie() {
        return $this->especie;
    }

    function getNivelPeligro() {
        return $this->nivelPeligro;
    }

    function getSalud() {
        return $this->salud;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEspecie($especie) {
        $this->especie = $especie;
    }

    function setNivelPeligro($nivelPeligro) {
        $this->nivelPeligro = $nivelPeligro;
    }

    function setSalud($salud) {
        $this->salud = $salud;
    }

    abstract public function hacerSonido();

}