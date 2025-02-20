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
        <h2 class=" mt-3 col-6 col-md-6 col-lg-6 offset-3 offset-md-3">Facturacion de alquiler de vehiculo:</h2>
    </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>