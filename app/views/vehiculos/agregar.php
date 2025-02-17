<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

?>
<div class="container mt-5">
  <div class="list-group">
    <a href="<?php echo RUTA_URL; ?>/vehiculos" class="list-group-item list-group-item-action">Volver</a>    
  </div>
</div>
<h2>Agregar vehiculo</h2>
<h3></h3>
<form action="<?php echo RUTA_URL; ?>/vehiculos/agregar" method="POST" class>
    <div class="form-group">
        <label for="matricula"> Matricula <sup>*</sup></label>
        <input type="text" name="matricula" value="<?php echo $datos['matricula'];?>">
        <span class="error">*<?php echo $datos['errorMatricula']; ?></span>
    </div>
    <div class="form-group">
        <label for="marca"> Marca <sup>*</sup></label>
        <input type="text" name="marca" value="<?php echo $datos['marca'];?>">
        <span class="error">*<?php echo $datos['errorMarca']; ?></span>
    </div>
    <div class="form-group">
        <label for="modelo"> Modelo <sup>*</sup></label>
        <input type="text" name="modelo" value="<?php echo $datos['modelo'];?>">
    </div>
    <div class="form-group">
        <label for="potencia"> Potencia <sup>*</sup></label>
        <input type="number" name="potencia" value="<?php echo $datos['potencia'];?>">
    </div>
    <div class="form-group">
        <label for="velocidad_Max"> Velocidad Máxima <sup>*</sup></label>
        <input type="number" name="velocidad_Max" value="<?php echo $datos['velocidad_max'];?>">
    </div>

    <div class="form-group">
        <label for="imagen"> Imagen <sup>*</sup></label>
        <input type="file" name="imagen" value="<?php echo $datos['imagen'];?>">
        <span class="error">*<?php echo $datos['errorImagen']; ?></span>
    </div>

    <input type="submit" value="Agregar vehiculo">
</form>
 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>