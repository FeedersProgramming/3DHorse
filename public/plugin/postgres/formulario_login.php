<?php 

/*$contrasena = hash("sha512", $contra);

hash("sha512", $contra)*/

if(isset($_POST['usuario_log']))
{	
  $usuario = $_POST['usuario_log'];
  $contrasena = hash("md5", $_POST['contrasena_log']);
      //$contrasena = $_POST['contrasena'];
  include_once("librerias.php");

  
  $custom = new funciones_ejecucion();
  
  $validacion = $custom->login($usuario);

              //echo $usuario . ' - ' . $_POST['contrasena_log'] . '  / ';

  foreach($validacion as $nombreCampo)
  {
   
    if ($nombreCampo['usuario'] == $usuario) {
      if ($nombreCampo['contrasena'] == $contrasena) {
                        //echo $nombreCampo['usuario'] . ' - ' .$nombreCampo['cedula'] . ' - ' . $nombreCampo['sexo'] . '  / ' ;
        echo '{success:true, usuario: '.json_encode($validacion).'}';
        exit;
      }else{
        echo '{success:false, error: '.json_encode("Contrasena Incorrecta").'}';
        exit;
      }                     
    }     
  }

  echo '{success:false, error: '.json_encode("Usuario y/o Contrasena Incorrectos").'}';
  exit;
}
?>
