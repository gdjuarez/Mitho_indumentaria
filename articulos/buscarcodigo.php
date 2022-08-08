<?php
include("../conex/conexion.php");

//------Recibo los Datos del ajax----
$prefijo = $_POST['prefijo'];
$pre = '';
$num = '';
$nume='';


$sql = "SELECT id,prefijo,numeral FROM contador_articulos WHERE prefijo= '$prefijo'";

//echo $sql;

$resultado = mysqli_query($miConexion, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {

	$pre = $row['prefijo'];
	$nume = $row['numeral'];
	$nume = $nume + 1;
	$num = str_pad($nume , 4 , "0" , STR_PAD_LEFT);

}

//echo $codigo;

?>


		<input type="text" name='pre' value="<?php echo $pre ?>" hidden>
		<input type="text" name='num' value="<?php echo $num ?>" hidden>	
		<p><input type="text" value="<?php echo $pre.$num ?>" readonly required></p>
	



<?php

?>