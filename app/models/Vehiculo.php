<?php

class Vehiculo {
    private $db;
    private $MATRICULA, $MARCA, $MODELO, $POTENCIA, $VELOCIDAD_MAX, $IMAGEN;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function __get($propiedad) {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }

    public function __set($propiedad, $valor) {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
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

    public function editarVehiculo($datos){
        //print_r($datos);
        $this->db->query("UPDATE vehiculo SET MARCA=:marca, MODELO=:modelo, POTENCIA=:potencia, VELOCIDAD_MAX=:velocidad_max, IMAGEN=:imagen WHERE MATRICULA=:matricula");

        $this->db->bind(":matricula", $datos['vehiculo']->MATRICULA);
        $this->db->bind(":marca", $datos['vehiculo']->MARCA);
        $this->db->bind(":modelo", $datos['vehiculo']->MODELO);
        $this->db->bind(":potencia", $datos['vehiculo']->POTENCIA);
        $this->db->bind(":velocidad_max", $datos['vehiculo']->VELOCIDAD_MAX);
        $this->db->bind(":imagen", $datos['vehiculo']->IMAGEN);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
?>