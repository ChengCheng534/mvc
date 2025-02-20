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

    public function alquilarVehiculo($matricula){
        $datos = [
            'nombre' => '',
            'apellidos' => '',
            'email' => '',
            'errorNombre' => '',
            'errorApellidos' => '',
            'errorEmail' => '',
            'errorCliente' => '',
            'matricula' => $matricula,
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (empty($_POST["nombre"])) {
                $datos['errorNombre'] = "Introduce tu nombre";
            } else {
                $datos['nombre'] = trim($_POST['nombre'] ?? '');
                
                if (!preg_match("/^[a-zA-Z-' ]*$/", $datos['nombre'])) {
                    $datos['errorNombre'] = "El formato de nombre es incorrecto";
                }
            }

            if (empty($_POST['apellidos'])) {
                $datos['errorApellidos'] = "Introduce tus apellidos";
            } else {
                $datos['apellidos'] = trim($_POST['apellidos'] ?? '');
                
                if (!preg_match("/^[a-zA-Z-' ]+$/", $datos['apellidos'])) {
                    $datos['errorApellidos'] = "El formato de apellido es incorrecto";
                }
            }
              
            if (empty($_POST["email"])) {
                $datos['errorEmail'] = "Introduce el correo";
            } else {
                $datos['email'] = trim($_POST['email'] ?? '');
                
                if (!preg_match("/^[a-zA-Z][a-zA-Z0-9@]*@[a-zA-Z0-9.-]+\.com$/", $datos['email'])) {
                    $datos['errorEmail'] = "El formato de correo es incorrecto";
                }
            }

            // Si no hay errores, buscar vehículos disponibles
            if (empty($datos['errorNombre']) && empty($datos['errorApellidos']) && empty($datos['errorEmail']) ) {
                $nombre = $datos['nombre'];
                $apellidos = $datos['apellidos'];
 
                $datos['cliente'] = $this->alquilerModelo->verificarCliente($nombre);

                /*
                if ($clientes) {
                    $datos['errorCliente'] = "Eres cliente";
                    $this->vista('alquilar/factura', $datos);
                    return;
                }else{
                    $datos['errorCliente'] = "No eres clientes";
                }
                */
                
            }

            //Si hay errores, vuelve a la pagina con errores
            $this->vista('alquilar/registrar', $datos);
        }

        $this->vista('alquilar/registrar', $datos);
    }

    public function alquilarVehiculo1($matricula) {
        $datos = [
            'nombre' => '',
            'apellidos' => '',
            'email' => '',
            'errorNombre' => '',
            'errorApellidos' => '',
            'errorEmail' => '',
            'errorCliente' => '',
            'matricula' => $matricula,
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (empty($_POST["nombre"])) {
                $datos['errorNombre'] = "Introduce tu nombre";
            } else {
                $datos['nombre'] = trim($_POST['nombre'] ?? '');
                
                if (!preg_match("/^[a-zA-Z-' ]*$/", $datos['nombre'])) {
                    $datos['errorNombre'] = "El formato de nombre es incorrecto";
                }
            }

            if (empty($_POST['apellidos'])) {
                $datos['errorApellidos'] = "Introduce tus apellidos";
            } else {
                $datos['apellidos'] = trim($_POST['apellidos'] ?? '');
                
                if (!preg_match("/^[a-zA-Z-' ]+$/", $datos['apellidos'])) {
                    $datos['errorApellidos'] = "El formato de apellido es incorrecto";
                }
            }
              
            if (empty($_POST["email"])) {
                $datos['errorEmail'] = "Introduce el correo";
            } else {
                $datos['email'] = trim($_POST['email'] ?? '');
                
                if (!preg_match("/^[a-zA-Z][a-zA-Z0-9@]*@[a-zA-Z0-9.-]+\.com$/", $datos['email'])) {
                    $datos['errorEmail'] = "El formato de correo es incorrecto";
                }
            }

            // Si no hay errores, buscar vehículos disponibles
            if (empty($datos['errorNombre']) && empty($datos['errorApellidos']) && empty($datos['errorEmail']) ) {
                $nombre = $datos['nombre'];
                $apellidos = $datos['apellidos'];
 
                $datos['cliente'] = $this->alquilerModelo->verificarCliente($nombre);

                /*
                if ($clientes) {
                    $datos['errorCliente'] = "Eres cliente";
                    $this->vista('alquilar/factura', $datos);
                    return;
                }else{
                    $datos['errorCliente'] = "No eres clientes";
                }
                */
                return;
            }

            //Si hay errores, vuelve a la pagina con errores
            $this->vista('alquilar/registrar', $datos);
        }

        $this->vista('alquilar/registrar', $datos);
    }

}