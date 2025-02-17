<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

?>
<div class="container mt-5">
    <?php
    echo "<h3>Datos de vehiculos que desea eliminar:</h3>";
        echo "<ul>";
            echo "<li>Matrícula: ".$datos->MATRICULA."</li>";
            echo "<li>Marca: ".$datos->MARCA."</li>";
            echo "<li>Modelo: ".$datos->MODELO."</li>";
            echo "<li>Potencia: ".$datos->POTENCIA."</li>";
            echo "<li>Velocidad Máxima: ".$datos->VELOCIDAD_MAX."</li>";
            echo "<li>Imagen: ".$datos->IMAGEN."</li>";
            echo "</ul>";
        echo "¿Esta seguro eliminar este vehiculo?";
    ?>
    <br>
    <a href="<?php echo RUTA_URL . "\vehiculos/borrar/$datos->MATRICULA" ?> ">Si</a>
    <br>
    <a href="<?php echo RUTA_URL; ?>/vehiculos">No</a>
 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>