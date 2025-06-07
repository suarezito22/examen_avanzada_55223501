<?php

include_once 'models/Nota.php';

class NotaController {
    private $nota;



    
    public function __construct($db) {
        $this->nota = new Nota($db);
    }


 
    public function registrarNota($estudiante, $descripcion, $nota) {

        $this->nota->estudiante = $estudiante;

        $this->nota->descripcion = $descripcion;

        $this->nota->nota = $nota;

        if ($this->nota->registrar()) {
            return "Nota registrada con éxito.";
        }

        return "Error al registrar la nota.";
    }




    
    public function listarNotas() {

        return $this->nota->listar();

    }

  



    public function obtenerPromedio() {

        return $this->nota->obtenerPromedio();

    }
}
