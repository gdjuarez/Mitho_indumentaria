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
// Include database connection
include("../conex/conexion.php");

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	

?>

<!doctype html>
<html lang="en">
  <head>
  <title>Buscar Presupuesto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
     integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
    <!--  CSS personalizado -->
  	<link rel="stylesheet" href="../stylefondoMadera.css">
	 <!-- jquery -->
    <script src="nuevopresupuesto/lib/jquery.js"></script>  
   	<!-- js personalizado -->
    
 
  <script>
		$(function(){
			$('#search').focus();
			$('#search_form').submit(function(e){
				e.preventDefault();
			})
			$('#search').keyup(function(){
				var search = $('#search').val();
				$('#seleccion').val(search);//copia texto para imrimir seleccion
				$('#resultados').html('<h3><img src="../img/loading.gif" width="20" alt="" /> Cargando</h3>');
				$.ajax({
					type: 'POST',
					url: 'buscadorpredoc.php',
					data: {search},
					success: function(resp){
						if(resp!=""){
							$('#resultados').html(resp);
						}
					}
				})
			})
		})
  	</script>

<script>
		$(function(){
		
			$('#search_form2').submit(function(e){
				e.preventDefault();
			})
			$('#searchnumero').keyup(function(){
				var search = $('#searchnumero').val();
				$('#seleccion').val(search);//copia texto para imrimir seleccion
				$('#resultados').html('<h3><img src="../img/loading.gif" width="20" alt="" /> Cargando</h3>');
				$.ajax({
					type: 'POST',
					url: 'buscadorpresnumero.php',
					data: {search},
					success: function(resp){
						if(resp!=""){
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
		<div class='container bg-primary rounded'>	
			<nav class="navbar navbar-light ">
			<!-- Navbar content -->
				<form action="../menu/menu.php" method="POST">
					<input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
				</form> 
				<a href="#" class="navbar-brand"><h2>Buscador de Presupuestos</h2></a>
				<form action= "../destruir.php" method="POST"  class="form-inline">
			<button class="btn btn-dark sm" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
				</form>
			</nav>
		</div>
	</header>
  
	<div class="container rounded bg-light">
		<div class="row">            
			<div class="col-md-2"></div>
		    <div class="col-md-8">
			<br>
			<hr>
	<div class="row">
		<div class="col-md-6">
			<div id='titulobuscador'><h5>Buscador por cuit: </h5></div>
				<div id="buscador" >
					<div class="row">
						<div class="col-md-6">
							<form action="" method="post" name="search_form" id="search_form">
								<input title= "Ingrese Ciut/Cuil del Cliente" type="text" name="search" id="search" placeholder="Ingrese Cuit/Cuil">
							</form>
						</div>							
					</div>
				</div>
		</div>
	
		<div class="col-md-6">
			<div id='titulobuscador'><h5>Buscador por número: </h5></div>
				<div id="buscador" >
					<div class="row">
						<div class="col-md-6">
							<form action="" method="post" name="search_formnumero" id="search_formnumero">
								<input title= "Ingrese n° presupuesto" type="text" name="searchnumero" id="searchnumero" placeholder="Ingrese n° presupuesto">
							</form>
						</div>							
					</div>
				</div>
	</div>

	<div id="resultados"  style="min-height: 600px;"></div>
	<HR>
	
	<div class="col-md-2"></div>
	<HR>
   	<footer>
		<small>&copy; Copyright 2021</small>
	</footer>

	 <!-- Option 1: Bootstrap Bundle (includes Popper) -->  
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>