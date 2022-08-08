<?php
include('../conex/conexion.php');

$pre='';
$num='';

$pre=$_POST['pre'];
$num=$_POST['num'];

//echo $pre;
//echo $num;

$idArticulo = $pre.$num;

//Recibir
//$idArticulo = strip_tags($_POST['idArticulo']);
$Descripcion = strip_tags($_POST['Descripcion']);
$PrecioCompra = strip_tags($_POST['PrecioCompra']);
$PrecioVenta = strip_tags($_POST['PrecioVenta']);
$Marca = strip_tags($_POST['Marca']);
$Rubro = strip_tags($_POST['Rubro']);
$Imagen = ''; //strip_tags($_POST['Imagen']);
//verifico que no este VACIO el campo usuario
if((isset($_POST['idArticulo']) && empty($_POST['idArticulo']))&&
  (isset($_POST['Descripcion']) && empty($_POST['Descripcion'])) &&
  (isset($_POST['PrecioCompra']) && empty($_POST['PrecioCompra'])) &&
  (isset($_POST['PrecioVenta']) && empty($_POST['PrecioVenta'])) &&
  (isset($_POST['Marca']) && empty($_POST['Marca'])) &&
  (isset($_POST['Rubro']) && empty($_POST['Rubro']))
      ){
      echo '<script language=javascript>
          alert("Los datos son obligatorios")
          self.location = "articulos.php"</script>';
    }else{
      $query = mysqli_query($miConexion,'SELECT * FROM articulo WHERE idArticulo="'.mysqli_real_escape_string($miConexion,$idArticulo).'"');
      if($existe = mysqli_fetch_object($query))
    {
      //echo 'El usuario '.$user.' ya existe.';
      echo '<script language=javascript>
          alert("Existe un Articulo con ese codigo") </script>';
    }else{
      //  idArticulo  Descripcion PrecioCompra  PrecioVenta IVA PrecioVentaCiva Marca Rubro Imagen
    $sql= 'INSERT INTO articulo (idArticulo,Descripcion,PrecioCompra,PrecioVenta,Marca,Rubro,Imagen) values ("'.mysqli_real_escape_string($miConexion,$idArticulo).'", "'.mysqli_real_escape_string($miConexion,$Descripcion).
    '", "'.str_replace(",",".",$PrecioCompra).'","'.str_replace(",",".",$PrecioVenta).'","'.$Marca.'","'.$Rubro.'","'.$Imagen.'")';

     //echo '<script>alert (" ARTICULO n°:  '.$sql.'");</script>';

      $grabar = mysqli_query($miConexion,$sql);
   if($grabar)
    {
  
    }else{
      echo '<script language=javascript>
          alert("Hubo un error en el registro ARTICULO")
          self.location = "articulos.php"</script>';
    }
    }
  }

//****************************************************************
// GRABO STOCK =  idArticulo  Stock StockMinimo
$Stock=0;
$StockMinimo=0;

$sqlSTOCK= 'INSERT INTO stockarticulos (idArticulo,Stock ,StockMinimo) values ("'.mysqli_real_escape_string($miConexion,$idArticulo).'",
 '.mysqli_real_escape_string($miConexion,$Stock).', '.mysqli_real_escape_string($miConexion,$StockMinimo).')';

     echo '<script>alert (" stockarticulos:  '.$sqlSTOCK.'");</script>';

      $grabar = mysqli_query($miConexion,$sqlSTOCK);
 /*  if($grabar)
    {
 
     header('Location: articulos.php');
    }else{
      echo '<script language=javascript>
          alert("Hubo un error en el registro STOCK")
          self.location = "articulos.php"</script>';
    }*/

//****************************************************************
// GRABO contador_articulo 
 


     $sql_actualizar="UPDATE contador_articulos SET numeral = '$num' where prefijo ='$pre'";

     echo $sql_actualizar;       
     
      $actualizar=mysqli_query($miConexion,$sql_actualizar)
        or die("error consulta: ".mysqli_error($miConexion));  
        
        if($actualizar)
        {
     
         header('Location: articulos.php');
        }else{
          echo '<script language=javascript>
              alert("Hubo un error en el registro")
              self.location = "articulos.php"</script>';
        }





?>