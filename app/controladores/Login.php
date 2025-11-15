<?php
class Login extends Controlador
{
    function __construct()
    {
    //code
    }

    public function caratula($value='')
    {
        print "Bienvenid@ al sistema de control escolar perros del gobierno";
    }
    // entendamos como a un metodo le vamos a pasar parametros
    public function metodoVariable()
    {
        if (func_num_args()>0) {
            for ($i=0; $i < print func_get_arg(); $i++) { 
                print func_get_arg($i)."<br>";
            }
        } else {
            print "No hay argumentos sencillos perros"<
        }
        
    }
}

?>
