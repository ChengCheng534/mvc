<?php
    
class Usuario {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function obtenerUsuarios() {
        $this->db->query("SELECT * from usuario");

        $resultados = $this->db->registros();
        return $resultados;
    }

    public function obtenerLogin($Login){
        $this->db->query("SELECT * from usuario where LOGIN=$Login");
         
        $resultados = $this->db->registro();
        return $resultados;
    }

    public function obtenerLoginPassword(){
        $this->db->query("SELECT LOGIN, PASSWORD from usuario");

        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarUsuario($datos){
        $this->db->query("INSERT INTO usuario (nombre, email, telefono) VALUES (:nombre, :email, :telefono)");

        // Vinculamos los valores
        $this->db->bind(":nombre", $datos["nombre"]);
        $this->db->bind(":email", $datos["email"]);
        $this->db->bind(":telefono", $datos["telefono"]);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>