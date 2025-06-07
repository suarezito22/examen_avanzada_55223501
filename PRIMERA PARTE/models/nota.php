<?php

class Nota {
    private $conn;
    private $table_name = "notas";

    public $id;
    public $estudiante;
    public $descripcion;
    public $nota;

    public function __construct($db) {
        $this->conn = $db;
    }

   
    public function registrar() {
        $query = "INSERT INTO " . $this->table_name . " (estudiante, descripcion, nota) VALUES (:estudiante, :descripcion, :nota)";
        $stmt = $this->conn->prepare($query);

        
        $this->estudiante = htmlspecialchars(strip_tags($this->estudiante));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->nota = htmlspecialchars(strip_tags($this->nota));

   
        $stmt->bindParam(":estudiante", $this->estudiante);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":nota", $this->nota);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function listar() {
        $query = "SELECT id, estudiante, descripcion, nota FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function obtenerPromedio() {
        $query = "SELECT AVG(nota) as promedio FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['promedio'] ?? 0; 
    }
}
