<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
?>
<div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/paginas" class="list-group-item list-group-item-action">Volver</a>    
    </div>
</div>
  <div class="container text-center">
        <h2 class=" mt-3 col-6 col-md-6 col-lg-6 offset-3 offset-md-3">Iniciar Sesión:</h2>
        <form action="<?php echo RUTA_URL; ?>/Usuarios/verificarLoginPassword" method="POST" class="row mt-3 col-6 col-md-4 col-lg-2 offset-3 offset-md-4 offset-lg-5">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" placeholder="Introduce el Login" value="<?php echo $datos['Login'];?>">
            <span class="error text-danger">*<?php echo $datos['errorLogin'];?></span>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" placeholder="Introduce el Password">
            <span class="error text-danger">*<?php echo $datos['errorPassword'];?></span>

            <button type="submit" class="mt-3">Iniciar Sesión</button>
        </form> 
    </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>