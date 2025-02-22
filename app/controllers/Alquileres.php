<?php
class Alquileres extends Controlador{
    public function __construct() {
      //1) Acceso al modelo
      //$this->usuarioModelo = $this->modelo('Usuario');
      $this->clienteModelo = $this->modelo('Cliente');
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

    public function alquilarVehiculo($info) {
        $arrayInfo = explode(",", $info);
        
        $datos = [
            'login' => '',
            'password' => '',
            'errorLogin' => '',
            'errorPassword' => '',
            'errorCliente' => '',
            'matricula' => $arrayInfo[0] ?? '',
            'fecha_inicial' => $arrayInfo[1] ?? '',
            'fecha_final' => $arrayInfo[2] ?? '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos['matricula'] = trim($_POST['matricula'] ?? '');
            $datos['fecha_inicial'] = trim($_POST['fecha_inicial'] ?? '');
            $datos['fecha_final'] = trim($_POST['fecha_final'] ?? '');

            $matricula = $datos['matricula'];

            $fecha_inicial = new DateTime($datos['fecha_inicial']);
            $fecha_final = new DateTime($datos['fecha_final']);

            $diferencia = $fecha_inicial->diff($fecha_final);
            $datos['dias'] = $diferencia->days;


            if (empty($_POST["login"])) {
                $datos['errorLogin'] = "El login es obrigatorio";
            } else {
                $datos['login'] = trim($_POST['login'] ?? '');
                
                if (!preg_match("/^[a-zA-Z-' ]*$/", $datos['login'])) {
                    $datos['errorLogin'] = "El formato de login es incorrecto";
                }
            }

            if (empty($_POST['password'])) {
                $datos['errorPassword'] = "El password es obrigatorio";
            } else {
                $datos['password'] = trim($_POST['password'] ?? '');
                
                if (!preg_match("/^[a-zA-Z0-9]+$/", $datos['password'])) {
                    $datos['errorPassword'] = "El formato de password es incorrecto";
                }
            }

            if (empty($datos['errorLogin']) && empty($datos['errorPassword'])) {
                //Verificar que el cliente existe
                $cliente = $this->alquilerModelo->verificarCliente($datos);
                $vehiculo = $this->alquilerModelo->obtenerVehiculo($matricula);

                $datos['cliente'] = $cliente;
                $datos['vehiculo'] = $vehiculo;

                if ($cliente) {
                    //sacar el hash de cliente
                    $hash = $cliente->password;

                    if (password_verify($datos['password'], $hash)) {
                        //$datos['precioTotal'] =;
                       
                        $this->vista('alquilar/factura', $datos);
                        return;
                    }else{
                        $datos['errorPassword'] = "El password es incorrecto";
                    }
                }else{
                    $datos['errorCliente'] = "No eres clientes, no está registrado";
                }
            }

            //Si hay errores, vuelve a la pagina con errores
            $this->vista('alquilar/iniciarSesion', $datos);
        }

        $this->vista('alquilar/iniciarSesion', $datos);
    }

    public function calcularPrecio(){

    }
}