<?php
    class Idioma{
        private $db;
        private $espanol, $ingles, $catalan, $euskera;

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

        public function obtenerTraducciones($idioma){
            $this->db->query("SELECT $idioma FROM idiomas");
    
            $resultados = $this->db->registros();
            return $resultados;
        }

    }
?>