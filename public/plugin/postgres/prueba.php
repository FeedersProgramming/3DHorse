<?php 
  /*echo $_GET['usuario'] . ' - ';
  echo $_GET['cedula'];*/
  if(isset($_GET['cedula']) && isset($_GET['usuario']))
  { 
    $cedula = $_GET['cedula'];
    $usuario = $_GET['usuario'];

    include_once("librerias.php");

    $custom = new funciones_ejecucion();

    if ($usuario != "Invitado") {
      
      $datos = $custom->mostrarFormulario($cedula);
      foreach($datos as $nombreCampo)
      {
        if ($nombreCampo['cedula'] == $cedula) {

          $arreglo = array(
            'cedula' => $nombreCampo['cedula'],
            'nombre' => $nombreCampo['nombre'],
            'apellido' => $nombreCampo['apellido'],
            'sexo' => $nombreCampo['sexo'],
            'telefono' => $nombreCampo['telefono'],
            'email' => $nombreCampo['email'],
            'fecha_nacimiento' => $nombreCampo['fecha_nacimiento'],
            'estado' => $nombreCampo['estado'],
            'foto_perfil' => $nombreCampo['foto_perfil']
            );
          echo json_encode($arreglo);
                    //echo '{usuario: '. json_encode($arreglo).'}';
                    //echo '{success:true, usuario: '.json_encode($arreglo);
                    //echo $nombreCampo['cedula'] . ' - ' . $nombreCampo['nombre'] . ' - ' . $nombreCampo['apellido']; 
          exit;                  
        }
      }
    }
    
    
      //echo $cedula;
  }
  ?>
