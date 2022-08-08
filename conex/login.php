<?php
session_start();
include("../conex/conexion.php");

//Recibir
$user = strip_tags($_POST['user']);
$pass = strip_tags(sha1($_POST['pass']));
//$user = mysqli_real_escape_string($niConexion, $_POST['user']);
//$pass = mysqli_real_escape_string($niConexion, $_POST['pass']);

$sql='SELECT * FROM usuarios WHERE user="'.mysqli_real_escape_string($miConexion, $user).'" AND pass="'.mysqli_real_escape_string($miConexion, $pass).'"';
//echo $sql;

$consulta = mysqli_query($miConexion,$sql);


 if($existe = mysqli_fetch_object($consulta))
 {
	$_SESSION['logged'] = 'yes';
	$_SESSION['user'] = $user;
	
	//echo '<script language=javascript>
		//  alert("Logeado exitosamente ,Bienvenido!!")</script>';

	echo '<script>window.location="../menu/menu.php"</script>';
		
  }else{
      
	echo '<script language=javascript>
		  alert("Usuario y/o clave, son incorrectos")
		  self.location = "../index.php"</script>';
		 

										
  }
  
  mysqli_close($miConexion);

?>