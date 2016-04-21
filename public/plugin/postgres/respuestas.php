<?php 
if(isset($_POST['modulo']) && isset($_POST['evaluacion']) && isset($_POST['respuestas']) && isset($_POST['cedula']))
{ 	
	//echo 'llego';
	$modulo = $_POST['modulo'];
	$evaluacion = $_POST['evaluacion'];
	$respuestas = $_POST['respuestas'];
	$cedula = $_POST['cedula'];

	include_once("librerias.php");

	$custom = new funciones_ejecucion();

	$respuestas = $custom->respuestas($modulo, $evaluacion, $respuestas, $cedula);

	echo json_encode($respuestas);
}


/*
SELECT * FROM osteologia 
ORDER BY RANDOM()
LIMIT 3
 */
?>
