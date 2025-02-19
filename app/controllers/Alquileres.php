<?php
class Alquileres extends Controlador{
    public function __construct() {
      //1) Acceso al modelo
      //$this->usuarioModelo = $this->modelo('Usuario');
      $this->alquilerModelo = $this->modelo('Alquiler');
    }

    public function index() {
        $obj = new Alquiler();
        $obj->alquiler_id = '';
        $obj->cliente_id = '';
        $obj->matricula = '';
        $obj->lugar_recogida = '';
        $obj->fecha_recogida = '';
        $obj->fecha_devolucion= '';
        $obj->precio= '';

        $datos =[
            'Vehiculos' => $obj,
            'fechaInicial' => '',
            'finalAlquiler' => '',
            'errorFechaInicial' => '',
            'erroeFechaArquiler' => '',
        ];

        $this->vista('paginas/home', $datos);
    }

    public function privada() {
        $datos = [
            'Login' => '',
            'Password' => '',
            'errorLogin' => '',
            'errorPassword' => '',
        ];
        $this->vista('paginas/sesion', $datos);
    }

    public function mostrarVehiculos() {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $datos =[
                'Vehiculos' => '',
                'fechaInicial' => trim($_POST['fecha_inicial']),
                'finalAlquiler' => trim($_POST['final_alquiler']),
                'errorFechaInicial' => '',
                'erroeFechaArquiler' => '',
            ];

            $vehiculoNoAlquilado = $this->alquilerModelo->vehiculosDisponibles($datos);
            $datos['Vehiculos'] = $vehiculoNoAlquilado;

            if(empty($_POST['fechaInicial'])){
                $datos['errorFechaInicial'] = "Introduce la fecha de inicial";
            }else{
                $datos['errorFechaInicial'] = '';
            }

            if(empty($_POST['finalAlquiler'])){
                $datos['erroeFechaArquiler'] = "Introduce la fecha de alquiler";
            }else{
                $datos['erroeFechaArquiler'] = '';
            }
            

            $this->vista('paginas/home', $datos); 
        }else{
            $vehiculoNoAlquilado = $this->alquilerModelo->obtenerVehiculos();
            $datos =[
                'Vehiculos' => '',
                'fechaInicial' => '',
                'finalAlquiler' => '',
            ];
            $datos['Vehiculos'] = $vehiculoNoAlquilado;

            $this->vista('paginas/home', $datos); 
        }
    }

    public function registrarCliente($matricula) {
        $datos = [
            'Login' => '',
            'Password' => '',
            'errorLogin' => '',
            'errorPassword' => '',
        ];
        $this->vista('paginas/registrar', $datos);
    }

    public function alquilarVehiculo() {
        $datos = [
            'Login' => '',
            'Password' => '',
            'errorLogin' => '',
            'errorPassword' => '',
        ];
        $this->vista('paginas/sesion', $datos);
    }

}