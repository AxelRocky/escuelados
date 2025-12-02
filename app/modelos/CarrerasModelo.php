<?php
/**
 * 
 */
class CarrerasModelo
{
    private $db = "";

    function __construct()
    {
        $this->db = new Mariadb();
    }

    function getTabla()
    {
        $sql = "SELECT * FROM carreras WHERE baja=0";
        return $this->db->querySelect($sql);
    }
}
?>
