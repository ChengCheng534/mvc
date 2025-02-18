<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
?>
  <div class="container mt-3">
    <div class="col-12 list-group">
      <a href="" class="list-group-item list-group-item-action">Cerrar Sesión</a>    
    </div>
  </div>
  <nav class="container mt-3">
    <div class="row mx-auto">
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-1 offset-lg-0">
        <a href="<?php echo RUTA_URL; ?>/clientes" class="list-group-item">Gestionar Clientes</a>
      </button>
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-2 offset-lg-1">
        <a href="<?php echo RUTA_URL; ?>/vehiculos" class="list-group-item">Gestionar Vehiculos</a>
      </button>
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-1 offset-lg-1">
      <a href="" class="list-group-item">Gestionar Alquiler</a>
      </button>
      <button type="submit" class="col-6 col-md-4 col-lg-2 mt-3 p-2 rounded offset-3 offset-md-2 offset-lg-1">
      <a href="" class="list-group-item">Gestionar Usuarios</a> 
      </button>
    </div>
  </nav>

<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>