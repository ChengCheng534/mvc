<?php

class Vehiculo {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function obtenerVehiculo() {
        $this->db->query("SELECT * from Usuarios");

        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarVehiculo($datos){
        $this->db->query("INSERT INTO vehiculo (MATRICULA, MARCA, MODELO, POTENCIA, VELOCIDAD_MAX, IMAGEN) VALUES (:matricula, :marca, :modelo, :potencia, :velocidad_max, :imagen)");

        // Vinculamos los valores
        $this->db->bind(":matricula", $datos["matricula"]);
        $this->db->bind(":marca", $datos["marca"]);
        $this->db->bind(":modelo", $datos["modelo"]);
        $this->db->bind(":modelo", $datos["potencia"]);
        $this->db->bind(":modelo", $datos["velocidad"]);
        $this->db->bind(":modelo", $datos["imagen"]);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>