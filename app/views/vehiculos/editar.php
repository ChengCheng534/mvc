<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

  print_r($datos);
?>
<a href="<?php echo RUTA_URL; ?>/vehiculos">Volver</a>
<h2>Actualizar Vehiculo</h2>
<h3></h3>
<form action="<?php echo RUTA_URL; ?>/vehiculos/editar" method="POST">
    <div class="form-group">
        <label for="Matricula"> Matricula </label>
        <input type="text" name="matricula" value="<?php echo $datos['vehiculo']->MATRICULA; ?>" class="field left" readonly>
        <span class="error">*</span>
    </div>
    <div class="form-group">
        <label for="Marca"> Marca </label>
        <input type="text" name="marca" value="<?php echo $datos['vehiculo']->MARCA; ?>">
        <span class="error">*<?php echo $datos['errorMarca']; ?></span>
    </div>
    <div class="form-group">
        <label for="Modelo"> Modelo </label>
        <input type="text" name="modelo" value="<?php echo $datos['vehiculo']->MODELO; ?>">
    </div>
    <div class="form-group">
        <label for="Potencia"> Potencia </label>
        <input type="number" name="potencia" value="<?php echo $datos['vehiculo']->POTENCIA; ?>">
    </div>
    <div class="form-group">
        <label for="Velocidad_Max"> Velocidad Máxima</label>
        <input type="number" name="velocidad_max" value="<?php echo $datos['vehiculo']->VELOCIDAD_MAX; ?>">
    </div>
    <div class="form-group">
        <label for="Imagen"> Imagen </label>
        <input type="file" name="imagen" value="<?php echo $datos['vehiculo']->IMAGEN; ?>">
        <span class="error">* <?php echo $datos['errorImagen']; ?></span>
    </div>

    <input type="submit" value="Actualizar cliente">
</form>
 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>