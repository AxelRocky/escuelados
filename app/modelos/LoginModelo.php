<?php
/**
 * 
 */
class LoginModelo
{
    private $db = "";

    function __construct()
    {
        $this->db = new Mariadb();
    }

    public function validarCorreo($usuario='')
    {
        //
       if (empty($usuario)) return false;
       $sql = "SELECT * FROM usuarios WHERE correo =:correo";
       $data = [":correo" => $usuario];
       return $this->db->query($sql, $data);
    }

    public function actualizarClaveAcceso($data)
    {
        //
       if (empty($data)) return false;  
       $sql = "UPDATE usuarios SET clave=:clave WHERE id=:id";
       return $this->db->queryNoSelect($sql, $data);
    }

    public function enviarCorreo($email='')
    {
       $data = [];
        if ($email=="") {
            return false;
        } else {
            $data = $this->validarCorreo($email);
            if (!empty($data)) {
            $id = Helper::encriptar($data["id"]);
            // 
            $msg = "Entra a la siguiente liga para cambiar tu clave de acceso alcontrol de gastos..<br>";
            $msg .= "<a href='".RUTA."login/cambiarclave/".$id."'>Cambiar clave de acceso</a>";
           
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: noreply@escuelapitagoras.com' . "\r\n";
            $headers .= 'Reply-To: ayuda@escuelapitagoras.com' . "\r\n";
            
            $asunto = "Cambiar clave de acceso";
            var_dump($msg);
            return @mail($email, $asunto, $msg, $headers);
        }else{
                        return [
                            "titulo" => "Cambio clave de acceso",
                            "menu" => false,
                            "errores" => [],
                            "data" => [],
                            "subtitulo" => "Cambio de clave de acceso",
                            "texto" => "Existe un problema con el correo electrónico proporcionado. Favor de verificarlo e intentarlo nuevamente. Si el problema persiste, favor de comunicarse al área de soporte técnico.",
                            "color" => "alert-danger",
                            "url" => "login",
                            "colorBoton" => "btn-danger",
                            "textoBoton" => "Regresar al inicio"
                        ];
        } 

        } 
    }
}
?>

