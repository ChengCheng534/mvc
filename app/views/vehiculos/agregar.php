<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

?>
<div class="container mt-5">
  <div class="list-group col-3 col-md-2 text-center">
    <a href="<?php echo RUTA_URL; ?>/vehiculos" class="list-group-item list-group-item-action">Volver</a>    
  </div>
</div>

<div class="container mt-3">
  <h2 class="text-center mb-4">Agregar Vehículo</h2> 
  <form action="<?php echo RUTA_URL; ?>/vehiculos/agregar" method="POST" class>
     <!-- Matricula -->
     <div class="form-group">
      <label for="matricula">Matrícula <sup>*</sup></label>
      <input type="text" name="matricula" class="form-control" value="<?php echo $datos['matricula']; ?>">
      <small class="text-danger"><?php echo $datos['errorMatricula']; ?></small>
    </div>

    <!-- Marca -->
    <div class="form-group">
      <label for="marca">Marca <sup>*</sup></label>
      <input type="text" name="marca" class="form-control" value="<?php echo $datos['marca']; ?>">
      <small class="text-danger"><?php echo $datos['errorMarca']; ?></small>
    </div>

    <!-- Modelo -->
    <div class="form-group">
      <label for="modelo">Modelo <sup>*</sup></label>
      <input type="text" name="modelo" class="form-control" value="<?php echo $datos['modelo']; ?>">
    </div>

    <!-- Potencia -->
    <div class="form-group">
      <label for="potencia">Potencia <sup>*</sup></label>
      <input type="number" name="potencia" class="form-control" value="<?php echo $datos['potencia']; ?>">
    </div>

    <!-- Velocidad Máxima -->
    <div class="form-group">
      <label for="velocidad_Max">Velocidad Máxima <sup>*</sup></label>
      <input type="number" name="velocidad_Max" class="form-control" value="<?php echo $datos['velocidad_max']; ?>">
    </div>

    <!-- Imagen -->
    <div class="form-group">
      <label for="imagen">Imagen <sup>*</sup></label>
      <input type="file" name="imagen" class="form-control-file" value="<?php echo $datos['imagen']; ?>">
      <small class="text-danger"><?php echo $datos['errorImagen']; ?></small>
    </div>

    <!-- Botón de envío -->
    <div class="form-group text-center mt-2">
      <input type="submit" value="Agregar Vehículo" class="btn btn-primary btn-lg">
    </div>
  </form>
</div>

 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>