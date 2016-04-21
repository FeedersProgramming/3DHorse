<?php 

  ///se utiliza para realizar diferentes conexiones con otros php y ejecutar las consultas debidas

  /*nombre textfield
    cedula
    nombre
    apellido
    telefono
    email
    genero
    fecha
  */
  /*nombre base de datos
    cedula
    nombre
    apellido
    sexo
    telefono
    email
    fecha_nacimiento
    estado
  */
    if(isset($_POST['cedula']))
    {	
      
     $cedula=($_POST['cedula']);
     $nombre=($_POST['nombre']);
     $apellido=($_POST['apellido']);
     $usuario=($_POST['usuario']);
      //$contrasena=base64_encode($_POST['contrasena']);
     $contrasena = hash("md5", $_POST['contrasena']);
     $telefono=($_POST['telefono']);
     $email=($_POST['email']);
     $genero=($_POST['genero']);
     $fecha=($_POST['fecha']);
     $rol=($_POST['rol']);
     $val = true;

     include_once("librerias.php");
			   // Recibo los datos del archivo
			  /*$archivo_completo=($_FILES['documentoFile']['tmp_name']);
    		$nombre_archivo = ($_FILES['documentoFile']['name']);
    		$tipo = ($_FILES['documentoFile']['type']);
    		$tamano = ($_FILES['documentoFile']['size']);
 	    	$directorio = '../vista/archivos/';
 	    	$extension = strtolower(substr(strrchr($nombre_archivo, '.'), 1));///extenciones en minuscula*/
        
         $custom = new funciones_ejecucion();
         

         /******************************INSERTAR NUEVOS ARCHIVOS*****************************************/

  						//Verifico si el archivo a guardar ya existe almacenada en la BD
         $mostrarRepetido = $custom->mostrarFormulario($cedula);
         foreach($mostrarRepetido as $nombreCampo)
         {
                //echo $nombreCampo['cedula'] . '<br>';

          if ($nombreCampo['cedula'] == $cedula) {
            echo '{success:false, error: '.json_encode("Esta cedula YA ESTA REGISTRADA. Favor Verifica los datos").'}';
            $val = false;
            exit;
          }
        }

        if ($val) {
          $custom->insertarCampos($cedula, $nombre, $apellido, $usuario, $contrasena, $telefono, $email, $genero, $fecha, $rol);
          echo '{success:true}';  
          exit;
        }
  							/*if($nombreCampo['cedula'] == $cedula)
  							{
 	    						  echo '{success:false, error: '.json_encode("Esta cedula YA ESTA REGISTRADA. Favor Verifica los datos").'}';
 	    						  exit;
  			     		}else {
                    
                }*/
                
                
 	    				// Muevo el archivo desde su ubicación
   						// temporal al directorio definitivo
  		 					/*if(move_uploaded_file(($archivo_completo),$directorio.$nombre_archivo))
  		 					{
  			
		   						 $custom->insertarCampos($nombre, $descripcion, $nombre_archivo, $genero, $estado, $fecha);
								echo '{success:true}';	
              }*/
         //echo $custom->pru();
           	   //	else {echo '{success:false, error: '.json_encode("No se pudo copiar al servidor").'}';} //exit;}
            }
            ?>
