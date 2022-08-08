<?php
include("../conex/conexion.php");
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM rubroarticulo WHERE Rubro = '$id'";
  $result = mysqli_query($miConexion, $query);
  if(!$result) {
    die(" No se Elimino ");
  }else{
    die(" Elimininado ");
  }
 
}
?>