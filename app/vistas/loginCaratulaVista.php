<?php include("encabezado.php"); ?>
<form action="<?php print RUTA; ?>login/verificar/" method="POST">
	<div class="form-group text-left">
		<label for="usuario">Usuario:</label>
		<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Escribe el usuario (correo electrónico)" value="<?php if(isset($datos["data"]["usuario"])){ print $datos["data"]["usuario"]; } else { print '';} ?>">
	</div>
 	<div class="form-group text-left">
		<label for="clave">Clave:</label>
		<input type="password" name="clave" id="clave" class="form-control" placeholder="Escribe la clave de acceso" value="<?php if(isset($datos["data"]["clave"])){ print $datos["data"]["clave"]; } else { print '';} ?>">
	</div>
        <div class="form-group text-left mt-2">
        <input type="submit" class="btn btn-success">
    </div>
    <div class="checkbox text-left mt-2 mb-2">
        <input type="checkbox" name="recordar" id="recordar">
        <label for="recordar">Recordar</label>
    </div>
        <a href="<?php print RUTA; ?>login/olvido/">¿Olvidaste tu clave de acceso?</a>
</form>
<?php include("piepagina.php"); ?>