<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos);
?>
<div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/Alquileres/mostrarVehiculos" class="list-group-item list-group-item-action">Volver</a>    
    </div>
</div>
  <div class="container text-center">
        <h2 class=" mt-3 col-6 col-md-6 col-lg-6 offset-3 offset-md-3">Inicia tu sesion de cliente:</h2>
        <form action="<?php echo RUTA_URL; ?>/Alquileres/alquilarVehiculo/" method="POST" class="row mt-3 col-6 col-md-4 col-lg-4 offset-3 offset-md-4 offset-lg-4">
            <!-- Campo oculto para enviar los datos -->
            <input type="hidden" name="matricula" value="<?php echo $datos['matricula']; ?>">
            <input type="hidden" name="fecha_inicial" value="<?php echo $datos['fecha_inicial']; ?>">
            <input type="hidden" name="fecha_final" value="<?php echo $datos['fecha_final']; ?>">
        
            <label for="Login">Login:</label>
            <input type="text" id="login" name="login" placeholder="Introduce el login" value="<?php echo $datos['login'];?>">
            <span class="error text-danger">*<?php echo $datos['errorLogin'];?></span>

            <label for="Password">Password:</label>
            <input type="text" id="password" name="password" placeholder="Introduce los apellidos" value="<?php echo $datos['password'];?>">
            <span class="error text-danger">*<?php echo $datos['errorPassword'];?></span>

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