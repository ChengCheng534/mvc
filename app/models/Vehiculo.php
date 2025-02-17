<?php

class Vehiculo {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function obtenerVehiculos() {
        $this->db->query("SELECT * from vehiculo");

        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerVehiculo($matricula) {
        $this->db->query("SELECT * from vehiculo where MATRICULA=:matricula");

        $this->db->bind(":matricula", $matricula);

        $resultados = $this->db->registro();
        return $resultados;
    }

    public function agregarVehiculo($datos){
        $this->db->query("INSERT INTO vehiculo (MATRICULA, MARCA, MODELO, POTENCIA, VELOCIDAD_MAX, IMAGEN) VALUES (:matricula, :marca, :modelo, :potencia, :velocidad_max, :imagen)");

        // Vinculamos los valores
        $this->db->bind(":matricula", $datos["matricula"]);
        $this->db->bind(":marca", $datos["marca"]);
        $this->db->bind(":modelo", $datos["modelo"]);
        $this->db->bind(":potencia", $datos["potencia"]);
        $this->db->bind(":velocidad_max", $datos["velocidad_max"]);
        $this->db->bind(":imagen", $datos["imagen"]);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function borrarVehiculo($matricula){
        $this->db->query("DELETE FROM vehiculo WHERE MATRICULA=:matricula");

        $this->db->bind(":matricula", $matricula);

        $resultados = $this->db->execute();
        return $resultados;
    }

}
?>