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
        <h2 class=" mt-3 col-6 col-md-6 col-lg-6 offset-3 offset-md-3">Resgistrarte como cliente:</h2>
        <form action="<?php echo RUTA_URL; ?>/Alquileres/alquilarVehiculo/<?php echo $matricula; ?>" method="POST" class="row mt-3 col-6 col-md-4 col-lg-4 offset-3 offset-md-4 offset-lg-4">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre" value="<?php echo $datos['nombre'];?>">
            <span class="error text-danger">*<?php echo $datos['errorNombre'];?></span>

            <label for="Apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Introduce los apellidos" value="<?php echo $datos['apellidos'];?>">
            <span class="error text-danger">*<?php echo $datos['errorApellidos'];?></span>

            <label for="Email">Correo electrónico:</label>
            <input type="text" id="email" name="email" placeholder="Introduce el correo electronico" value="<?php echo $datos['email'];?>">
            <span class="error text-danger">*<?php echo $datos['errorEmail'];?></span>

            <button type="submit" class="mt-3">Iniciar Sesión</button>
            <span class="error text-danger">*<?php echo $datos['errorCliente'];?></span>
        </form>
        
        <button type="submit" class="mt-3 col-6 col-md-4 col-lg-4">
            <a href="<?php echo RUTA_URL; ?>/clientes/agregar">Registrar</a>    
        </button>
    </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>