<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos); // Esta variable viene del controlador
?>
<div class="container mt-5">
  <div class="list-group">
  <a href="<?php echo RUTA_URL; ?>/paginas/menu" class="col-6 list-group-item list-group-item-action">Volver al página principal</a>    
    <a href="<?php echo RUTA_URL; ?>/vehiculos/agregar" class="list-group-item list-group-item-action">Alta</a>    
  </div>
</div>
<div class="container mt-5">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Matrícula</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Potencia</th>
        <th>Velocidad Máxima</th>
        <th>Imagen</th>
        <th>Operación</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Recorrer el array $datos y crear las filas de la tabla
        foreach ($datos['Vehiculos'] as $vehiculos) {
          echo "<tr>";
          echo "<td rowspan='2'>" . $vehiculos->MATRICULA . "</td>";
          echo "<td rowspan='2'>" . $vehiculos->MARCA . "</td>";
          echo "<td rowspan='2'>" . $vehiculos->MODELO . "</td>";
          echo "<td rowspan='2'>" . $vehiculos->POTENCIA . "</td>";
          echo "<td rowspan='2'>" . $vehiculos->VELOCIDAD_MAX . "</td>";
          $imagenPath = RUTA_URL . '/public/img/' . $vehiculos->IMAGEN;
          echo "<td rowspan='2'><img src='" . $imagenPath . "' alt='Imagen del vehículo' style='width: 100px; height: auto;'></td>";
          echo "<td><a href=\"Vehiculos/visualizarBorrado/$vehiculos->MATRICULA\">Borrar</a></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td><a href=\"vehiculos/visualizarEditar/$vehiculos->MATRICULA\">Editar</a></td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</div>

 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>