<?php include "encabezado.php"; ?>
<form action="<?php print RUTA; ?>login/verificarOlvido" method="POST">
    <div class="form-group text-left">
        <label for="usuario">* Correo:</label>
        <input type="email" name="usuario" id="usuario" class="form-control" placeholder="Escriba el usuario">
    </div>
        <div class="form-group text-left mt-2">
        <input type="submit" class="btn btn-success">
        <a href="<?php print RUTA; ?>" type="button" class="btn btn-info">Regresar</a>
    </div>
</form>
<?php include "piepagina.php"; ?>