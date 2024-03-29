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

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Rubro </title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!--FavIcon-->
	<link rel="shortcut icon" href="../img/yo.png" type="image/png" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" href="../stylefondoMadera.css">
	<!-- <script src="scriptArticulo.js"></script>  -->
	<link rel="stylesheet" href="css.css">


	<script>
		$(function() {
			$('#search_form').submit(function(e) {
				e.preventDefault();
			})

			$('#search').on('click', function() {
				var search = '';
				$('#resultados').html('<h3><img src="../img/loading.gif" width="20" alt="" /> Cargando</h3>');
				$.ajax({
					type: 'POST',
					url: 'listarRubros.php',
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
	<script>
		$(function() {
			$('#search_form').submit(function(e) {
				e.preventDefault();
			})

			$('#rubro').on('click', function() {
				var rubro = $(this).val();

				var res = rubro.split("", 3);

				var prefijo = res[0] + res[1] + res[2];
				$('#prefijo').val(prefijo);


			})
		})
	</script>
</head>

<body>
	<div class="container">
		<!--Navegador!-->
		<nav class="navbar navbar-dark bg-dark rounded">

			<a class="navbar-brand" href="#">Gestion de Rubros</a>

		</nav>
	</div>

	<main class="container p-4">
		<!--ABM!-->
		<div id="estilo" ; class="card card-body" ;>
			<form action="saveRubro.php" method="POST">
				<div class="container">
					<div>
						<div class="row">
							<div class="col-sm-9">
								<p>Rubro: <input type="text" name="rubro" id="rubro" class="form-control" value="" placeholder="Ingrese un nuevo Rubro (luego click aqui)" required>
								
							</div>
						</div>
					</div>

					<div>
						<input type="submit" name="submit" value="Registrar Rubro" class="btn btn-primary mb-2" />
					</div>
			</form>
	</main>

	<main class="container p-4">
		<div id="estilo" ; class="card card-body" ;>
			<div class="col-md-12">
				<hr>
				<div id="buscador">
					<div class="row">
						<div class="col-md-6">
							<form action="" method="post" name="search_form" id="search_form">
								<input value="Listar Rubros" type="submit" name="search" id="search">
							</form>
						</div>
					</div>
				</div>
				<div id="resultados"></div>
				<hr>
			</div>
		</div>
	</main>
</body>

</html>