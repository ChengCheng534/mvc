<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos);

  $idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es';

  if (isset($datos['idioma']) && $datos['idioma']) {
    $idiomaSeleccionado = $datos['idioma'];
  } else {
      $idiomaSeleccionado = '';
  }
?>
<div class="container mt-3">
    <div class="col-12 list-group">
      <a href="<?php echo RUTA_URL; ?>/paginas" class="list-group-item list-group-item-action"><?php echo $datos['traducciones'][30]->$idiomaSeleccionado; ?></a>    
    </div>
</div>
  <div class="container text-center">
        <h2 class=" mt-3 col-6 col-md-6 col-lg-6 offset-3 offset-md-3"><?php echo $datos['traducciones'][19]->$idiomaSeleccionado ? :''; ?>:</h2>
        <form action="<?php echo RUTA_URL; ?>/Usuarios/verificarLoginPassword" method="POST" class="row mt-3 col-6 col-md-4 col-lg-2 offset-3 offset-md-4 offset-lg-5">
            <label for="login"><?php echo $datos['traducciones'][20]->$idiomaSeleccionado ? :''; ?>:</label>
            <input type="text" id="login" name="login" placeholder="<?php echo $datos['traducciones'][65]->$idiomaSeleccionado;?>" value="<?php echo $datos['Login'];?>">
            <span class="error text-danger">*<?php echo $datos['errorLogin'];?></span>

            <label for="password"><?php echo $datos['traducciones'][21]->$idiomaSeleccionado ? :''; ?>:</label>
            <input type="text" id="password" name="password" placeholder="<?php echo $datos['traducciones'][66]->$idiomaSeleccionado;?>">
            <span class="error text-danger">*<?php echo $datos['errorPassword'];?></span>

            <button type="submit" class="mt-3"><?php echo $datos['traducciones'][19]->$idiomaSeleccionado ? :''; ?></button>
        </form> 
    </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>