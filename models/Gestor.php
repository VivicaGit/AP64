<?php

class Gestor {
// create (Avistamiento) , read (Censo), buscar, update (Sanación), delate (Liberación)
    function __construct() {
        if (!isset ($_SESSION['criaturas'])) {
            $_SESSION['criaturas'] = [];
        } 
    }
 
    function create(Criatura $criatura) {
        $_SESSION['criaturas'][] = $criatura;
    }

    function read() {
        return $_SESSION['criaturas'];
    }
    
    function buscar($nombre) {
        foreach ($_SESSION['criaturas'] as $criatura) {
            if ($criatura->getNombre() === $nombre) {
                return $criatura;
            }
        }
        return null;
    }

    function update($nombre, $nivelPeligro, $salud) {
        foreach ($_SESSION['criaturas'] as $i => $criatura) {
            if ($criatura->getNombre() == $nombre) {
                $criatura->setNivelPeligro($nivelPeligro);
                $criatura->setSalud($salud);
            }
        }
    }

    public function delete($nombre) {
            foreach ($_SESSION['criaturas'] as $i => $criatura) {
                if ($criatura->getNombre() === $nombre) {
                    unset($_SESSION['criaturas'][$i]); 
                    $_SESSION['criaturas'] = array_values($_SESSION['criaturas']);
                    return true;
                }
            }
            return false;
        }
    }