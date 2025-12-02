


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
        if (isset($_COOKIE['datos'])) {
            $datos_array = explode("|", $_COOKIE['datos']);
            $usuario = $datos_array[0];
            $clave = Helper::desencriptar($datos_array[1]);
            $data = [
                "usuario" => $usuario,
                "clave" => $clave
            ];
        } else {
             $data = [];
        }
        
        $datos = [
            "titulo" => "Entrada al sistema",
            "subtitulo" => "Escuela",
            "menu" => false,
            "admon" => "admon",
            "data" => $data
        ];
        $this->vista("loginCaratulaVista", $datos);
    }
    
    public function olvido()
    {
        $errores = [];
        // 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'] ?? "";
            //
            if (empty($usuario)) {
                array_push($errores, "El correo electrónico es requerido.");
            }
            if (filter_var($usuario, FILTER_VALIDATE_EMAIL) === false) {
                array_push($errores, "El correo electrónico no es valido.");
            }
            //
            if (empty($errores)) {
                // Validar en la base de datos
                if ($this->modelo->validarCorreo($usuario)) {
                    $res = $this->modelo->enviarCorreo($usuario);
                    if (is_bool($res)) {
                        if ($res) {
                            $datos = [
                                "titulo" => "Cambio clave de acceso",
                                "menu" => false,
                                "errores" => [],
                                "data" => [],
                                "subtitulo" => "Cambio de clave de acceso",
                                "texto" => "Se ha enviado un correo a <b>" . $usuario . "</b> para que puedas cambiar tu clave de acceso. Cualquier duda te puedes comunicar con nosotros. No olvides revisar tu bandeja de spam.",
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
                                "texto" => "Existió un error al enviar el correo electrónico. Favor de intentarlo más tarde o reportarlo a soporte técnico.",
                                "color" => "alert-danger",
                                "url" => "login",
                                "colorBoton" => "btn-danger",
                                "textoBoton" => "Regresar"
                            ];
                            $this->vista("mensaje", $datos);
                        }
                    } else {
                        $this->vista("mensaje", $res);
                    }

                } else {
                    $datos = [
                        "titulo" => "Cambio clave de acceso",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Cambio de clave de acceso",
                        "texto" => "El correo electrónico no se encuentra en nuestra base de datos.",
                        "color" => "alert-danger",
                        "url" => "login",
                        "colorBoton" => "btn-danger",
                        "textoBoton" => "Regresar"
                    ];
                    $this->vista("mensaje", $datos);
                }
            }
        } else {
            $datos = [
                "titulo" => "Olvido de la clave",
                "subtitulo" => "Olvidaste la clave de acceso",
                "errores" => $errores,
                "data" => []
            ];
            $this->vista("loginOlvidoVista", $datos);
        }
    }
    public function cambiarclave($data = '')
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
            //
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
                        "texto" => "Existió un error al actualizar la clave de acceso. Favor de intentarlo más tarde o reportarlo a soporte técnico.",
                        "color" => "alert-danger",
                        "url" => "login",
                        "colorBoton" => "btn-danger",
                        "textoBoton" => "Regresar"
                    ];
                        $this->vista("mensaje", $datos);
                }
                exit;
            }      
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
            $clave = $_POST['clave']??"";
            $recordar = isset($_POST['recordar'])?"on":"off";
            //Recordar
            $valor = $usuario."|".Helper::encriptar($clave);
            if ($recordar=="on") {
                $fecha = time()+(60*60*24*7);
            } else {
                $fecha = time()-1;
            }
            setcookie("datos", $valor, $fecha, RUTA);
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
                    //
                    header("Location: ".RUTA."tablero");
                } else {
                    $datos = [
                        "titulo" => "Sistema escolar",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Sistema escolar",
                        "texto" => "Existió un error al acceder al sistema escolar. Favor de volver a intentar.",
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
