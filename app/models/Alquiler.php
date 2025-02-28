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
        
        public function obtenerTraducciones($idioma){
            $this->db->query("SELECT $idioma FROM idiomas");
    
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

        public function verificarCliente($datos){
            $this->db->query("SELECT * from cliente WHERE login=:login");

            $this->db->bind(":login", $datos['login']);
    
            $resultados = $this->db->registro();
            return $resultados;
        }

        public function obtenerVehiculo($matricula) {
            $this->db->query("SELECT * from vehiculo where MATRICULA=:matricula");
    
            $this->db->bind(":matricula", $matricula);
    
            $resultados = $this->db->registro();
            return $resultados;
        }

        public function agragarAlquiler($datos){
            $this->db->query("INSERT INTO alquiler (cliente_id, matricula, lugar_recogida, fecha_recogida, fecha_devolucion, precio) VALUES (:cliente_id, :matricula, :lugar_recogida, :fecha_recogida, :fecha_devolucion, :precio)");
    
            $precioLimpio = str_replace('€', '', $datos["precio"]); // Elimina el símbolo €
            $precioLimpio = floatval($precioLimpio); // Convierte a número decimal

            // Vinculamos los valores
            $this->db->bind(":cliente_id", $datos["cliente_id"]);
            $this->db->bind(":matricula", $datos["matricula"]);
            $this->db->bind(":lugar_recogida", $datos["lugar"]);
            $this->db->bind(":fecha_recogida", $datos["fechaInicial"]);
            $this->db->bind(":fecha_devolucion", $datos["fechaFinal"]);
            $this->db->bind(":precio", $precioLimpio);
    
            // Ejecutar la consulta
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }
?>