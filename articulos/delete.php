<?php
include("../conex/conexion.php");
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM articulo WHERE idArticulo = $id";
  $result = mysqli_query($miConexion, $query);
  if(!$result) {
    die(" No se puede Eliminar el ARTICULO:  $id forma parte de transacciones");
  }
  header('Location: articulos.php');
}
?>