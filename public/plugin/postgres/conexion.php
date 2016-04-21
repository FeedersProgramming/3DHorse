<?php

class conexion{
	private $servidor;
	private $usuario;
	private $pass;
	private $base_de_datos;
	private $descriptor;
	private $port;
	private $resultado;

	public function __construct($servidor, $usuario, $pass, $base_de_datos, $port){
		$this -> servidor = $servidor;
		$this -> usuario = $usuario;	
		$this -> pass = $pass;
		$this -> base_de_datos = $base_de_datos;
		$this -> port = $port;
		$this -> conectarse_base_datos();
	}//$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";

	public function conectarse_base_datos(){
		$strCnx = "host=".$this -> servidor." port=".$this -> port." dbname=". $this -> base_de_datos ." user=".$this -> usuario ." password= ". $this -> pass."";
		$connection = pg_connect($strCnx);
		if (!$connection) {
			die("Database connection failed: " . pg_last_error());
		}
	}

	public function con(){
		return $this -> $base_de_datos;
	}
}

if(!isset($base_de_datos))
{
	$base_de_datos = new conexion("localhost", "postgres", "1234", "HorseAnatomy", 5432);
}

?>