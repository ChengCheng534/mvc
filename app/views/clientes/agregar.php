<?php 
  // Cargamos el header previamente
  require RUTA_APP . '/views/inc/header.php';
  //print_r($datos);
?>

<div class="container mt-5">
  <div class="list-group">
    <a href="<?php echo RUTA_URL; ?>/clientes" class="btn btn-primary mb-3">Volver</a>
  </div>
</div>

<form action="<?php echo RUTA_URL; ?>/clientes/agregar" method="POST">
    <div class="container">
        <h2>Agregar Cliente</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="documento_identidad" > Documento_identidad <span class="error text-danger">*<?php echo $datos['errorIdent']; ?></span></label>
                    <input type="text" name="documento_identidad" class="form-control" value="<?php echo $datos['documento_identidad'];?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre"> Nombre <span class="error text-danger">*<?php echo $datos['errorNombre']; ?></span></label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="apellidos"> Apellidos <span class="error text-danger">*<?php echo $datos['errorApellidos']; ?></span></label>
                    <input type="text" name="apellidos" class="form-control" value="<?php echo $datos['apellidos'];?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email"> Email <sup>*</sup></label>
                    <input type="text" name="email" class="form-control" value="<?php echo $datos['email'];?>">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono"> Telefono <sup>*</sup></label>
                    <input type="text" name="telefono" class="form-control" value="<?php echo $datos['telefono'];?>">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="direccion"> Direccion <sup>*</sup></label>
                    <input type="text" name="direccion" class="form-control" value="<?php echo $datos['direccion'];?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_nacimiento"> Fecha_Nacimiento <sup>*</sup></label>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $datos['fecha_nacimiento'];?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="fotografia"> Fotografia <sup>*</sup></label>
                    <input type="file" name="fotografia" class="form-control" value="<?php echo $datos['fotografia'];?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="login"> Login <span class="error text-danger">*<?php echo $datos['errorLogin']; ?></span></label>
                    <input type="text" name="login" class="form-control" value="<?php echo $datos['login'];?>">
                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password"> Password <span class="error text-danger">*<?php echo $datos['errorPassword']; ?></span></label>
                    <input type="text" name="password" class="form-control" value="<?php echo $datos['password'];?>">
                </div>
            </div>
 
            <input type="submit" value="Agregar cliente" class="mt-3">
        </div>
    </div>
<form>

 <?php
  // Cargamos el footer al final de la pagina
  require RUTA_APP . '/views/inc/footer.php';
?>