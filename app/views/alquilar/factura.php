<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  print_r($datos);
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
                <td class="col-5">ID Cliente:</td>
                <td class="col-3"><?php echo $datos['cliente']->cliente_id?></td>
                <td class="col-4" rowSpan="8">Foto</td>
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
              
          </table>
        </div>

        <div class="container mt-3">
          <h3 class="offset-1">Datos de vehículo:</h3>
          <table class="table table-bordered text-center">
              <tr class="">
                <td class="col-3">Matrícula:</td>
                <td class="col-3"><?php echo $datos['vehiculo']->MATRICULA?></td>
                <td class="col-3" rowSpan="5">Foto</td>
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
          </table>
        </div>

        <div class="container mt-3">
          <h3 class="offset-1">Detalle de alquiler:</h3>
          <table class="table table-bordered text-center">
              <tr class="">
                <td class="col-3" colspan="2">Arrendatario:</td>
                <td class="col-3"><?php echo $datos['cliente']->nombre." ".$datos['cliente']->apellidos;?></td>
              </tr>
              <tr class="">
                <td class="col-3" colspan="2">Vehículo:</td>
                <td class="col-3"><?php echo $datos['vehiculo']->MARCA." ".$datos['vehiculo']->MODELO;?></td>
              </tr>
              <tr class="">
                <td class="col-3" colspan="2">Fecha de inicial:</td>
                <td class="col-3"><?php echo $datos['fecha_inicial'];?></td>
              </tr>
              <tr class="">
                <td class="col-3" colspan="2">Fecha de devolución:</td>
                <td class="col-3"><?php echo $datos['fecha_final'];?></td>
              </tr>
              <tr class="">
                <td class="col-3" rowSpan="5">Coste total:</td>
                <td class="col-3">Números de Dias:</td>
                <td class="col-3"><?php echo $datos['dias'];?></td>
              </tr>
              <tr>
                <td class="col-3">Números de Dias:</td>
                <td class="col-3"><?php echo $datos['dias'];?></td>
              </tr>
              <tr>
                <td class="col-3">Números de Dias:</td>
                <td class="col-3"><?php echo $datos['dias'];?></td>
              </tr>
              <tr>
                <td class="col-3">Números de Dias:</td>
                <td class="col-3"><?php echo $datos['dias'];?></td>
              </tr>
              <tr>
                <td class="col-3">Números de Dias:</td>
                <td class="col-3"><?php echo $datos['dias'];?></td>
              </tr>
              <tr>
                <td class="col-3" colspan="2">Precio total:</td>
                <td></td>
              </tr>
          </table>
        </div>
      </div>
    <div class="row mb-5">
      <button type="submit" class="mt-3 col-3 col-md-4 col-lg-4 offset-2 offset-md-1">
        <a href="<?php echo RUTA_URL; ?>/paginas/home">Cancelar alquiler</a>    
      </button>
      <button type="submit" class="mt-3 col-3 col-md-4 col-lg-4 offset-2">
        <a href="<?php echo RUTA_URL; ?>/alquileres/confirmarAquiler">Confirmar alquiler</a>    
      </button>
    </div>
    
  </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>