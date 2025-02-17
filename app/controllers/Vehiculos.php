<?php
class Vehiculos extends Controlador{
    public function __construct() {
      //1) Acceso al modelo
      $this->vehiculoModelo = $this->modelo('Vehiculo');
    }

    public function index() {
        $vehiculos = $this->vehiculoModelo->obtenerVehiculos();
        $datos =[
            'Vehiculos'=> $vehiculos
        ];
        $this->vista('vehiculos/inicio', $datos);
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $datos =[
                'matricula'=> trim($_POST['matricula']),
                'marca'=> trim($_POST['marca']),
                'modelo'=> trim($_POST['modelo']),
                'potencia'=> trim($_POST['potencia']),
                'velocidad_max'=> trim($_POST['velocidad_Max']),
                'imagen'=> trim($_POST['imagen']),
                'errorMatricula' => '',
                'errorMarca' => '',
                'errorModelo' => '',
            ];

            if(empty($_POST['potencia'])){
                $datos['potencia'] = '0';
            }

            if(empty($_POST['velocidad_max'])){
                $datos['velocidad_max'] = '0';
            }

            if(empty($_POST['matricula'])){
                $datos['errorMatricula'] = "El campo de documento identidad es requerido";
            }else{
                $datos['errorMatricula'] = '';
            }

            if(empty($_POST['marca'])){
                $datos['errorMarca'] = "El campo de documento identidad es requerido";
            }else{
                $datos['errorMarca'] = '';
            }

            if(empty($_POST['imagen'])){
                $datos['errorImagen'] = "El campo de documento identidad es requerido";
            }else{
                $datos['errorImagen'] = '';
            }

            if ($datos['errorMatricula']=='' && $datos['errorMarca']=='' && $datos['errorImagen']=='') {
                if ($this->vehiculoModelo->agregarVehiculos($datos)){
                    redireccionar('/vehiculos');
                } else {
                    die ("No se pudo realizar el alta");
                }
            }
            $this->vista('vehiculos/agregar', $datos);

        } else {
            $datos =[
                'matricula'=> '',
                'marca'=> '',
                'modelo'=> '',
                'potencia'=> '',
                'velocidad_max'=> '',
                'imagen'=> '',
                'errorMatricula' => '',
                'errorMarca' => '',
                'errorImagen' => '',
            ];
            $this->vista('vehiculos/agregar', $datos);
        }
    }

    public function visualizarBorrado($matricula){
        $datos = $this->vehiculoModelo->obtenerVehiculo($matricula);

        $this->vista('vehiculos/visualizar', $datos);
    }

    public function borrar($matricula){
        $arrayVehiculo = $this->vehiculoModelo->borrarVehiculo($matricula);
        $vehiculoActual = $this->vehiculoModelo->obtenerVehiculos();

        $datos =[
            'vehiculos'=> $clientesActual
        ];
        $this->vista('vehiculos/inicio', $datos);
    }

    public function visualizarEditar($matricula){
        $arrayVehiculo = $this->vehiculoModelo->obtenerVehiculo($matricula);

        $datos =[
            'vehiculo'=> $arrayVehiculo,
            'errorMatricula' =>'',
            'errorMarca' =>'',
            'errorImagen' =>'',
        ];

        $this->vista('vehiculos/editar', $datos);
    }

    public function Editar($matricula){
        echo "Adios";
    }
    
}