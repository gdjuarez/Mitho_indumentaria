<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];
}else{
	echo 'No te has logeado, inicia sesion.';
	header("Location: ../index.php"); /* Redirección del navegador */

}
?>
<?php
include("../conex/conexion.php");
//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);
$idArticulo = $_GET['id'];
//echo '<script>alert (" El codigo n°:  '.$idArticulo.' articulo ");</script>';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  //strval($variableName);  numero a cadena
 $idArticulo= strval($id);

  $query = "SELECT * FROM articulo WHERE idArticulo ='$idArticulo'";
//echo $query;

  $result = mysqli_query($miConexion, $query);

  if ($result) { $row = mysqli_fetch_array($result);
    $idArticulo = $row['idArticulo'];
    $Descripcion = $row['Descripcion'];
    $PrecioCompra = $row['PrecioCompra'];
    $PrecioVenta = $row['PrecioVenta'];
    $Marca = $row['Marca'];
    $Rubro = $row['Rubro'];
    $Imagen = $row['Imagen'];
    //echo '<script>alert (" --row Marca: '.$Marca.' row rubro:  '. $Rubro.'-");</script>';

	 // *****************LLENO LOS SELECT *************************
	$resultado=mysqli_query($miConexion,"SELECT * from marcaarticulo order by marca asc");

	$selectmarca="";

	  while ($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC))
	    {
	        $selectmarca0 .=" <option value='".$row['Marca']."'>".$row['Marca']."</option>";
	     }
	     $selectmarca1 .=" <option value='".$Marca."'selected>".$Marca."</option>";
	     $selectmarca= $selectmarca0.$selectmarca1;

	// Lleno el select/combobox consultando la base
	$resultado=mysqli_query($miConexion,"SELECT * from rubroarticulo order by rubro asc");

	$selectrubro="";
	  while ($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC))
	   	 {
	    	$selectrubro0 .=" <option value='".$row['Rubro']."'>".$row['Rubro']."</option>";
	     }
	     $selectrubro1 .=" <option value='".$Rubro."'selected>".$Rubro."</option>";
	     $selectrubro= $selectrubro0.$selectrubro1;

	//*******************************************************************************
  }
}

if (isset($_POST['update'])) {
  $idArticulo = $_POST['idArticulo'];
  $Descripcion =$_POST['Descripcion'];
  $PrecioCompra = $_POST['PrecioCompra'];
  $PrecioVenta = $_POST['PrecioVenta'];
  $Marca = $_POST['Marca'];
  $Rubro = $_POST['Rubro'];
  $Imagen = $_POST['Imagen'];


  echo '<script>alert (" El codigo n°:  '.$idArticulo.' articulo .");</script>';

 $actualizar=mysqli_query($miConexion,'UPDATE articulo SET Descripcion ="'.mysqli_real_escape_string($miConexion,$Descripcion).
      '",PrecioCompra="'.str_replace(",",".",$PrecioCompra).
      '",Precioventa="'.str_replace(",",".",$PrecioVenta).
      '",Marca="'.$Marca.
      '",Rubro="'.$Rubro.
      '",Imagen="'.$Imagen.
      '" where idArticulo ="'.mysqli_real_escape_string($miConexion,$idArticulo).'"')
      or die("error consulta: ".mysqli_error($miConexion));
     echo '<script language=javascript>
          alert("ACTUALIZADO")
          self.location = "articulos.php"</script>';
}

?>
<!doctype html>
<html lang="en">
  <head>
  <title>Menu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
     integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
	   <!-- fontawesome css -->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylefondoMadera.css">
    <link rel="stylesheet" href="css.css">
        
    </head>
  <body>
  <header class="sticky-top">
    <div class="container">
		    <nav class="navbar navbar-light bg-primary">
		      	<form action="../articulos/articulos.php" method="POST">
				    <input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
				 </form>
		        <a class="navbar-brand" href="#">Editar Cliente</a>
		        <form action= "../destruir.php" method="POST"  class="form-inline">
		      	 <button class="btn btn-dark" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
		  		</form>
    		</nav>
     	</div>
</header>

       
<div id = "Edit" class="container">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div id="estilo" class="card card-body" >
        <form action="edit.php" method="POST">
          <p>Codigo:<input type="text" name="idArticulo" class="form-control" value="<?php echo $idArticulo?>" readonly></p>
          <p>Descripcion: <input type="text" name="Descripcion"  class="form-control" value="<?php echo $Descripcion?>" ></p>
          <p>Precio Compra: <input type="text" name="PrecioCompra" class="form-control" value="<?php echo $PrecioCompra?>" ></p>
          <p>Precio Venta: <input type="text" name="PrecioVenta"  class="form-control" value="<?php echo $PrecioVenta?>" ></p>
		      <p>Marca:<select name="Marca" id='Marca' class="form-control"> <?php echo $selectmarca;?> </select></p>
		      <p>Rubro:<select name="Rubro" id='Rubro' class="form-control"> 	<?php echo $selectrubro;?> </select></p>
          <p hidden>Imagen: <input type="text" name="Imagen"  class="form-control" value="<?php echo $Imagen?>" hidden ></p>
          <button class="btn-info" name="update">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
	 <!-- Option 1: Bootstrap Bundle (includes Popper) -->  
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>