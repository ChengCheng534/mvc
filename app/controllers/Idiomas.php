<?php
class Idiomas extends Controlador{
    public function __construct() {
        $this->idiomaModelo = $this->modelo('Idioma');
    }

    public function cambiarIdiomas() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select'])) {
            $idioma = $_POST['select'];
            setcookie("idioma", $idioma, time() + (86400 * 30), "/"); // Cookie válida por 30 días
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]); // Recargar la página anterior
        exit();
    }

    public function cambiarIdioma() {
        // Verifica si se ha enviado una solicitud POST con el idioma seleccionado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select'])) {
            // Obtiene el idioma seleccionado desde el formulario
            $idioma = $_POST['select'];
            
            // Establece una cookie con el idioma seleccionado. La cookie expira en 30 días.
            setcookie("idioma", $idioma, time() + (86400 * 30), "/"); // 86400 segundos = 1 día

            // Redirige a la página anterior (es decir, donde el usuario estaba)
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit();
        }
    }
}