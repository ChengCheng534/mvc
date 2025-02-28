<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

  //print_r($datos);
  $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';

  //print_r($datos['traducciones']);
  if (isset($datos['idioma']) && $datos['idioma']) {
    $idiomaSeleccionado = $datos['idioma'];
  } else {
      $idiomaSeleccionado = '';
  }

?>
  <div class="container mt-3">
    <div class='row'>
      <div class="col-9 col-md-10 col-lg-10 list-group">
        <a href="<?php echo RUTA_URL; ?>/Alquileres/privada" class="list-group-item list-group-item-action">
          <?php echo $datos['traducciones'][8]->$idiomaSeleccionado ? :''; ?>
        </a>    
      </div>
      <div class="col-3 col-md-2 col-lg-2 list-group p-2">
    <form action="<?php echo RUTA_URL; ?>/Idiomas/cambiarIdioma" method="POST">
        <select name="idioma" onchange="this.form.submit();">
            <option value="es" <?php echo ($idioma == 'es') ? 'selected' : ''; ?>>Español</option>
            <option value="en" <?php echo ($idioma == 'en') ? 'selected' : ''; ?>>English</option>
            <option value="ca" <?php echo ($idioma == 'ca') ? 'selected' : ''; ?>>Catalán</option>
            <option value="eu" <?php echo ($idioma == 'eu') ? 'selected' : ''; ?>>Euskera</option>
        </select>
    </form>
</div>

    </div>
  </div>
  <div class="container mt-3">
    <h2><?php echo $datos['traducciones'][9]->$idiomaSeleccionado ? :''; ?></h2>
  </div>

  <div class="container mt-3">
    <div class="row">
      <form action="<?php echo RUTA_URL; ?>/alquileres/mostrarVehiculos" method="POST">
        <label for="fecha_Inicio"> <?php echo $datos['traducciones'][22]->$idiomaSeleccionado ? :''; ?> </label>
        <input type="date" name="fecha_inicial" value="<?php echo $datos['fechaInicial']; ?>">
        <span class="error">*<?php echo $datos['errorFechaInicial']; ?></span>

        <label for="final_Alquiler" class="offset-md-1"><?php echo $datos['traducciones'][23]->$idiomaSeleccionado ? :''; ?></label>
        <input type="date" name="final_alquiler" value="<?php echo $datos['finalAlquiler']; ?>">
        <span class="error">*<?php echo $datos['errorFechaArquiler']; ?></span>
          
        <input type="submit" value="<?php echo $datos['traducciones'][11]->$idiomaSeleccionado ? :''; ?>">
      </form>
    </div>
  </div>

  <div class="container mt-3">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><?php echo $datos['traducciones'][12]->$idiomaSeleccionado; ?></th>
          <th><?php echo $datos['traducciones'][13]->$idiomaSeleccionado; ?></th>
          <th><?php echo $datos['traducciones'][14]->$idiomaSeleccionado; ?></th>
          <th><?php echo $datos['traducciones'][15]->$idiomaSeleccionado; ?></th>
          <th><?php echo $datos['traducciones'][16]->$idiomaSeleccionado; ?></th>
          <th><?php echo $datos['traducciones'][17]->$idiomaSeleccionado; ?></th>
          <th><?php echo $datos['traducciones'][18]->$idiomaSeleccionado; ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($datos['Vehiculos'] as $vehiculos) {
            echo "<tr>";
            echo "<td>" . $vehiculos->MATRICULA . "</td>";
            echo "<td>" . $vehiculos->MARCA . "</td>";
            echo "<td>" . $vehiculos->MODELO . "</td>";
            echo "<td>" . $vehiculos->POTENCIA . "</td>";
            echo "<td>" . $vehiculos->VELOCIDAD_MAX . "</td>";
            $imagenPath = RUTA_URL . '/public/img/' . $vehiculos->IMAGEN;
            echo "<td><img src='" . $imagenPath . "' alt='Imagen del vehículo' style='width: 100px; height: auto;'></td>";
            $info = $vehiculos->MATRICULA . ',' . $datos['fechaInicial'] . ',' . $datos['finalAlquiler'];
            echo "<td><a href='alquilarVehiculo/$info'>" . $datos['traducciones'][28]->$idiomaSeleccionado . "</a></td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
<?php
  require RUTA_APP . '/views/inc/footer.php';
?>
