<?php

include_once 'models/Nota.php';

class NotaController {
    private $nota;

    public function __construct($db) {
        $this->nota = new Nota($db);
    }

    // Registrar una nueva nota
    public function registrarNota($estudiante, $descripcion, $nota) {
        $this->nota->estudiante = $estudiante;
        $this->nota->descripcion = $descripcion;
        $this->nota->nota = $nota;

        if ($this->nota->registrar()) {
            return "Nota registrada con éxito.";
        }

        return "Error al registrar la nota.";
    }

    // Listar todas las notas
    public function listarNotas() {
        $stmt = $this->nota->listar();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener el promedio de las notas
    public function obtenerPromedio() {
        return $this->nota->obtenerPromedio();
    }
}
