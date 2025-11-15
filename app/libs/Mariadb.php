<?php
class Mariadb
{
	private $host = "localhost";
	private $usuario = "axel";
	private $clave = "chupi";
	private $db = "escuela";
	private $puerto = "3306";
	private $conn;
	
	
	function __construct()
	{
		try {
		  $this->conn = new PDO(
		  	'mysql:host='.$this->host.';dbname='.$this->db, 
		  	$this->usuario, 
		  	$this->clave
		  );
		 // echo "Conectado";
		} catch (Exception $e) {
		  die("No se pudo conectar: " . $e->getMessage());
		}
	}

}
