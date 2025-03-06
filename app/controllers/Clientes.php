<?php
class Clientes extends Controlador{
    public function __construct() {
        session_start(); // Iniciar sesión si no está iniciada
        //1) Acceso al modelo

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario_logueado'])) {
            $this->vista('paginas/');
        }

        $this->clienteModelo = $this->modelo('Cliente');
    }

    public function index1() {
        // Si está autenticado, proceder con la obtención de los clientes
        $clientes = $this->clienteModelo->obtenerClientes();
        $datos = [
            'Clientes' => $clientes
        ];

        // Cargar la vista con los datos de los clientes
        $this->vista('clientes/inicio', $datos);
        
    }

    public function index() {
        // Iniciar la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario_logueado'])) {
            // Si no está autenticado, redirigirlo al login
            header('Location: ' . RUTA_URL . '/usuarios/login');
            exit;
        }
    
        // Si está autenticado, obtener los clientes
        $clientes = $this->clienteModelo->obtenerClientes();
        $datos = [
            'Clientes' => $clientes
        ];
    
        // Cargar la vista con los datos de los clientes
        $this->vista('clientes/Inicio', $datos);
    }
    
    
    //Ejercicios 3
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $datos =[
                'documento_identidad'=> trim($_POST['documento_identidad']),
                'nombre'=> trim($_POST['nombre']),
                'apellidos'=> trim($_POST['apellidos']),
                'email'=> trim($_POST['email']),
                'telefono'=> trim($_POST['telefono']),
                'direccion'=> trim($_POST['direccion']),
                'fecha_nacimiento'=> trim($_POST['fecha_nacimiento']),
                'fotografia'=> trim($_POST['fotografia']),
                'login'=> trim($_POST['login']),
                'password'=> trim($_POST['password']),
            ];
                if(empty($_POST['documento_identidad'])){
                    $datos['errorIdent'] = "El campo de documento identidad es requerido";
                }else{
                    $datos['errorIdent'] = '';
                }
    
                if(empty($_POST['nombre'])){
                    $datos['errorNombre'] = "El campo de nombre es requerido";
                }else{
                    $datos['errorNombre'] = '';
                }
    
                if(empty($_POST['apellidos'])){
                    $datos['errorApellidos'] = "El campo de apellidos es requerido";
                }else{
                    $datos['errorApellidos'] = '';
                }

                if(empty($_POST['login'])){
                    $datos['errorLogin'] = "El campo de Login es requerido";
                }else{
                    $datos['errorLogin'] = '';
                }

                if(empty($_POST['password'])){
                    $datos['errorPassword'] = "El campo de passsword es requerido";
                }else{
                    $datos['errorPassword'] = '';
                }

                if(empty($_POST['telefono'])){
                    $datos['telefono'] = 000000000;
                }
            
                if ($datos['errorIdent']=='' && $datos['errorNombre']=='' && $datos['errorApellidos']=='' && $datos['errorLogin']=='' && $datos['errorPassword']=='') {
                    $datos['password'] = password_hash($datos['password'], PASSWORD_DEFAULT);
                    if ($this->clienteModelo->agregarClientes($datos)){
                        redireccionar('/clientes');
                    } 
                }
                $this->vista('clientes/agregar', $datos);                
            
        } else {
            $datos =[
                'documento_identidad'=> '',
                'nombre'=> '',
                'apellidos'=> '',
                'email'=> '',
                'telefono'=> '',
                'direccion'=> '',
                'fecha_nacimiento'=> '',
                'login'=> '',
                'password'=>'',
                'fotografia'=> '', 
                'errorId' =>'', 
                'errorIdent' =>'',
                'errorNombre' =>'',
                'errorApellidos' =>'',
                'errorLogin'=> '',
                'errorPassword'=> '',
            ];
            $this->vista('clientes/agregar', $datos);
        }
    }

    public function visualizarBorrado($cliente_id){
        //echo "Eliminar el cliente con el ID => ".$cliente_id;
        $arrayCliente = $this->clienteModelo->obtenerCliente($cliente_id);

        $datos =[
            'Clientes'=> $arrayCliente // Array con todos los Clientes
        ];
        $this->vista('clientes/visualizar', $datos);
    }

    public function borrar($cliente_id){
        $arrayCliente = $this->clienteModelo->borrarCliente($cliente_id);
        $clientesActual = $this->clienteModelo->obtenerClientes();

        $datos =[
            'Clientes'=> $clientesActual
        ];
        $this->vista('clientes/inicio', $datos);
    }

    public function visualizarEditar($cliente_id){
        $arrayCliente = $this->clienteModelo->obtenerCliente($cliente_id);

        $datos =[
            'Cliente'=> $arrayCliente,
            'errorIdent' =>'',
            'errorNombre' =>'',
            'errorApellidos' =>'',
        ];

        $this->vista('clientes/editar', $datos);
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $obj = new Cliente();
            $obj->cliente_id = trim($_POST['cliente_id']);
            $obj->documento_identidad = trim($_POST['documento_identidad']);
            $obj->nombre=trim($_POST['nombre']);
            $obj->apellidos=trim($_POST['apellidos']);
            $obj->email=trim($_POST['email']);
            $obj->telefono=trim($_POST['telefono']);
            $obj->direccion=trim($_POST['direccion']);
            $obj->fecha_nacimiento=trim($_POST['fecha_nacimiento']);
            $obj->fotografia=trim($_POST['fotografia']);

            $datos =[
                'Cliente'=>$obj,
                'errorIdent' =>'',
                'errorNombre' =>'',
                'errorApellidos' =>'',
            ];

                if(empty($_POST['documento_identidad'])){
                    $datos['errorIdent'] = "El campo de documento identidad es requerido";
                }else{
                    $datos['errorIdent'] = '';
                }
    
                if(empty($_POST['nombre'])){
                    $datos['errorNombre'] = "El campo de nombre es requerido";
                }else{
                    $datos['errorNombre'] = '';
                }
    
                if(empty($_POST['apellidos'])){
                    $datos['errorApellidos'] = "El campo de apellidos es requerido";
                }else{
                    $datos['errorApellidos'] = '';
                }
            
                if ($datos['errorIdent']=='' && $datos['errorNombre']=='' && $datos['errorApellidos']=='') {
                    if ($this->clienteModelo->editarCliente($datos)){
                        redireccionar('/clientes');
                    } 
                }
                $this->vista('clientes/editar', $datos);                
            
        } else {
            $datos =[
                'cliente_id'=> '',
                'documento_identidad'=> '',
                'nombre'=> '',
                'apellidos'=> '',
                'email'=> '',
                'telefono'=> '',
                'direccion'=> '',
                'fecha_nacimiento'=> '',
                'fotografia'=> '', 
                'errorId' =>'', 
                'errorIdent' =>'',
                'errorNombre' =>'',
                'errorApellidos' =>'',
            ];
            $this->vista('clientes/editar', $datos);
        }
    }
}