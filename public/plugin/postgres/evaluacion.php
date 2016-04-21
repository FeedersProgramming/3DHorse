<?php 
if(isset($_POST['modulo']) && isset($_POST['tema']))
{ 	
	//echo 'llego';
	$modulo = $_POST['modulo'];
	$tema = $_POST['tema'];
	$opc = $_POST['opc'];
	$division = $_POST['division'];

	include_once("librerias.php");

	$custom = new funciones_ejecucion();

	$evaluacion = $custom->evaluacion($modulo, $tema, $opc, $division);

	//echo $evaluacion;

	$datos[] = array(
		'id'   => 1,
		'nombre'   => 'Humero',
		'descripcion'     => 'Forma parte del esqueleto apendicular superior y está ubicado en la región del brazo',
		'region'   => 'Extremidades inferiores',	
		'grupo'   => 'Apendicular',
		'shape'   => '123',
		'material'   => '312'
		);
	echo json_encode($evaluacion);
}


/*
SELECT * FROM osteologia 
ORDER BY RANDOM()
LIMIT 3
 */
?>
