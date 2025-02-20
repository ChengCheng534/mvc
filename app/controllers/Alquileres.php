<?php
class Alquileres extends Controlador{
    public function __construct() {
      //1) Acceso al modelo
      //$this->usuarioModelo = $this->modelo('Usuario');
      $this->alquilerModelo = $this->modelo('Alquiler');
    }

    public function index() {
        $datos =[
            'Vehiculos' => new Alquiler(),
            'fechaInicial' => '',
            'finalAlquiler' => '',
            'errorFechaInicial' => '',
            'errorFechaArquiler' => '',
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
        $datos = [
            'Vehiculos' => new Alquiler(),
            'fechaInicial' => '',
            'finalAlquiler' => '',
            'errorFechaInicial' => '',
            'errorFechaArquiler' => '',
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoger datos del formulario
            $datos['fechaInicial'] = trim($_POST['fecha_inicial'] ?? '');
            $datos['finalAlquiler'] = trim($_POST['final_alquiler'] ?? '');
    
            // Validación de fechas
            if (empty($datos['fechaInicial'])) {
                $datos['errorFechaInicial'] = "Introduce la fecha inicial";
            }
    
            if (empty($datos['finalAlquiler'])) {
                $datos['errorFechaArquiler'] = "Introduce la fecha de alquiler";

            } elseif (!empty($datos['fechaInicial']) && $datos['finalAlquiler'] <= $datos['fechaInicial']) {
                $datos['errorFechaArquiler'] = "La fecha de alquiler debe ser mayor que la fecha inicial";
            }
    
            // Si no hay errores, buscar vehículos disponibles
            if (empty($datos['errorFechaInicial']) && empty($datos['errorFechaArquiler'])) {
                $datos['Vehiculos'] = $this->alquilerModelo->vehiculosDisponibles($datos);

                $this->vista('paginas/home', $datos);
            }

            //Si hay errores, vuelve a la pagina con errores
            $this->vista('paginas/home', $datos);
        }
    
        // Cargar la vista con los datos
        $this->vista('paginas/home', $datos);
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