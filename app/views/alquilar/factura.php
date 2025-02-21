<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  print_r($datos);
?>
<div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/paginas/home" class="list-group-item list-group-item-action">Volver</a>    
    </div>
</div>
    <div class="container text-center">
        <h2 class=" mt-3 col-8 col-sm-12 col-md-10 col-lg-8 offset-2 offset-sm-0 offset-md-1 offset-lg-2">Facturación de alquiler de vehiculo:</h2>
    </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>