<?php
/**
 * 
 */
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

	public function query($sql, $data)
	{
		$stmt = $this->conn->prepare($sql);
		$stmt->execute($data);
		return $stmt->fetch(PDO::FETCH_ASSOC);	
	}

	public function querySelect($sql='')
	{
		if (empty($sql)) return false;
		$data = [];
		$stmt = $this->conn->query($sql);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		do {
			array_push($data, $row);
		} while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
		if (!$data[0]) {
			$data = [];
		}

	}
/*
	public function querySimple($sql='')
	{
		if (empty($sql)) return false;
		$stmt = $this->conn->query($sql);
		return $stmt->fetch(PDO::FETCH_ASSOC);	
	}
*/
	// Actualiza, Inserta, Elimina
	public function queryNoSelect($sql, $data)
	{	
		return $this->conn->prepare($sql)->execute($data);
	}

}

?>