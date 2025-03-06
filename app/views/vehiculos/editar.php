<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos);
?>

<div class="container mt-5">
  <div class="list-group">
    <a href="<?php echo RUTA_URL; ?>/vehiculos" class="btn btn-primary mb-3">Volver</a>
  </div>
</div>



<form action="<?php echo RUTA_URL; ?>/vehiculos/editar" method="POST">
    <div class="container">
        <h2>Actualizar Vehiculo</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Matricula"> Matricula <span class="error text-danger">*</span></label>
                    <input type="text" name="matricula" class="form-control" value="<?php echo $datos['vehiculo']->MATRICULA; ?>" class="field left" readonly>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Marca"> Marca <span class="error text-danger">*<?php echo $datos['errorMarca']; ?></span></label>
                    <input type="text" name="marca" class="form-control" value="<?php echo $datos['vehiculo']->MARCA; ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Modelo"> Modelo </label>
                    <input type="text" name="modelo" class="form-control" value="<?php echo $datos['vehiculo']->MODELO; ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Potencia"> Potencia </label>
                    <input type="number" name="potencia" class="form-control" value="<?php echo $datos['vehiculo']->POTENCIA; ?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Velocidad_Max"> Velocidad Máxima</label>
                    <input type="number" name="velocidad_max" class="form-control" value="<?php echo $datos['vehiculo']->VELOCIDAD_MAX; ?>">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Imagen"> Imagen <span class="error text-danger">* <?php echo $datos['errorImagen']; ?></span></label>
                    <input type="file" name="imagen" class="form-control" value="<?php echo $datos['vehiculo']->IMAGEN; ?>">
                </div>
            </div>
            
            <input type="submit" value="Actualizar vehiculo" class="mt-3">
        </div>
    </div>
<form>

 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>