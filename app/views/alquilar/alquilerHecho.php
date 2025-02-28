<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

  $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';

  //print_r($datos);
  if (isset($datos['idioma']) && $datos['idioma']) {
    $idiomaSeleccionado = $datos['idioma'];
  } else {
      $idiomaSeleccionado = '';
  }
?>
<div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/paginas/home" class="list-group-item list-group-item-action"><?php echo $datos['traducciones'][30]->$idiomaSeleccionado; ?></a>    
    </div>
</div>

<div class="container mt-5">
    <div class='row col-10 offset-1'>
      <span class="error p-5 text-center"><h1>¡¡<?php echo $datos['traducciones'][64]->$idiomaSeleccionado; ?>!!</h1></span>
    </div>
  </div>

<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>