<?php

class Controlador 
{
    function __construct()
    {
    
    }
    public function modelo($modelo='')
    {
        if (file_exists("../app/modelos/".$modelo.".php")) {
            require_once("../app/modelos/".$modelo.".php");
            return new $modelo();
        } else {
            die("El modelo".$modelo."no existe el modelo papa querido");
        }
        
    }

     public function vista($vista='',$datos=[])
    {
        if (file_exists("../app/vistas/".$vista.".php")) {
            require_once("../app/vistas/".$vista.".php");
        } else {
            die("La vista".$vista."no existe la vista papa querido");
        }
        
    }
}

?>


