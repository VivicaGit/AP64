<?php

class CriaturaController {
    private $gestor;

    public function __construct() {
        $this->gestor = new Gestor();
    }

    public function index() {
        $criaturas = $this->gestor->read();
        include "views/listar.php";
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $especie = $_POST['especie'];
            $peligrosidad = $_POST['peligrosidad'];
            $salud = $_POST['salud'];
            $tipo = $_POST['tipo'];

            if ($peligrosidad > 10) {
                echo "La peligrosidad no puede ser mayor a 10";
                return;
            }

            if ($tipo === 'marina') {
                $profundidad = $_POST['profundidad']; 
                $criatura = new CriaturaMarina($nombre, $especie, $peligrosidad, $salud, $profundidad);
            } elseif ($tipo === 'terrestre') {
                $terreno = $_POST['terreno']; 
                $criatura = new CriaturaTerrestre($nombre, $especie, $peligrosidad, $salud, $terreno);
            } elseif ($tipo === 'voladora') {
                $envergadura = $_POST['envergadura']; 
                $criatura = new CriaturaVoladora($nombre, $especie, $peligrosidad, $salud, $envergadura);
            }

            $sonido = $criatura->hacerSonido();
            echo "<script>alert('$sonido');</script>";

            $this->gestor->create($criatura);

            // Redirección usando JS para que se vea el alert antes
            echo "<script>window.location.href='index.php';</script>";
        } else {
            include "views/crear.php";
        }
    }

    public function editar() {
        $nombre = $_GET['nombre'] ?? null;
        $criatura = $this->gestor->buscar($nombre);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->gestor->update($nombre, $_POST['peligrosidad'], $_POST['salud']);
            header("Location: index.php");
        } else {
            include "views/editar.php";
        }
    }

    public function eliminar() {
        $nombre = $_GET['nombre'] ?? null;
        $this->gestor->delete($nombre);
        header("Location: index.php");
    }
}