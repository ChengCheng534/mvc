<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
?>
<div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/paginas/home" class="list-group-item list-group-item-action">Volver</a>    
    </div>
</div>

<div class="container mt-5">
    <div class='row col-6 offset-3'>
      <span class="error p-5 text-center"><h1>Alquilado el vehículo correctamente</h1></span>
    </div>
  </div>

<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>