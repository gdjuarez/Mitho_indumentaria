<?php
include('../conex/conexion.php');
//Recibir
$Rubro = strip_tags($_POST['rubro']);
$prefijo = $_POST['prefijo'];

//echo $Rubro;
//echo $prefijo;

//verifico que no este VACIO el campo usuario
if ((isset($_POST['rubro']) && empty($_POST['rubro']))) {

      echo '<script language=javascript>
          alert("Los datos son obligatorios")
          self.location = "rubro.php"</script>';
} else {

      $sql = 'INSERT INTO rubroarticulo (Rubro) values ("' . $Rubro . '")';

      $grabar = mysqli_query($miConexion, $sql);

      $sql2 = 'INSERT INTO contador_articulos (prefijo,numeral) values ("' . $prefijo . '","0000")';

      $grabar2 = mysqli_query($miConexion, $sql2);


      if ($grabar) {
            echo '<script language=javascript>
          alert("Rubro registrado.")
          self.location = "rubro.php"</script>';
            // header('Location: marca.php');
      } else {
            echo '<script language=javascript>
          alert("Hubo un error en el registro rubroarticulo")
          self.location = "rubro.php"</script>';
      }
}
 
?>