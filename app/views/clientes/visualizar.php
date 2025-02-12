<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

//print_r($datos); // Esta variable viene del controlador
?>
<div class="container mt-5">
    <?php
    echo "<h3>Datos de cliente que desea eliminar:</h3>";
    $id = $datos['Clientes']->cliente_id;
        echo "<ul>";
            echo "<li>ID: ".$datos['Clientes']->cliente_id."</li>";
            echo "<li>".$datos['Clientes']->documento_identidad."</li>";
            echo "<li>".$datos['Clientes']->nombre."</li>";
            echo "<li>".$datos['Clientes']->apellidos."</li>";
            echo "<li>".$datos['Clientes']->email."</li>";
            echo "<li>".$datos['Clientes']->telefono."</li>";
            echo "<li>".$datos['Clientes']->direccion."</li>";
            echo "<li>".$datos['Clientes']->fecha_nacimiento."</li>";
            echo "<li>".$datos['Clientes']->fotografia."</li>";
            echo "</ul>";
        echo "¿Esta seguro eliminar este cliente?";
    ?>
    <br>
    <a href="<?php echo RUTA_URL . "\Clientes/borrar/$id" ?> ">Si</a>
    <br>
    <a href="<?php echo RUTA_URL; ?>/clientes">No</a>
 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>