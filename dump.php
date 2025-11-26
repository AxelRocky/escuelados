  // entendamos como a un metodo le vamos a pasar parametros a traves de la ruta por la url
    public function metodoVariable()
    {
        if (func_num_args()>0) {
            for ($i=0; $i < print func_num_args() ; $i++) { 
                print func_get_arg($i)."<br>";
            }
        } else {
            print "No hay argumentos";
        }
        
    }
    public function metodoFijo($p1="uno", $p2="dos", $p3="tres")
    {
       print $p1."<br>";
       print $p2."<br>";
       print $p3."<br>";
    }