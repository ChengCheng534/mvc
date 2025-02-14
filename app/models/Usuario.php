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
    

    public function obtenerDatos($login){
        $this->db->query("SELECT PASSWORD from usuario where LOGIN=:usuario and GRUPO='admin'");
        $this->db->bind(":usuario", $login);
        
        $resultados = $this->db->registro();        
        
        return $resultados;
    }

    public function obtenerPerfil($login){
        $this->db->query("SELECT GRUPO from usuario where LOGIN=:usuario");
        $this->db->bind(":usuario", $login);
        
        $resultados = $this->db->registro();        
        
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