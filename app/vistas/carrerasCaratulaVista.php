<?php include "encabezado.php"; ?>
<table class="table table-striped" width="100%">
  <thead>
  <tr>
    <th>id</th>
    <th>Clave</th>
    <th>Descripción</th>
    <th>Modificar</th>
    <th>Borrar</th>
  </tr>
  </thead>
  <tbody>
    <?php
    for($i=0; $i<count($datos['data']); $i++){
      print "<tr>";
      print "<td class='text-left'>".$datos["data"][$i]["id"]."</td>";
      print "<td class='text-left'>".$datos["data"][$i]["clave"]."</td>";
      print "<td class='text-left'>".$datos["data"][$i]["descripcion"]."</td>";
      //
      print "<td><a href='".RUTA."carreras/modificar/".$datos["data"][$i]["id"]."' class='btn btn-info'>Modificar</a></td>";
      print "<td><a href='".RUTA."carreras/borrar/".$datos["data"][$i]["id"]."' class='btn btn-danger'>Borrar</a></td>";
      print "</tr>";
    }
    ?>
  </tbody>
  </table>
<a href="<?php print RUTA; ?>carreras/alta" class="btn btn-success">
  Dar de alta una carrera</a>
<?php include "piepagina.php"; ?>
