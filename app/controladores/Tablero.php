<?php

class Tablero extends Controlador
{
    private $modelo = "";

    function __construct()
    {
        $this->modelo = $this->modelo("TableroModelo");
    }

    public function caratula()
    {
        $datos = [
            "titulo" => "Entrada al sistema",
            "subtitulo" => "Escuela"
        ];
        $this->vista("tableroCaratulaVista", $datos);
    }
}

?>