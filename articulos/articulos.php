<?php
session_start();
if ($_SESSION['logged'] == 'yes') {
	//echo 'Usuario: '.$_SESSION['user'];
} else {
	echo 'No te has logeado, inicia sesion.';
	header("Location: ../index.php"); /* Redirección del navegador */
}
?>
<?php

include("../conex/conexion.php");

//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);
?>
<?php // Lleno el select/combobox consultando la base
$resultado = mysqli_query($miConexion, "SELECT * from marcaarticulo order by marca asc");
$selectmarca = "";
while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	$selectmarca .= " <option value='" . $row['Marca'] . "'>" . $row['Marca'] . "</option>";
	//$selectrubro .=" <option value='".$row['Rubro']."'>".$row['Rubro']."</option>";
}

// Lleno el select/combobox consultando la base
$resultado = mysqli_query($miConexion, "SELECT * from rubroarticulo order by rubro asc");
$selectrubro = "";
while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	$selectrubro .= " <option value='" . $row['Rubro'] . "'>" . $row['Rubro'] . "</option>";
}
//----------

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!-- fontawesome css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<script src="js/jquery.js"></script>
	<script src="scriptFormArticulo.js"></script>
	<link rel="stylesheet" href="../stylefondoMadera.css">
	<link rel="stylesheet" href="css.css">

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
</head>

<body>
	<header class="sticky-top">
		<div class="container bg-primary rounded">
			<!--Navegador!-->
			<nav class="navbar navbar-light">
				<form action="../menu/menu.php" method="POST">
					<input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
				</form>
				<a class="navbar-brand" href="#">Gestion de Articulos</a>
				<form action="../destruir.php" method="POST" class="form-inline">
					<button class="btn btn-dark" type="submit">usuario: <?php echo $_SESSION['user'] ?> <br>cerrar-sesion</button>
				</form>
			</nav>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col">
				<button class='btn-info rounded' id='obtenercodigo' value=''>Obtener codigo</button>				
			</div>
			<div class="col">
				
			</div>
		</div>
	</div>

	<main class="container bg-light p-1">
		<!--ABM!-->
		<div id="estilo" ; class="card card-body" ;>
			<form action="save.php" method="POST">
				<div class="container">
					<hr style="color: #0056b2;" />
					<div class="text-center">
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<p>Marca:<select name="Marca" id='Marca' class="form-control"><?php echo $selectmarca; ?></select> </p>
								<p> <a href="marca.php" target="popup" onClick="window.open(this.href, this.target, 'width=800px,height=800px'); return false;" id="clientepop">
										Agregar_Marca
									</a></p>
							</div>
							<div class="col-sm-4">
								<p>Rubro:<select name="Rubro" id='Rubro' class="form-control"><?php echo $selectrubro; ?></select></p>
								<p> <a href="rubro.php" target="popup" onClick="window.open(this.href, this.target, 'width=800px,height=800px'); return false;" id="clientepop">
										Agregar_Rubro
									</a></p>
							</div>
							<div class="col-sm-2"></div>
						</div>

						<div class="text-center">
							<div class="row">
								<div class="col-sm-3">
									<p>Codigo:
									<div id='respuesta'></div>		
									<p>
								</div>
								<div class="col-sm-9">
									<p>Descripcion: <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="<?php echo $Descripcion ?>" required>
									<p>
								</div>
							</div>
						</div>
						<br>
						<div class="text-center">
							<div class="row">
								<div class="col-sm-3">	</div>
									<div class="col-sm-3">
										<p>Precio Compra: <input type="text" name="PrecioCompra" class="form-control" value="<?php echo $PrecioCompra ?>" required></p>
									</div>
									<div class="col-sm-3">
										<p>Precio Venta: <input type="text" id="PrecioVenta" name="PrecioVenta" class="form-control" value="<?php echo $PrecioVenta ?>" required></p>
									</div>
									<div class="row">
									<div class="col-sm-3"></div>
								</div>
							</div>
						</div>
					</div>
					<hr style="color: #0056b2;" />
					<div class="text-center">
						<input type="submit" name="submit" id="guardar" value="Guardar" class="btn btn-primary mb-2" />
					</div>
				</div>
			</form>
		</div>
	</main>

	<main class="container bg-light p-1">
		<!--Busqueda e imprimir!-->
		<div id="estilo" ; class="card card-body" ;>

			<div class="col-md-12">
				<hr>
				<div id='titulobuscador'>
					<h3>Buscador de Articulo: </h3>
				</div>
				<div id="buscador">
					<div class="row">
						<div class="col-md-6">
							<form action="" method="post" name="search_form" id="search_form">
								<input title="Ingrese numero o nombre del articulo" type="text" name="search" id="search" placeholder="Ingrese Articulo">
							</form>
						</div>
						<div class="col-md-6">
							<div class="text-right ">
								<div class="btn-group">
									<form action="printPDFArticulosSelecion.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=900, height=900')">
										<input type="text" name="seleccion" id="seleccion" hidden>
										<input title="Imprime seleccion" type="submit" name="imprimirS" value="Imprimir selección" class="btn btn-secondary m-2" />
									</form>
									<form action="printPDFArticulosTodos.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=900, height=900')">
										<input title="Imprime todo" type="submit" name="imprimirA" value="Imprimir todo" class="btn btn-secondary m-2" />
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="resultados"></div>
				<hr>
			</div>
		</div>
	</main>
	<!-- Option 1: Bootstrap Bundle (includes Popper) -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>