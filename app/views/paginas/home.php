<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos);
?>
  <div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/Alquileres/privada" class="list-group-item list-group-item-action">Privada</a>    
    </div>
  </div>

  <div class="container mt-3">
    <h2>Buscar el coche diponible:</h2>
  </div>

  <div class="container mt.3">
    <div class="row">
      <form action="<?php echo RUTA_URL; ?>/alquileres/mostrarVehiculos" method="POST">
        <label for="fecha_Inicio"> Fecha de inicial</label>
        <input type="date" name="fecha_inicial" value="<?php echo $datos['fechaInicial'];?>">
        <span class="error">*<?php echo $datos['errorFechaInicial']; ?></span>

        <label for="final_Alquiler" class="offset-md-1"> Final de alquiler</label>
        <input type="date" name="final_alquiler" value="<?php echo $datos['finalAlquiler'];?>">
        <span class="error">*<?php echo $datos['errorFechaArquiler']; ?></span>
          
        <input type="submit" value="Disponibilidad">
      </form>
    </div>
  </div>

  <div class="container mt-3">
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
        //$fechas = $datos['fechaInicial'].','.$datos['finalAlquiler'];

          // Recorrer el array $datos y crear las filas de la tabla
          foreach ($datos['Vehiculos'] as $vehiculos) {
            echo "<tr>";
            echo "<td rowspan='1'>" . $vehiculos->MATRICULA . "</td>";
            $matricula = $vehiculos->MATRICULA;
            echo "<td rowspan='1'>" . $vehiculos->MARCA . "</td>";
            echo "<td rowspan='1'>" . $vehiculos->MODELO . "</td>";
            echo "<td rowspan='1'>" . $vehiculos->POTENCIA . "</td>";
            echo "<td rowspan='1'>" . $vehiculos->VELOCIDAD_MAX . "</td>";
            //echo "<td rowspan='1'>" . $vehiculos->IMAGEN . "</td>";
            $imagenPath = RUTA_URL . '/public/img/' . $vehiculos->IMAGEN;
            echo "<td><img src='" . $imagenPath . "' alt='Imagen del vehículo' style='width: 100px; height: auto;'></td>";
            $info = $matricula.','.$datos['fechaInicial'].','.$datos['finalAlquiler'];
            echo "<td><a href=\"alquilarVehiculo/$info\">Alquilar</a></td>";
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