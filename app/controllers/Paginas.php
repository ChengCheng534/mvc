<?php
class Paginas extends Controlador{
    public function __construct() {
      //1) Acceso al modelo
      //$this->usuarioModelo = $this->modelo('Usuario');
      $this->clienteModelo = $this->modelo('Cliente');
    }

    public function index(){      
        $this->vista('paginas/home');
    }

    public function privada(){
      $this->vista('paginas/sesion');
    }

}
?>