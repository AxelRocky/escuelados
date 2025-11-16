<?php
class Login extends Controlador
{
    private $modelo = "";

    function __construct()
    {
        $this->modelo = $this->modelo("LoginModelo");
    }

    public function caratula()
    {
        $datos = [
            "titulo" => "Entrada al sistema",
            "subtitulo" => "Escuela"
        ];
        $this->vista("loginCaratulaVista", $datos);
    }
    public function olvido()
    {
        $datos = [
            "titulo" => "Recuperar clave de acceso",
            "subtitulo" => "Olvido de clave de acceso"
        ];
        $this->vista("loginOlvidoVista", $datos);
    }
  
}

?>
