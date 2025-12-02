<?php  
/**
 * 
 */
class Carreras extends Controlador
{
	private $modelo = "";
	private $admon;
	
	function __construct()
	{
		//Creamos sesion
		$sesion = new Sesion();
		if ($sesion->getLogin()) {
			$this->modelo = $this->modelo("CarrerasModelo");
			$this->admon = $sesion->getAdmon();
		} else {
			header("location:".RUTA);
		}
		
		
	}

	public function caratula()
	{
		$data = $this->modelo->getTabla();

		$datos = [
			"titulo"=> "Carreras",
			"subtitulo" => "Carreras",
			"admon" => $this->admon,
			"activo" => "carreras",
			"data" => $data,
			"menu" => true
		];
		$this->vista("carrerasCaratulaVista",$datos);
	}

}

?>