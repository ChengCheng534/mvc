<?php
class Usuarios extends Controlador{
    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    public function index() {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();

        $this->vista('paginas/home');
    }

    public function privada() {
        $this->vista('paginas/sesion');
    }

    public function verificarLoginPassword(){
        //Obtener el login y password del formulario
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $login =  trim($_POST['login']);
            $password = trim($_POST['password']);

            $datos =[
                'Login'=> $login,
                'Password'=> $password,
                'errorLogin' =>'',
                'errorPassword' =>'',
            ];

            //OBTIENE EL HASH DE USUARIO
            $hash = $this->usuarioModelo->obtenerDatos($login);

            //VERIFICA QUE EL USUARIO EXISTE EN EL BASE DE DATOS
            if($hash){
                //guardar en una variable el hash obtenido
                $hashUsuario = $hash->PASSWORD;

                if (password_verify($password, $hashUsuario)) {
                    $this->vista('paginas/menu');
                    return;

                }else{
                    $datos['errorPassword'] = 'El password es incorrecto';
                }
    
            }else{
                $datos['errorLogin'] = 'El usuario no es administrador';
            }

            $this->vista('paginas/sesion', $datos);
        }else{
            $datos =[
                'Login'=> '',
                'Password'=> '',
                'errorLogin' =>'',
                'errorPassword' =>'',
            ];
            $this->vista('paginas/sesion', $datos);
        }
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