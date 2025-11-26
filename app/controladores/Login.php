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
        $errores = [];
        // Verificar si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar formulario
            $usuario = $_POST['usuario']??"";
            if (empty($usuario)) {
               array_push($errores, "El correo electrónico es requerido.");
            }
            if (filter_var($usuario, FILTER_VALIDATE_EMAIL) === false) {
               array_push($errores, "El correo electrónico no es valido.");
            }
            if (empty($errores)) {
                // Aquí iría la lógica 
                if ($this->modelo->validarCorreo($usuario)) {
                    if ($this->modelo->enviarCorreo($usuario)) {
                        $datos = [
                        "titulo" => "Cambio clave de acceso",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Cambio de clave de acceso",
                        "texto" => "Se ha enviado un correo a <b>".$usuario."</b> con las instrucciones para cambiar su clave de acceso. Cualquier duda favor de comunicarse al área de soporte técnico. No olvides revisar tu carpeta de SPAM.",
                        "color" => "alert-success",
                        "url" => "login",
                        "colorBoton" => "btn-success",
                        "textoBoton" => "Regresar al inicio"
                    ];
                        $this->vista("mensaje", $datos);
                        
                    } else {
                         $datos = [
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
                        $this->vista("mensaje", $datos);
                    }
                    
                } else {
                     $datos = [
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
                        $this->vista("mensaje", $datos);
                }
               
            }
            exit;
        }
        $datos = [
            "titulo" => "Olvido de la clave de acceso",
            "subtitulo" => "Olvido de clave de acceso",
            "errores" => $errores,
            "data" => []
        ];
        $this->vista("loginOlvidoVista", $datos);
    }
    public function cambiarclave($data='')
    {
        $id = Helper::desencriptar($data);
        $errores = [];
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            $id = $_POST['id']??"";
            $clave1 = $_POST['clave']??"";
            $clave2 = $_POST['verifica']??"";
            //
            if (empty($clave1)) {
                array_push($errores, "la clave de acceso es requerida.");
            } 
            if (empty($clave2)) {
                array_push($errores, "La confirmación de la clave de acceso es requerida.");
            }
            if ($clave1 != $clave2) {
                array_push($errores, "Las claves de acceso no coinciden.");
            }
            if (count($errores)==0){
                $clave = hash_hmac("sha512", $clave1, CLAVE);
                $data = ["clave" => $clave, "id"=>$id];
                if ($this->modelo->actualizarClaveAcceso($data)) {
                    $datos = [
                        "titulo" => "Cambio de clave de acceso",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Cambio de clave de acceso",
                        "texto" => "Se ha cambiado la clave de acceso con exito.",
                        "color" => "alert-success",
                        "url" => "login",
                        "colorBoton" => "btn-success",
                        "textoBoton" => "Regresar al inicio"
                    ];
                        $this->vista("mensaje", $datos);
                } else {
                    $datos = [
                        "titulo" => "Cambio de clave de acceso",
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
                        $this->vista("mensaje", $datos);
                }
            }
            exit;
        }
        $datos = [
            "titulo" => "Cambiar contraseña",
            "subtitulo" => "Cambio contraseña",
            "errores" => $errores,
            "data" => $id
        ];
        $this->vista("loginCambiarVista", $datos);
    }
    public function verificar()
    {
         $errores = [];
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            $id = $_POST['id']??"";
            $usuario = $_POST['usuario']??"";
            $clave2 = $_POST['clave']??"";
            //
            if (empty($clave)) {
                array_push($errores, "la clave de acceso es requerida.");
            } 
            if (empty($usuario )) {
                array_push($errores, "La confirmación de la clave de acceso es requerida.");
            }
            
           //
            if (count($errores)==0){
                //
                $clave = hash_hmac("sha512", $clave, CLAVE);
                $data = $this->modelo->validarCorreo($usuario);
                //
                if ($data["clave"]==$clave) {
                    $sesion = new Sesion();
                    $sesion->iniciarLogin($data);
                    header("Location: ".RUTA."tablero");
                } else {
                    $datos = [
                        "titulo" => "Sistema escolar",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Sistema escolar",
                        "texto" => "Existe un error al acceder al Sistema escolar.",
                        "color" => "alert-danger",
                        "url" => "login",
                        "colorBoton" => "btn-danger",
                        "textoBoton" => "Regresar"
                    ];
                        $this->vista("mensaje", $datos);
                }
            }
        }
    }
}

?>
