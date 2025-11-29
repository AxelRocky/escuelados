<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print "Escuela | " . $datos["titulo"]; ?></title>
    <link rel="shortcut icon" href="<?php print RUTA; ?>public*img/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <a href="<?php print RUTA; ?>" class="navbar-brand">Escuela Pitagoras</a>
    		<?php
		if (isset($datos["menu"]) && $datos["menu"]==true) {
	      print "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>";
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."carreras' class='nav-link ";
	      if(isset($datos["activo"]) && $datos["activo"]=="carreras") print "active";
	      print "'>Carreras</a>";
	      print "</li>";
	      //
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."materias' class='nav-link ";
	      if(isset($datos["activo"]) && $datos["activo"]=="materias") print "active";
	      print "'>Materias</a>";
	      print "</li>";
	      //
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."usuarios' class='nav-link ";
	      if(isset($datos["activo"]) && $datos["activo"]=="usuarios") print "active";
	      print "'>Usuarios</a>";
	      print "</li>";
	      //
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."salones' class='nav-link ";
	      if(isset($datos["activo"]) && $datos["activo"]=="salones") print "active";
	      print "'>Salones</a>";
	      print "</li>";
	      //
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."cursos' class='nav-link ";
	      if(isset($datos["activo"]) && $datos["activo"]=="cursos") print "active";
	      print "'>Cursos</a>";
	      print "</li>";
	      //
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."materiales' class='nav-link ";
	      if(isset($datos["activo"]) && $datos["activo"]=="materiales") print "active";
	      print "'>Materiales</a>";
	      print "</li>";
	      //
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."catalogos' class='nav-link ";
	      if(isset($datos["activo"]) && $datos["activo"]=="catalogos") print "active";
	      print "'>Catálogos</a>";
	      print "</li>";
	      //
	      print "</ul>";
	      //
	      print "<ul class='nav navbar-nav ms-auto'>";
	      //
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."tablero/perfil' class='nav-link'>Perfil</a>";
	      print "</li>";
	      print "<li class='nav-item'>";
	      print "<a href='".RUTA."tablero/logout' class='nav-link'>Salida</a>";
	      print "</li>";
	      print "</ul>";
	    }  
	?>

    </nav>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <?php 
                if (isset($datos["errores"])) {
                    if (count($datos["errores"])>0) {
                        print "<div class='alert alert-danger mt-3'>";
                        foreach ($datos["errores"] as $valor) {
                            print "<strong>* ".$valor."</strong><br>";
                        }
                        print "</div>";
                    }
                }
                ?>
                <div class="card p-4 mt-3 bg-light">
                    <div class="card-header text-center">
                        <h2><?php print $datos["subtitulo"]; ?></h2>
                </div>
                <div class="card-body">
