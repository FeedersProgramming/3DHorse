<?php 

function conectar_pg($host, $port, $db, $user, $passwd)
{	
	$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
	$cnx = pg_connect($strCnx); 

	if(! $cnx){
		die ("ERROR AL CONECTAR POSTGRES:".pg_last_error());
	}
}


function ejecutar_sql($sql){

	//$conexion = conectar_mysql("localhost", "root", "", "pegasoft");

	$resultado = pg_query($sql);

	if (! $resultado ) {die("ERROR AL EJECUTAR LA CONSULTA: ".pg_last_error());}

	return $resultado;

}
?>