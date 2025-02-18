<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
?>
  <div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/paginas/privada" class="list-group-item list-group-item-action">Privada</a>    
    </div>
  </div>

  <div class="container mt-3">
    <p class>Bienvenido a mi pagina para alquilar tu vehiculo preferido.</p>
    <?php header('Location: ' . RUTA_URL . '/mvc/paginas/sesion');?>
  </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>