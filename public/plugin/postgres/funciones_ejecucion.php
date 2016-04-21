<?php 

class funciones_ejecucion
{
	function __construct()
	{	

		/*$user = 'matemati_horse';
		$passwd = 'rata123.';
		$db = "matemati_rata";
		$port = 5432;
		$host = '186.147.110.156';*/
/*		$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
		$cnx = pg_connect($strCnx); 
*/
		include_once('formularios.php');
		$user = 'postgres';
		$passwd = '1234';
		$db = "HorseAnatomy";
		$port = 5432;
		$host = 'localhost';
        //$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
        //$cnx = pg_connect($strCnx);

		$conexion = conectar_pg($host, $port, $db, $user, $passwd);
	}

	function mostrarFormulario ($cedula)
	{
		$dbListar = new formularios();
		$res = $dbListar->mostrarUsuarios($cedula);
		return $res;    	
	}
	

	function insertarCampos ($cedula, $nombre, $apellido, $usuario, $contrasena, $telefono, $email, $genero, $fecha, $rol)
	{
		$dbInsertar = new formularios();	 
		$dbInsertar->insertarUsuario ($cedula, $nombre, $apellido, $usuario, $contrasena, $telefono, $email, $genero, $fecha, $rol);
	}

	function login($usuario){
		$dbListar = new formularios();
		$res = $dbListar->login($usuario);
		return $res; 
	}

	function evaluacion($modulo, $tema, $opc, $division){
		$dbevaluacion = new formularios();
		$res = $dbevaluacion->evaluacion($modulo, $tema, $opc, $division);
		return $res; 
	}

	function respuestas($modulo, $evaluacion, $respuestas, $cedula){
		$dbrespuestas = new formularios();
		$res = $dbrespuestas->respuestas($modulo, $evaluacion, $respuestas, $cedula);
		return $res; 
	}
}
?>
