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
      <div class="col-3 col-md-2 col-lg-1 list-group text-center">
        <a href="<?php echo RUTA_URL; ?>/Alquileres/privada" class="list-group-item list-group-item-action">
          <?php echo $datos['traducciones'][8]->$idiomaSeleccionado ? :''; ?>
        </a>    
      </div>

      <div class="col-3 col-md-2 col-lg-1 list-group offset-6 offset-md-8 offset-lg-10">
        <form action="<?php echo RUTA_URL; ?>/Idiomas/cambiarIdioma" method="POST" class="">
            <select class='p-2' name="idioma" onchange="this.form.submit();">
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
    <!-- Título del formulario -->
    <div class="row mb-4">
      <div class="col-12 text-center">
        <h2><?php echo $datos['traducciones'][9]->$idiomaSeleccionado ? : ''; ?></h2>
      </div>
    </div>

    <!-- Formulario -->
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <form action="<?php echo RUTA_URL; ?>/alquileres/mostrarVehiculos" method="POST">
          <!-- Fecha de inicio -->
          <div class="form-group row">
            <label for="fecha_Inicio" class="col-sm-4 col-form-label text-right">
              <?php echo $datos['traducciones'][22]->$idiomaSeleccionado ? : ''; ?>
            </label>
            <div class="col-sm-8">
              <input type="date" name="fecha_inicial" value="<?php echo $datos['fechaInicial']; ?>" class="form-control">
              <small class="text-danger"><?php echo $datos['errorFechaInicial']; ?></small>
            </div>
          </div>

          <!-- Fecha de finalización del alquiler -->
          <div class="form-group row mt-1">
            <label for="final_Alquiler" class="col-sm-4 col-form-label text-right">
              <?php echo $datos['traducciones'][23]->$idiomaSeleccionado ? : ''; ?>
            </label>
            <div class="col-sm-8">
              <input type="date" name="final_alquiler" value="<?php echo $datos['finalAlquiler']; ?>" class="form-control">
              <small class="text-danger"><?php echo $datos['errorFechaArquiler']; ?></small>
            </div>
          </div>

          <!-- Botón de enviar -->
          <div class="form-group row mt-1">
            <div class="col-sm-12 text-center">
              <input type="submit" value="<?php echo $datos['traducciones'][11]->$idiomaSeleccionado ? : ''; ?>" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
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
