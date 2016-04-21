<?php 


class formularios
{


	function insertarUsuario($cedula, $nombre, $apellido, $usuario, $contrasena, $telefono, $email, $genero, $fecha, $rol)
	{
		$foto = "";
		if ($genero == 'femenino') {
			$foto = "app/view/img/usuarios/mujer.png";
		}else if ($genero == 'masculino') {
			$foto = "app/view/img/usuarios/hombre.png";
		}

		$sql = "INSERT INTO usuarios (cedula, nombre, apellido, sexo, telefono, email, fecha_nacimiento, estado, foto_perfil) ".
		"VALUES ('$cedula', '$nombre', '$apellido', '$genero', '$telefono', '$email', '$fecha', 'Activo', '$foto')";
		//$resultado=ejecutar_sql(conectar_mysqli("mysql.hostinger.es","u468034921_pega", "mvp2057108", "u468034921_pega"), $sql);
		$resultado=ejecutar_sql($sql);

		$sql2 = "INSERT INTO acceso (idusuario, usuario, contrasena, rol) ".
		"VALUES ('$cedula', '$usuario', '$contrasena', '$rol')";
		//$resultado=ejecutar_sql(conectar_mysqli("mysql.hostinger.es","u468034921_pega", "mvp2057108", "u468034921_pega"), $sq2);
		$resultado=ejecutar_sql($sql2);
	}
	
	function mostrarUsuarios($cedula)
	{		
		//$sql="SELECT * FROM usuarios where cedula = '$cedula'";
		$sql="SELECT * FROM usuarios";
		//$resultado=ejecutar_sql(conectar_mysqli("mysql.hostinger.es","u468034921_pega", "mvp2057108", "u468034921_pega"), $sql);
		//conectar_mysql();
		$resultado=ejecutar_sql($sql);
		$arregloLista = array(); 	
		while ($fila= pg_fetch_assoc($resultado))
		{ 
			$arregloLista[] = $fila; 	
		}   	
		return $arregloLista;
	}

	function login($usuario)
	{		
		
		$sql="SELECT * FROM acceso inner join usuarios on acceso.idusuario = usuarios.cedula where acceso.usuario = '$usuario'";
		//$resultado=ejecutar_sql(conectar_mysqli("mysql.hostinger.es","u468034921_pega", "mvp2057108", "u468034921_pega"), $sql);

		$resultado = ejecutar_sql($sql);
		$arregloLista = array(); 	
		while ($fila=pg_fetch_assoc($resultado))
		{ 
			$arregloLista[] = $fila; 	
		}   	
		return $arregloLista;
	}


	function respuestas($modulo, $evaluacion, $respuestas, $cedula)
	{
		//return $modulo . ' - ' . $evaluacion .  ' - ' . $respuestas .  ' - ' . $cedula;
		

		$sql = "UPDATE resultados SET respuestas = $respuestas WHERE id_users = $cedula AND id_evaluacion = ";

		if ($modulo == 1){//Axial
			if($evaluacion == 1){//teorica
				$sql .= '1';
			}else if($evaluacion == 2){//practica
				$sql .= '2';
			}
		}else if ($modulo == 2){//Apendicular
			if($evaluacion == 1){
				$sql .= '3';
			}else if($evaluacion == 2){
				$sql .= '4';
			}
		}else if ($modulo == 3){//Union
			if($evaluacion == 1){
				$sql .= '5';
			}else if($evaluacion == 2){
				$sql .= '6';
			}
		}

		$resultado = ejecutar_sql($sql);

		if($resultado){
			return 1;
		}else{
			return 2;
		}
	}


	function evaluacion($modulo, $tema, $opc, $division)
	{		
		//return $division . ' - ' . $tema . ' - ' . $opc;
		$arreglo = array();
		$arregloLista = array();
		$arregloListas = array();
		$arregloListass = array();
		$arregloaux = array();
		$tema_aux="";
		$cont = 0;

		$id = "";	
		//echo $opc;
		//echo "<script> console.log($division); </script>"; 
		//$division = "";


		if($opc ==  5){/// Practico
			if ($tema == 3) {
				$tema = "nada";
				$sql1="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion AND division = '" .$division. "' ORDER BY RANDOM() LIMIT 1";
			}else{
				$sql1="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE grupo = '" . $tema . "' AND division = '" .$division. "' ORDER BY RANDOM() LIMIT 1";
			}

			$resultado1 = ejecutar_sql($sql1);

			while ($fila = pg_fetch_array($resultado1))
			{
				$arregloLista[] = array(
					'id'          => $fila['id'],
					'nombre'      => $fila['nombre'],
					'descripcion'       => $fila['descripcion'],
					'division'          => $fila['division'],
					'grupo'      => $fila['grupo'],
					'idshape'      => $fila['idshape'],
					'idmaterial'       => $fila['idmaterial'],
					'descripcion2'       => $fila['descripcion2']
					);
				$id = $fila['id'];
				$division = $fila['division'];

				$arreglo = array_merge($arregloLista);
			}
			
			$sql2="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE grupo = '" . $tema . "' AND id != '".$id."' ORDER BY RANDOM() LIMIT 15";	
			$resultado2 = ejecutar_sql($sql2);
			while ($fila = pg_fetch_array($resultado2))
			{
				$arregloListas[] = array(
					'id'          => $fila['id'],
					'nombre'      => $fila['nombre'],
					'descripcion'       => $fila['descripcion'],
					'division'          => $fila['division'],
					'grupo'      => $fila['grupo'],
					'idshape'      => $fila['idshape'],
					'idmaterial'       => $fila['idmaterial'],
					'descripcion2'       => $fila['descripcion2']
					);
				$arreglo = array_merge($arregloListas);
				//array_push($arreglo, $arregloListas); 
			}

			$sql3="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE grupo != '" . $tema . "' AND id != '".$id."' ORDER BY RANDOM() LIMIT 15";	
			$resultado3 = ejecutar_sql($sql3);
			while ($fila = pg_fetch_array($resultado3))
			{
				$arregloListass[] = array(
					'id'          => $fila['id'],
					'nombre'      => $fila['nombre'],
					'descripcion'       => $fila['descripcion'],
					'division'          => $fila['division'],
					'grupo'      => $fila['grupo'],
					'idshape'      => $fila['idshape'],
					'idmaterial'       => $fila['idmaterial'],
					'descripcion2'       => $fila['descripcion2']
					);
				$arreglo = array_merge($arregloListass);
				//array_push($arreglo, $arregloListas); 
			}

			return $arreglo;
		}else if ($opc != 2){

			if ($tema == 3) {
				$tema = "nada";
				$sql1="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion AND division = '" .$division. "' ORDER BY RANDOM() LIMIT 1";
			}else{
				$sql1="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE grupo = '" . $tema . "' AND division = '" .$division. "' ORDER BY RANDOM() LIMIT 1";
			}

			$resultado1 = ejecutar_sql($sql1);

			while ($fila = pg_fetch_array($resultado1))
			{
				$arregloLista[] = array(
					'id'          => $fila['id'],
					'nombre'      => $fila['nombre'],
					'descripcion'       => $fila['descripcion'],
					'division'          => $fila['division'],
					'grupo'      => $fila['grupo'],
					'idshape'      => $fila['idshape'],
					'idmaterial'       => $fila['idmaterial'],
					'descripcion2'       => $fila['descripcion2']
					);
				$id = $fila['id'];
				$division = $fila['division'];
			//array_push($arregloLista, $arregloListaa); 
			//$arreglo = array_merge($arregloLista);
			}
			$cont = 0;

			do{
				$sql2="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE id != '".$id."' ORDER BY RANDOM() LIMIT 2";	
				$resultado2 = ejecutar_sql($sql2);
				while ($fila = pg_fetch_array($resultado2))
				{
					$arregloListas[] = array(
						'id'          => $fila['id'],
						'nombre'      => $fila['nombre'],
						'descripcion'       => $fila['descripcion'],
						'division'          => $fila['division'],
						'grupo'      => $fila['grupo'],
						'idshape'      => $fila['idshape'],
						'idmaterial'       => $fila['idmaterial'],
						'descripcion2'       => $fila['descripcion2']
						);
					$arreglo = array_merge($arregloListas);
				//array_push($arreglo, $arregloListas); 
				}
				$cont++;
			}while($cont != 4);
		}else {

			if ($tema == 3) {
				$tema = "nada";
				$sql1="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion AND division = '" .$division. "' ORDER BY RANDOM() LIMIT 1";
			}else{
				$sql1="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE division = '" .$division. "' AND grupo = '" . $tema . "' ORDER BY RANDOM() LIMIT 1";
			}


			$resultado1 = ejecutar_sql($sql1);

			while ($fila = pg_fetch_array($resultado1))
			{
				$arregloLista[] = array(
					'id'          => $fila['id'],
					'nombre'      => $fila['nombre'],
					'descripcion'       => $fila['descripcion'],
					'division'          => $fila['division'],
					'grupo'      => $fila['grupo'],
					'idshape'      => $fila['idshape'],
					'idmaterial'       => $fila['idmaterial'],
					'descripcion2'       => $fila['descripcion2']
					);
				$id = $fila['id'];
				$division = $fila['division'];
				$tema_aux = $fila['grupo'];
			}

			$arreglo = array_merge($arregloLista);

			if ($tema == 3) {
				$sql2="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE id != '".$id."' ORDER BY RANDOM() LIMIT 7";
			}else{
				$sql2="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE grupo = '".$tema_aux."' AND id != '".$id."' ORDER BY RANDOM() LIMIT 7";
			}

			$resultado2 = ejecutar_sql($sql2);

			while ($fila = pg_fetch_array($resultado2))
			{
				$arregloListas[] = array(
					'id'          => $fila['id'],
					'nombre'      => $fila['nombre'],
					'descripcion'       => $fila['descripcion'],
					'division'          => $fila['division'],
					'grupo'      => $fila['grupo'],
					'idshape'      => $fila['idshape'],
					'idmaterial'       => $fila['idmaterial'],
					'descripcion2'       => $fila['descripcion2']
					);
			}

			$arreglo = array_merge($arregloListas);

			if ($tema == 3) {
				$sql3="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE id != '".$id."' ORDER BY RANDOM() LIMIT 7";
			}else{
				$sql3="SELECT * FROM $modulo inner join descripciones de ON $modulo.id_descripcion = de.id_descripcion WHERE grupo != '" . $tema . "' AND id != '".$id."' ORDER BY RANDOM() LIMIT 7";
			}

			$resultado3 = ejecutar_sql($sql3);

			while ($fila = pg_fetch_array($resultado3))
			{
				$arregloListass[] = array(
					'id'          => $fila['id'],
					'nombre'      => $fila['nombre'],
					'descripcion'       => $fila['descripcion'],
					'division'          => $fila['division'],
					'grupo'      => $fila['grupo'],
					'idshape'      => $fila['idshape'],
					'idmaterial'       => $fila['idmaterial'],
					'descripcion2'       => $fila['descripcion2']
					);
			}

			//$arregloListas = array_merge($arregloListass);
		}


		$arreglo = array_merge($arregloListas, $arregloListass);
		//array_push($arreglo, $arreglo); 
		return $arreglo;

	}

}
?>