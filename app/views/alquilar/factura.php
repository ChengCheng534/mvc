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

      <form action="<?php echo RUTA_URL; ?>/Alquileres/confirmarAlquiler/" method="POST" class="row">
        <div class="container mt-3">
          <h3 class="offset-1">Datos de cliente:</h3>
          <table class="table table-bordered text-center">
            <tr class="">
              <td class="col-5">ID Cliente:</td>
              <td class="col-3">
              <input type="text" class='text-center' name="identidad" value="<?php echo $datos['cliente']->cliente_id?>" readonly style="border: none;">
              </td>
              <td class="col-4 align-middle" rowSpan="8">
                <?php
                  $fotoPath = RUTA_URL . '/public/img/' . $datos['cliente']->fotografia;
                  echo "<img src='$fotoPath' alt='Foto del cliente' style='width: 100%; height: auto;'>";
                ?>
              </td>
            </tr>
            <tr>
              <td>Documento Identidad:</td>
              <td><?php echo $datos['cliente']->documento_identidad?></td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td>
                <input type="text" class='text-center' name="nombre" value="<?php echo $datos['cliente']->nombre?>" readonly style="border: none;">
              </td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td>
                <input type="text" class='text-center' name="apellidos" value="<?php echo $datos['cliente']->apellidos?>" readonly style="border: none;">
              </td>
            </tr>
            <tr>
              <td>Correo electrónico:</td>
              <td>
                <input type="text" class='text-center' name="email" value="<?php echo $datos['cliente']->email?>" readonly style="border: none;">
              </td>
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
                <td class="col-3">
                  <input type="text" class='text-center' name="matricula" value="<?php echo $datos['vehiculo']->MATRICULA?>" readonly style="border: none;">
                </td>
                <td class="col-3 align-middle" rowSpan="5">
                  <?php
                    $fotoPath = RUTA_URL . '/public/img/' . $datos['vehiculo']->IMAGEN;
                    echo "<img src='$fotoPath' alt='Foto del cliente' style='width: 100%; height: auto;'>";
                  ?>
                </td>
              </tr>
              <tr>
                <td>Marca:</td>
                <td>
                  <input type="text" class='text-center' name="marca" value="<?php echo $datos['vehiculo']->MARCA?>" readonly style="border: none;">
                </td>
              </tr>
              <tr>
                <td>Modelo:</td>
                <td>
                <input type="text" class='text-center' name="modelo" value="<?php echo $datos['vehiculo']->MODELO?>" readonly style="border: none;">
                </td>
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
              <td class="col-3">
                <?php echo $datos['vehiculo']->MARCA." ".$datos['vehiculo']->MODELO;?>
              </td>
            </tr>
            <tr class="">
              <td class="col-3" colspan="2">Fecha de inicial:</td>
              <td class="col-3">
                <input type="text" class='text-center' name="fechaInicial" value="<?php echo $datos['fecha_inicial'];?>" readonly style="border: none;">
              </td>
            </tr>
            <tr class="">
              <td class="col-3" colspan="2">Fecha de devolución:</td>
              <td class="col-3">
                <input type="text" class='text-center' name="fechaFinal" value="<?php echo $datos['fecha_final'];?>" readonly style="border: none;">
              </td>
            </tr>
            <tr class="">
              <td class="col-3 align-middle" rowSpan="4">Detalles de Costes:</td>
              <td class="col-3">Precios Base:</td>
              <td class="col-3"><?php echo $datos['precio_base'];?>€</td>
            </tr>
            <tr>
              <td class="col-3">Potencia x 0.10:</td>
              <td class="col-3"><?php echo $datos['precio_potencia'];?>€</td>
            </tr>
            <tr>
              <td class="col-3">Velocidad Máxima x 0.05:</td>
              <td class="col-3"><?php echo $datos['precio_velocidad'];?>€</td>
            </tr>
            <tr>
              <td class="col-3">Gama de Vehículo ():</td>
              <td class="col-3"><?php echo $datos['gama_vehiculo'];?>€</td>
            </tr>
            <tr>
              <td class="col-3" colspan="3">Precio/Dia: 
                <b><input type="text" class='text-center col-2' name="precioDia" value="<?php echo $datos['precio_dia'];?>€" readonly style="border: none;"></b>
              </td>
            </tr>
            <tr>
              <td class="col-3" colspan="2">Números de Dias:</td>
              <td class="col-3"><?php echo $datos['dias'];?></td>
            </tr>
            <tr>
              <td class="col-3" colspan="3">PRECIO TOTAL: 
                <b><input type="text" class='text-center col-2' name="precio" value="<?php echo $datos['precio_total'];?>€" readonly style="border: none;" step="0.01"></b>
              </td>
            </tr>
          </table>
          <div class="row mb-5 col-6 offset-3 p-2">
            <label for="lugar_recogidad" class="text-center">Lugar de recogida (*Opcional):</label>
            <input type="text" name="lugar_recogida" placeholder="Introduce un dirección para el recogida de vehículo" value="<?php echo $datos['lugar'];?>">
          </div>
        </div>
        <div class="row mb-5">
          <button type="submit" class="mt-3 col-3 col-md-4 col-lg-4 offset-2 offset-md-1">
            <a href="<?php echo RUTA_URL; ?>/paginas/home" class="list-group-item list-group-item-action">Cancelar alquiler</a>      
          </button>
          <button type="submit" class="mt-3 col-3 col-md-4 col-lg-4 offset-2">Confirmar alquiler</a>    
          </button>
        </div>
      </form>
    </div>

  </div>
<?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>