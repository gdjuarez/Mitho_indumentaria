<?php
include('../conex/conexion.php');
//Recibir
$Marca = strip_tags($_POST['marca']);

//verifico que no este VACIO el campo usuario
if((isset($_POST['marca']) && empty($_POST['marca']))
      ){
      echo '<script language=javascript>
          alert("Los datos son obligatorios")
          self.location = "articulos.php"</script>';
    }else{
         
    $sql= 'INSERT INTO marcaarticulo (Marca) values ("'.$Marca.'")';

         $grabar = mysqli_query($miConexion,$sql);
   if($grabar)
    {
      echo '<script language=javascript>
          alert("Marca registrada.")
          self.location = "marca.php"</script>'; 
    // header('Location: marca.php');
    }else{
      echo '<script language=javascript>
          alert("Hubo un error en el registro ARTICULO")
          self.location = "marca.php"</script>';
    }
   }
 
?>