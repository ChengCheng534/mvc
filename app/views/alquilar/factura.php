<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos);
?>
  <div class="container mt-3">
      <div class="row">
      <div class="col-12 list-group">
      <h2 class="list-group-item list-group-item-action text-center">Facturación de alquiler de vehículo</h2>
      </div>
        
        <div class="container mt-3">
          <h3 class="offset-1">Datos de cliente:</h3>
          <table class="table table-bordered text-center">
              <tr class="">
                <td class="col-3">ID Cliente:</td>
                <td class="col-3"><?php echo $datos['cliente']->cliente_id?></td>
              </tr>
              <tr>
                <td>Documento Identidad:</td>
                <td><?php echo $datos['cliente']->documento_identidad?></td>
              </tr>
              <tr>
                <td>Nombre:</td>
                <td><?php echo $datos['cliente']->nombre?></td>
              </tr>
              <tr>
                <td>Apellidos:</td>
                <td><?php echo $datos['cliente']->apellidos?></td>
              </tr>
              <tr>
                <td>Correo electrónico:</td>
                <td><?php echo $datos['cliente']->email?></td>
              </tr>
              <tr>
                <td>Teléfono:</td>
                <td><?php echo $datos['cliente']->telefono?></td>
              </tr>
              <tr>
                <td>Dirección:</td>
                <td><?php echo $datos['cliente']->direccion?></td>
              </tr>
              <tr>
                <td>Fecha Nacimiento:</td>
                <td><?php echo $datos['cliente']->fecha_nacimiento?></td>
              </tr>
              <tr>
                <td>Foto:</td>
                <td><?php echo $datos['cliente']->fotografia?></td>
              </tr>
          </table>
        </div>

        <div class="container mt-3">
          <h3 class="offset-1">Datos de vehículo:</h3>
          <table class="table table-bordered text-center">
              <tr class="">
                <td class="col-3">Matrícula:</td>
                <td class="col-3"><?php echo $datos['vehiculo']->MATRICULA?></td>
              </tr>
              <tr>
                <td>Marca:</td>
                <td><?php echo $datos['vehiculo']->MARCA?></td>
              </tr>
              <tr>
                <td>Modelo:</td>
                <td><?php echo $datos['vehiculo']->MODELO?></td>
              </tr>
              <tr>
                <td>Potencia:</td>
                <td><?php echo $datos['vehiculo']->POTENCIA?></td>
              </tr>
              <tr>
                <td>Velocidad Máxima:</td>
                <td><?php echo $datos['vehiculo']->VELOCIDAD_MAX?></td>
              </tr>
              <tr>
                <td>Imagen:</td>
                <td><?php echo $datos['vehiculo']->IMAGEN?></td>
              </tr>
              <tr>
          </table>
        </div>

        <div class="container mt-3">
          <h3 class="offset-1">Detalle de alquiler:</h3>
          <table class="table table-bordered text-center">
              <tr class="">
                <td class="col-3">Matrícula:</td>
                <td class="col-3"><?php echo $datos['vehiculo']->MATRICULA?></td>
              </tr>
              <tr>
          </table>
        </div>
      </div>
    <div class="row mb-5">
      <button type="submit" class="mt-3 col-3 col-md-4 col-lg-4 offset-2 offset-md-1">
        <a href="<?php echo RUTA_URL; ?>/clientes/agregar">Cancelar alquiler</a>    
      </button>
      <button type="submit" class="mt-3 col-3 col-md-4 col-lg-4 offset-2">
        <a href="<?php echo RUTA_URL; ?>/clientes/agregar">Confirmar alquiler</a>    
      </button>
    </div>
    
  </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>