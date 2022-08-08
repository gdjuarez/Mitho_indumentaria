<?php
  
  require_once('config.php');
    
    $miConexion = mysqli_connect( $db_host, $db_usuario, $db_contra,$db_nombre);
    
    if (!$miConexion) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
   // echo "conectado Online!";
   // echo "Información del host: " . mysqli_get_host_info($miConexion) . PHP_EOL;
    
    //mysqli_close($miConexion);
?>

