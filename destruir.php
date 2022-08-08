<?php 
session_start();

session_destroy();

echo '<script language=javascript>
		  alert("Has cerrado sesion")
		  self.location = "index.php"</script>';

?>