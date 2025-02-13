<?php
class Usuarios extends Controlador{
    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    public function index() {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        $datos =[
            'usuarios'=> $usuarios
        ];
        $this->vista('paginas/sesion', $datos);
    }

    public function obtenerLoginPassword(){
        //Obtener el login y password del formulario
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $login =  trim($_POST['login']);
            $password = trim($_POST['password']);

            //Obtener el login y password del base datos
            $LoginPassword = $this->usuarioModelo->obtenerLogin($login);

            if($LoginPassword==true){
                $datos =[
                    'usuarios'=> $LoginPassword
                ];
    
                print_r($datos);
            }else{
                echo "El login no existe";
            }
            
        }
    }

    public function verificarLoginPassword(){
        $LoginPassword = $this->usuarioModelo->obtenerLogin();
        $datos =[
            'usuarios'=> $LoginPassword
        ];

        print_r($datos);
        //$this->vista('paginas/sesion', $datos);
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $datos =[
                'nombre'=> trim($_POST['nombre']),
                'email'=> trim($_POST['email']),
                'telefono'=> trim($_POST['telefono']),
            ];

            if ($this->usuarioModelo->agregarUsuario($datos)){
                redireccionar('/paginas');
            } else {
                die ("No se pudo realizar el alta");
            }
        } else {
            $datos =[
                'nombre'=> '',
                'email'=> '',
                'telefono'=> '',
            ];
            $this->vista('paginas/agregar', $datos);
        }
    }
}