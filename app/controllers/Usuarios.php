<?php
class Usuarios extends Controlador{
    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    public function index() {
        $usuarios = $this->usuarioModelo->obtenerUsuarios();

        $datos =[
            'Usuarios' => '',
        ];

        $this->vista('usuarios/inicio', $datos);
    }

    public function verificarLoginPassword() {
        $datos = [
            'Login' => '',
            'Password' => '',
            'errorLogin' => '',
            'errorPassword' => '',
            'idioma'=>'',
            'traducciones'=> '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Verifica si los campos de login y password están definidos en el POST
            $login = isset($_POST['login']) ? trim($_POST['login']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            $datos = [
                'Login' => $login,
                'Password' => $password,
                'errorLogin' => '',
                'errorPassword' => '',
                'idioma'=>'',
                'traducciones'=> '',
            ];

            // Verifica si el formulario fue enviado mediante POST
            if (isset($_COOKIE["idioma"])) {
                $idioma = $_COOKIE["idioma"];

                if ($idioma=='es') {
                    $idioma = 'ESPAÑOL';
                }elseif ($idioma=='en') {
                    $idioma = 'Ingles';
                }elseif ($idioma=='ca') {
                    $idioma = 'Catalan';
                }elseif ($idioma=='eu') {
                    $idioma = 'Euskera';
                }
                
                $datos['idioma'] = $idioma;
                $traducciones = $this->usuarioModelo->obtenerTraducciones($idioma);

                $datos['traducciones']= $traducciones;
            }
                    
            // Si los campos están vacíos, asigna los errores correspondientes
            if (empty($login)) {
                $datos['errorLogin'] = $datos['traducciones'][31]->$idioma;
            }else{
                $datos['errorLogin'] = '';
            }
            if (empty($password)) {
                $datos['errorPassword'] = $datos['traducciones'][33]->$idioma;
            }
    
            // Si no hay errores en los campos, procedemos con la verificación
            if (empty($datos['errorLogin']) && empty($datos['errorPassword'])) {
                // Obtener el hash de usuario de la base de datos
                $hash = $this->usuarioModelo->obtenerPerfil($login);
    
                // Verificar si el usuario existe en la base de datos
                if ($hash) {
                    // Guardar el hash del usuario
                    $hashUsuario = $hash->PASSWORD;
                    $perfilUsuario = $hash->GRUPO;

                    if($perfilUsuario ==='ADMIN'){
                        // Verificar si el password es correcto
                        if (password_verify($password, $hashUsuario)) {
                            // Si el login es correcto, guardamos los datos en la sesión
                            session_start();  // Iniciar sesión si aún no está iniciada
                            $_SESSION['usuario_logueado'] = [
                                'login' => $login,
                            ];

                            $this->vista('paginas/menu', $datos);
                            return;
                        } else {
                            // Si la contraseña es incorrecta, asigna el error correspondiente
                            $datos['errorPassword'] = $datos['traducciones'][67]->$idioma;;
                        }
                    }else{
                        $datos['errorLogin'] = 'El usuario no es administrador';
                    }
    
                } else {
                    // Si el usuario no existe, asigna el error correspondiente
                    $datos['errorLogin'] = $datos['traducciones'][68]->$idioma;;
                }
            }
    
            // Pasa los datos (con errores si los hay) a la vista de inicio de sesión
            $this->vista('paginas/sesion', $datos);
    
        } else {
            redireccionar('/paginas');
        }
        $this->vista('paginas/sesion', $datos);

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
            $this->vista('paginas/seccion', $datos);
        }
    }
}