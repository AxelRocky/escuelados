<?php include "encabezado.php"; ?>
<form action="<?php print RUTA; ?>login/verificar" method="POST">
    <div class="form-group text-left">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Escriba el usuario">
    </div>
    <div class="form-group text-left">
        <label for="clave">Contraseña</label>
        <input type="password" name="clave" id="clave" class="form-control" placeholder="Escribe la clave de acceso">
    </div>
        <div class="form-group text-left mt-2">
        <input type="submit" class="btn btn-success">
    </div>
    <div class="checkbox text-left mt-2 mb-2">
        <input type="checkbox" name="remember" id="remember" class="form-check-input">
        <label for="remember">Recordar</label>
    </div>
        <a href="<?php print RUTA; ?>login/olvido/">¿Olvidaste tu clave de acceso?</a>
</form>
<?php include "piepagina.php"; ?>