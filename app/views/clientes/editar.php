<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
?>
<a href="<?php echo RUTA_URL; ?>/clientes">Volver</a>
<h2>Actualizar Cliente</h2>
<h3></h3>
<?php
print_r($datos);
?>
<form action="<?php echo RUTA_URL; ?>/clientes/editar" method="POST">
    <div class="form-group">
        <label for="cliente_id"> Cliente_id</label>
        <input type="text"name="cliente_id" value="<?php echo $datos['Cliente']->cliente_id; ?>" class="field left" readonly>
        <span class="error">*</span>
    </div>
    <div class="form-group">
        <label for="documento_identidad"> Documento_identidad <sup>*</sup></label>
        <input type="text" name="documento_identidad" value="<?php echo $datos['Cliente']->DOCUMENTO_IDENTIDAD; ?>">
        <span class="error">*<?php echo $datos['errorIdent']; ?></span>
    </div>
    <div class="form-group">
        <label for="nombre"> Nombre <sup>*</sup></label>
        <input type="text" name="nombre" value="<?php echo $datos['Cliente']->nombre; ?>">
        <span class="error">* <?php echo $datos['errorNombre']; ?></span>
    </div>
    <div class="form-group">
        <label for="apellidos"> Apellidos <sup>*</sup></label>
        <input type="text" name="apellidos" value="<?php echo $datos['Cliente']->apellidos; ?>">
        <span class="error">* <?php echo $datos['errorApellidos']; ?></span>
    </div>
    <div class="form-group">
        <label for="email"> Email <sup>*</sup></label>
        <input type="text" name="email" value="<?php echo $datos['Cliente']->email; ?>">
    </div>
    <div class="form-group">
        <label for="telefono"> Telefono <sup>*</sup></label>
        <input type="text" name="telefono" value="<?php echo $datos['Cliente']->telefono; ?>">
    </div>
    <div class="form-group">
        <label for="direccion"> Direccion <sup>*</sup></label>
        <input type="text" name="direccion" value="<?php echo $datos['Cliente']->direccion; ?>">
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento"> Fecha_Nacimiento <sup>*</sup></label>
        <input type="date" name="fecha_nacimiento" value="<?php echo $datos['Cliente']->fecha_nacimiento; ?>">
    </div>
    <div class="form-group">
        <label for="fotografia"> Fotografia <sup>*</sup></label>
        <input type="file" name="fotografia" value="<?php echo $datos['Cliente']->fotografia; ?>">
    </div>

    <input type="submit" value="Actualizar cliente">
</form>
 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>