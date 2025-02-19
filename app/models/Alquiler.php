<?php
    class Alquiler{
        private $db;
        private $alquiler_id, $cliente_id, $matricula, $lugar_recogida, $fecha_recogida, $fecha_devolucion, $precio;

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

        public function obtenerVehiculos(){
            $this->db->query("SELECT * FROM vehiculo WHERE matricula IN (SELECT matricula FROM alquiler)");
    
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function vehiculosDisponibles($datos) {
            $this->db->query("SELECT * FROM vehiculo WHERE matricula NOT IN (SELECT matricula FROM alquiler WHERE fecha_devolucion >= :fecha_inicial)");
            // Vinculamos los valores
            $this->db->bind(":fecha_inicial", $datos["fechaInicial"]);
            //$this->db->bind(":final_alquiler", $datos["finalAlquiler"]);
    
            $resultados = $this->db->registros();
            return $resultados;
        }



    }
?>