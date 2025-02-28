<?php
class Idiomas extends Controlador{
    public function __construct() {
        $this->idiomaModelo = $this->modelo('Idioma');
    }

    public function cambiarIdioma() {
        $datos = [
            'Vehiculos' => new Idioma(),
            'fechaInicial' => '',
            'finalAlquiler' => '',
            'errorFechaInicial' => '',
            'errorFechaArquiler' => '',
            'idioma' => '',
            'traducciones' =>'',
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idioma'])) {
            $idioma = $_POST['idioma'];
            // Guardar en cookie por 30 días
            setcookie('idioma', $idioma, time() + (86400 * 30), "/"); 

            if ($idioma=='es') {
                $idioma = 'ESPAÑOL';
            }elseif ($idioma=='en') {
                $idioma = 'Ingles';
            }elseif ($idioma=='ca') {
                $idioma = 'Catalan';
            }elseif ($idioma=='eu') {
                $idioma = 'Euskera';
            }

            $datos = [
                'Vehiculos' => new Idioma(),
                'fechaInicial' => '',
                'finalAlquiler' => '',
                'errorFechaInicial' => '',
                'errorFechaArquiler' => '',
                'idioma' => $idioma,
                'traducciones' => '',
            ];

            $datos['traducciones'] = $this->idiomaModelo->obtenerTraducciones($idioma);

            $this->vista('paginas/home', $datos);
        }

        $this->vista('paginas/home', $datos);
    }

}