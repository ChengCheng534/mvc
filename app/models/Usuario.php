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
        $this->db->query("SELECT PASSWORD, GRUPO from usuario where LOGIN=:usuario");
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

    public function editarVehiculo($datos){
        $this->db->query("UPDATE vehiculo SET documento_identidad=:documento_identidad, nombre=:nombre, apellidos=:apellidos, email=:email, telefono=:telefono, direccion=:direccion, fecha_nacimiento=:fecha_nacimiento, fotografia=:fotografia WHERE cliente_id=:cliente_id");

        // Vinculamos los valores
        $this->db->bind(":cliente_id", $datos['Cliente']->cliente_id);
        $this->db->bind(":documento_identidad", $datos['Cliente']->documento_identidad);
        $this->db->bind(":nombre", $datos['Cliente']->nombre);
        $this->db->bind(":apellidos", $datos['Cliente']->apellidos);
        $this->db->bind(":email", $datos['Cliente']->email);
        $this->db->bind(":telefono", $datos['Cliente']->telefono);

        // Ejecutar la consulta
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>