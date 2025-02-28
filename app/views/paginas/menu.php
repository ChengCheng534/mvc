<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

  //print_r($datos);

  $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';

  if (isset($datos['idioma']) && $datos['idioma']) {
    $idiomaSeleccionado = $datos['idioma'];
  } else {
      $idiomaSeleccionado = '';
  }
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
?>
  <div class="container mt-3">
    <div class="col-12 list-group">
      <a href="" class="list-group-item list-group-item-action"><?php echo $datos['traducciones'][69]->$idiomaSeleccionado;?></a>    
    </div>
  </div>
  <nav class="container mt-3 mb-5">
    <div class="row mx-auto">
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-1 offset-lg-0">
        <a href="<?php echo RUTA_URL; ?>/clientes" class="list-group-item"><?php echo $datos['traducciones'][70]->$idiomaSeleccionado;?></a>
      </button>
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-2 offset-lg-1">
        <a href="<?php echo RUTA_URL; ?>/vehiculos" class="list-group-item"><?php echo $datos['traducciones'][71]->$idiomaSeleccionado;?></a>
      </button>
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-1 offset-lg-1">
      <a href="" class="list-group-item"><?php echo $datos['traducciones'][72]->$idiomaSeleccionado;?></a>
      </button>
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-2 offset-lg-1">
      <a href="" class="list-group-item"><?php echo $datos['traducciones'][73]->$idiomaSeleccionado;?></a> 
      </button>
    </div>
  </nav>

<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>