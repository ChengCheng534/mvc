<?php
class Clientes extends Controlador{
    public function __construct() {
      //1) Acceso al modelo
      //$this->usuarioModelo = $this->modelo('Usuario');
      $this->clienteModelo = $this->modelo('Cliente');
    }

    public function index() {
        // Si está autenticado, proceder con la obtención de los clientes
        $clientes = $this->clienteModelo->obtenerClientes();
        $datos = [
            'Clientes' => $clientes
        ];

        // Cargar la vista con los datos de los clientes
        $this->vista('clientes/inicio', $datos);
        
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
                'fotografia'=> '', 
                'errorId' =>'', 
                'errorIdent' =>'',
                'errorNombre' =>'',
                'errorApellidos' =>'',
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