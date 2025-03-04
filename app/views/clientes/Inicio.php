<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';

//print_r($datos); // Esta variable viene del controlador
?>
<div class="container mt-5">
  <div class="list-group">
    <a href="<?php echo RUTA_URL; ?>/paginas/menu" class="col-6 list-group-item list-group-item-action">Volver al menú</a>    
    <a href="<?php echo RUTA_URL; ?>/clientes/agregar" class="col-6 list-group-item list-group-item-action">Dar alta a cliente</a>    
  </div>
</div>
<div class="container mt-5">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Cliente id</th>
        <th>Documento identidad</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Fecha Nacimiento</th>
        <th>Fotografía</th>
        <th>Operacion</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Recorrer el array $datos y crear las filas de la tabla
        foreach ($datos['Clientes'] as $clientes) {
          echo "<tr>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->cliente_id . "</td>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->documento_identidad . "</td>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->nombre . "</td>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->apellidos . "</td>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->email . "</td>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->telefono . "</td>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->direccion . "</td>";
          echo "<td rowspan='2' class='align-middle'>" . $clientes->fecha_nacimiento . "</td>";
          $imagenPath = RUTA_URL . '/public/img/' . $clientes->fotografia;
          //echo "<td rowspan='2'>" . $clientes->fotografia . "</td>";
          echo "<td rowspan='2'><img src='" . $imagenPath . "' alt='Imagen del cliente' style='width: 100px; height: auto;'></td>";
          //echo "<img src='../img/" . $clientes->fotografia . "' alt='foto'>";
          echo "<td><a href=\"Clientes/visualizarBorrado/$clientes->cliente_id\">Borrar</a></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td><a href=\"Clientes/visualizarEditar/$clientes->cliente_id\">Editar</a></td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>