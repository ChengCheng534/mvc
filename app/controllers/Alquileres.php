<?php
require_once __DIR__ . '/../librerias/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../librerias/PHPMailer/src/SMTP.php';
require_once __DIR__ . '/../librerias/PHPMailer/src/Exception.php';
//require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Alquileres extends Controlador{
    public function __construct() {
      //1) Acceso al modelo
      //$this->usuarioModelo = $this->modelo('Usuario');
      //$this->clienteModelo = $this->modelo('Cliente');
      $this->alquilerModelo = $this->modelo('Alquiler');
    }

    public function index() {
        $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';
        if ($idioma=='es') {
            $idioma = 'español';
        }elseif ($idioma=='en') {
            $idioma = 'Ingles';
        }elseif ($idioma=='ca') {
            $idioma = 'Catalan';
        }elseif ($idioma=='eu') {
            $idioma = 'Euskera';
        }

        $datos =[
            'Vehiculos' => new Alquiler(),
            'fechaInicial' => '',
            'finalAlquiler' => '',
            'errorFechaInicial' => '',
            'errorFechaArquiler' => '',
            'idioma'=>$idioma,
            'traducciones'=> '',
        ];

        if ($idioma=='es') {
            $idioma = 'español';
        }elseif ($idioma=='en') {
            $idioma = 'Ingles';
        }elseif ($idioma=='ca') {
            $idioma = 'Catalan';
        }elseif ($idioma=='eu') {
            $idioma = 'Euskera';
        }

        $traducciones = $this->alquilerModelo->obtenerTraducciones($idioma);
        $datos['traducciones']= $traducciones;

        $this->vista('paginas/home', $datos);
    }

    public function privada() {
        $datos = [
            'Login' => '',
            'Password' => '',
            'errorLogin' => '',
            'errorPassword' => '',
        ];

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
            $traducciones = $this->alquilerModelo->obtenerTraducciones($idioma);

            $datos['traducciones']= $traducciones;
            $this->vista('paginas/sesion', $datos);
        }

        $this->vista('paginas/sesion', $datos);
    }

    public function mostrarVehiculos() {

        $datos =[
            'Vehiculos' => new Alquiler(),
            'fechaInicial' => '',
            'finalAlquiler' => '',
            'errorFechaInicial' => '',
            'errorFechaArquiler' => '',
            'idioma'=>'',
            'traducciones'=> '',
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
                $traducciones = $this->alquilerModelo->obtenerTraducciones($idioma);
    
                $datos['traducciones']= $traducciones;
            }
            
            // Recoger datos del formulario
            $datos['fechaInicial'] = trim($_POST['fecha_inicial'] ?? '');
            $datos['finalAlquiler'] = trim($_POST['final_alquiler'] ?? '');
    
            // Validación de fechas
            if (empty($datos['fechaInicial'])) {
                $datos['errorFechaInicial'] = $datos['traducciones'][24]->$idioma;

            }elseif (strtotime($datos['fechaInicial']) < strtotime('today')) {
                // Compara la fecha inicial con la fecha actual
                $datos['errorFechaInicial'] = $datos['traducciones'][25]->$idioma;
            }
    
            if (empty($datos['finalAlquiler'])) {
                $datos['errorFechaArquiler'] = $datos['traducciones'][26]->$idioma;

            } elseif (!empty($datos['fechaInicial']) && $datos['finalAlquiler'] <= $datos['fechaInicial']) {
                $datos['errorFechaArquiler'] = $datos['traducciones'][27]->$idioma;
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
            'lugar'=>'',
            'matricula' => $arrayInfo[0] ?? '',
            'fecha_inicial' => $arrayInfo[1] ?? '',
            'fecha_final' => $arrayInfo[2] ?? '',
            'idioma'=>'',
            'traducciones'=> '',
        ];

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
            $traducciones = $this->alquilerModelo->obtenerTraducciones($idioma);

            $datos['traducciones']= $traducciones;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos['matricula'] = trim($_POST['matricula'] ?? '');
            $datos['fecha_inicial'] = trim($_POST['fecha_inicial'] ?? '');
            $datos['fecha_final'] = trim($_POST['fecha_final'] ?? '');

            $matricula = $datos['matricula'];

            $fecha_inicial = new DateTime($datos['fecha_inicial']);
            $fecha_final = new DateTime($datos['fecha_final']);

            $diferencia = $fecha_inicial->diff($fecha_final);
            $datos['dias'] = $diferencia->days+1;


            if (empty($_POST["login"])) {
                $datos['errorLogin'] = $datos['traducciones'][31]->$idioma;
            } else {
                $datos['login'] = trim($_POST['login'] ?? '');
                
                if (!preg_match("/^[a-zA-Z-' ]*$/", $datos['login'])) {
                    $datos['errorLogin'] = $datos['traducciones'][32]->$idioma;
                }
            }

            if (empty($_POST['password'])) {
                $datos['errorPassword'] = $datos['traducciones'][33]->$idioma;
            } else {
                $datos['password'] = trim($_POST['password'] ?? '');
                
                if (!preg_match("/^[a-zA-Z0-9]+$/", $datos['password'])) {
                    $datos['errorPassword'] = $datos['traducciones'][34]->$idioma;
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
                        $datos['precio_base'] = 50;
                        $datos['precio_potencia'] = $datos['vehiculo']->POTENCIA*0.1;
                        $datos['precio_velocidad'] = $datos['vehiculo']->VELOCIDAD_MAX*0.05;

                        if ($datos['vehiculo']->MARCA=='BMW' |  $datos['vehiculo']->MARCA=='AUDI' | $datos['vehiculo']->MARCA=='MERCEDES'|  $datos['vehiculo']->MARCA=='TESLA') {
                            $datos['gama_vehiculo'] = 1.5;
                        }else{
                            $datos['gama_vehiculo'] = 1;
                        }

                        $datos['precio_dia'] = ($datos['precio_base']+$datos['precio_potencia']+$datos['precio_velocidad'])*$datos['gama_vehiculo'];
                        $datos['precio_total'] = $datos['precio_dia']*$datos['dias'] ;
                        
                        $this->vista('alquilar/factura', $datos);
                        return;
                    }else{
                        $datos['errorPassword'] = $datos['traducciones'][35]->$idioma;
                    }
                }else{
                    $datos['errorCliente'] = $datos['traducciones'][36]->$idioma;
                }
            }
            //Si hay errores, vuelve a la pagina con errores
            $this->vista('alquilar/iniciarSesion', $datos);
        }

        $this->vista('alquilar/iniciarSesion', $datos);
    }

    public function confirmarAlquiler(){
        $datos =[
            'Vehiculos' => new Alquiler(),
            'fechaInicial' => '',
            'finalAlquiler' => '',
            'errorFechaInicial' => '',
            'errorFechaArquiler' => '',
            'idioma'=>'',
            'traducciones'=> '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'cliente_id'=>trim($_POST['identidad']),
                'nombre'=>trim($_POST['nombre']),
                'apellido'=>trim($_POST['apellidos']),
                'email'=>trim($_POST['email']),
                'matricula'=>trim($_POST['matricula']),
                'marca'=>trim($_POST['marca']),
                'modelo'=>trim($_POST['modelo']),
                'lugar'=>trim($_POST['lugar_recogida']),
                'fechaInicial'=>trim($_POST['fechaInicial']),
                'fechaFinal'=>trim($_POST['fechaFinal']),
                'precio'=>trim($_POST['precio']),
            ];

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
                $traducciones = $this->alquilerModelo->obtenerTraducciones($idioma);
    
                $datos['traducciones']= $traducciones;
            }
            
            if ($this->alquilerModelo->agragarAlquiler($datos)) {
                if ($this->enviarCorreoConfirmacion($datos)) {
                    $this->vista('alquilar/alquilerHecho', $datos);
                } else {
                    echo "Error al enviar el correo.";
                }
            }
        }else{
            redireccionar('/paginas');
        }  
    }

    private function enviarCorreoConfirmacion($datos) {
        $mail = new PHPMailer(true);
    
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'yushen740@gmail.com'; 
            $mail->Password = 'wacd cimn zeud uqsu'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; 
    
            // Configuración del remitente y destinatario
            $mail->setFrom('yushen740@gmail.com', 'AlquilarTuCoche');
            $mail->addAddress($datos['email'], $datos['nombre'] . ' ' . $datos['apellido']);
    
            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirmacion de Alquiler';
            $mail->Body = "
                <h2>Hola {$datos['nombre']} {$datos['apellido']},</h2>
                <p>Tu alquiler ha sido confirmado con éxito.</p>
                <p><b>Detalles:</b></p>
                <ul>
                    <li><b>Vehículo:</b> {$datos['marca']} {$datos['modelo']} con la matrícula:({$datos['matricula']})</li>
                    <li><b>Lugar de recogida:</b> {$datos['lugar']}</li>
                    <li><b>Fecha de inicio:</b> {$datos['fechaInicial']}</li>
                    <li><b>Fecha de devolución:</b> {$datos['fechaFinal']}</li>
                    <li><b>Precio total:</b> {$datos['precio']}</li>
                </ul>
                <p>Gracias por confiar en nosotros.</p>
            ";
    
            return $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
            return false;
        }
    }
    
}