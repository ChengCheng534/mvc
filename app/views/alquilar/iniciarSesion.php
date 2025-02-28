<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos);

  $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';

  //print_r($datos['traducciones']);
  if (isset($datos['idioma']) && $datos['idioma']) {
    $idiomaSeleccionado = $datos['idioma'];
  } else {
      $idiomaSeleccionado = '';
  }
?>
<div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>" class="list-group-item list-group-item-action"><?php echo $datos['traducciones'][30]->$idiomaSeleccionado; ?></a>    
    </div>
</div>
  <div class="container text-center">
        <h2 class=" mt-3 col-6 col-md-6 col-lg-6 offset-3 offset-md-3"><?php echo $datos['traducciones'][29]->$idiomaSeleccionado; ?>:</h2>
        <form action="<?php echo RUTA_URL; ?>/Alquileres/alquilarVehiculo/" method="POST" class="row mt-3 col-6 col-md-4 col-lg-4 offset-3 offset-md-4 offset-lg-4">
            <!-- Campo oculto para enviar los datos -->
            <input type="hidden" name="matricula" value="<?php echo $datos['matricula']; ?>">
            <input type="hidden" name="fecha_inicial" value="<?php echo $datos['fecha_inicial']; ?>">
            <input type="hidden" name="fecha_final" value="<?php echo $datos['fecha_final']; ?>">
        
            <label for="Login"><?php echo $datos['traducciones'][20]->$idiomaSeleccionado; ?>:</label>
            <input type="text" id="login" name="login" placeholder="<?php echo $datos['traducciones'][65]->$idiomaSeleccionado;?>" value="<?php echo $datos['login'];?>">
            <span class="error text-danger">*<?php echo $datos['errorLogin'];?></span>

            <label for="Password"><?php echo $datos['traducciones'][21]->$idiomaSeleccionado; ?>:</label>
            <input type="text" id="password" name="password" placeholder="<?php echo $datos['traducciones'][66]->$idiomaSeleccionado;?>" value="<?php echo $datos['password'];?>">
            <span class="error text-danger">*<?php echo $datos['errorPassword'];?></span>

            <button type="submit" class="mt-3"><?php echo $datos['traducciones'][19]->$idiomaSeleccionado; ?></button>
            <span class="error text-danger">*<?php echo $datos['errorCliente'];?></span>
        </form>
        
    </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>