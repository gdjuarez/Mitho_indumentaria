<?php 

session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];
}else{
	echo 'No te has logeado, inicia sesion.';
	header("Location: ../index.php"); /* Redirección del navegador */
	}

  // Include database connection
include("../conex/conexion.php");

// recibo idarticulo, consulto base y relleno inputs
  if(isset($_GET['id'])){

   $idArticulo=$_GET['id'];
    //echo $idArticulo;    
    $consulta = mysqli_query ($miConexion,"SELECT Descripcion,PrecioVenta,Marca,Rubro FROM articulo WHERE idArticulo = '".$idArticulo."'");

    foreach ($consulta as $res) {
        $descripcion=$res['Descripcion'];
        $venta=$res['PrecioVenta'];
        $marca=$res['Marca'];
        $rubro=$res['Rubro'];

        $etiqueta= $descripcion.'-'.$venta.'-'.$marca.'-'.$rubro;
          
      }

  }else{
    $idArticulo='';
    $descripcion='';
    $venta='';
    $marca='';
    $rubro='';    
    $etiqueta='';
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Codigo de Barras</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        	<!-- fontawesome css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
   integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


  <script>
		$(function() {
			//$('#search').focus();
			$('#search_form').submit(function(e) {
				e.preventDefault();
			})
			$('#search').keyup(function() {
				var search = $('#search').val();
				$('#seleccion').val(search); //copia texto para imrimir seleccion
				$('#resultados').html('<h3><img src="../img/loading.gif" width="20" alt="" /> Cargando</h3>');
				$.ajax({
					type: 'POST',
					url: 'buscadorArticulos.php',
					data: {
						search
					},
					success: function(resp) {
						if (resp != "") {
							$('#resultados').html(resp);
						}
					}
				})
			})
		})
	</script>
    <style>
    #contenedor {
        background-color: pink;
    }
    </style>

</head>

<header class="sticky-top">
    <div id='contenedor' class='container rounded'>
        <nav class="navbar navbar-light ">
            <!-- Navbar content -->
            <form action="../menu/menu.php" method="POST">
                <input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
            </form>
            <a href="#" class="navbar-brand">
                <h2>Creador de etiqueta con Codigo de Barras</h2>
            </a>
            <form action="../destruir.php" method="POST" class="form-inline">
                <button class="btn btn-dark sm" type="submit">usuario: <?php echo $_SESSION['user']?>
                    <br>cerrar-sesion</button>
            </form>
        </nav>
    </div>
</header>

<body>
    <div class='container border rounded'>
        <div class="col-md-4 ">       </div>
        <div class="col-md-4">
            <hr>
            <div id='titulobuscador'>
                <h3>Buscador de Articulo: </h3>
            </div>

            <form action="" method="post" name="search_form" id="search_form">
                <input title="Ingrese numero o nombre del articulo" type="text" name="search" id="search"
                    placeholder="Ingrese Articulo">
            </form>

            <div id="resultados"></div>
          
        </div>
        <hr>
        </div>
       

        <div class="codigo text-center mt-4">
            <input type="text" id="data" placeholder="Ingresa codigo"value="<?php echo $idArticulo ?>" maxlength="13">
            <button type="button" id="generar_barcode" class="btn btn-success">Generar código de barras</button>
            <div id="imagen" class="img mt-4 "> </div>
            <?php echo $etiqueta?>;
           
        </div>

        <script>
        $("#generar_barcode").click(function() {       
            var data = $("#data").val();
            $("#imagen").html('<img src="barcode.php?text=' + data + '&size=90&codetype=Code39&print=true"/>');
            $("#data").val('');
        });
        </script>
        <div class="col-md-4"></div>
    </div>
      </div>

    <!-- Option 1: Bootstrap Bundle (includes Popper) -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>