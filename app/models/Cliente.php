<?php
    class Cliente{
        private $db;
        private $cliente_id, $documento_identidad, $nombre, $apellidos, $email, $telefono, $direccion, $fecha_nacimiento, $fotografia;

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

        public function obtenerClientes() {
            $this->db->query("SELECT * from Cliente");
    
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarClientes($datos){
            $this->db->query("INSERT INTO cliente (documento_identidad, nombre, apellidos, email, telefono, direccion, fecha_nacimiento, fotografia) VALUES (:documento_identidad, :nombre, :apellidos, :email, :telefono, :direccion, :fecha_nacimiento, :fotografia)");
    
            // Vinculamos los valores
            $this->db->bind(":documento_identidad", $datos["documento_identidad"]);
            $this->db->bind(":nombre", $datos["nombre"]);
            $this->db->bind(":apellidos", $datos["apellidos"]);
            $this->db->bind(":nombre", $datos["nombre"]);
            $this->db->bind(":email", $datos["email"]);
            $this->db->bind(":telefono", $datos["telefono"]);
            $this->db->bind(":direccion", $datos["direccion"]);
            $this->db->bind(":fecha_nacimiento", $datos["fecha_nacimiento"]);
            $this->db->bind(":fotografia", $datos["fotografia"]);
    
            // Ejecutar la consulta
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function obtenerCliente($cliente_id){
            $this->db->query("SELECT * from Cliente where cliente_id=$cliente_id");
    
            $resultados = $this->db->registro();
            return $resultados;
        }

        public function borrarCliente($cliente_id){
            $this->db->query("DELETE FROM Cliente WHERE cliente_id=$cliente_id");

            $resultados = $this->db->execute();
            return $resultados;
        }

        public function editarCliente($datos){
            //print_r($datos);
            $this->db->query("UPDATE cliente SET documento_identidad=:documento_identidad, nombre=:nombre, apellidos=:apellidos, email=:email, telefono=:telefono, direccion=:direccion, fecha_nacimiento=:fecha_nacimiento, fotografia=:fotografia WHERE cliente_id=:cliente_id");

            $this->db->bind(":cliente_id", $datos['Cliente']->cliente_id);
            $this->db->bind(":documento_identidad", $datos['Cliente']->documento_identidad);
            $this->db->bind(":nombre", $datos['Cliente']->nombre);
            $this->db->bind(":apellidos", $datos['Cliente']->apellidos);
            $this->db->bind(":email", $datos['Cliente']->email);
            $this->db->bind(":telefono", $datos['Cliente']->telefono);
            $this->db->bind(":direccion", $datos['Cliente']->direccion);
            $this->db->bind(":fecha_nacimiento", $datos['Cliente']->fecha_nacimiento);
            $this->db->bind(":fotografia", $datos['Cliente']->fotografia);
    
            // Ejecutar la consulta
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }
?>