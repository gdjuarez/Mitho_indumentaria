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
?>
<!--DATAGRID -->
<?php
 // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Argentina/Buenos_Aires');
?>

<!doctype html>
<html lang="es">
    <head>
    	<!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">   
    	<title>Menu</title>  
  		<link rel="stylesheet" href="../css/stylefondo.css">
  		<style>
    		/* Changes an element's color on hover */
    		.list-group-item {
    		    background-color: white;
    		}
    		.list-group-item:hover {
    		    background-color: grey;
    		    color:white;
    		}
			.container{
				background-color: pink;
			}
    	</style>
	</head>

<body>
	<p>
	<header class="sticky-top">
		<div class='container  rounded'>	
			<nav class="navbar navbar-light">
				<!-- Navbar content -->
				<form action="#" method="POST">
					<input name="Enviar" type="submit" value="usuario: <?php echo $_SESSION['user']?> " class="btn btn-dark" />
				</form> 
				<a href="#" class="navbar-brand"><h2>M E N U</h2></a>
				<form action= "../destruir.php" method="POST"  class="form-inline">
					<button class="btn btn-dark sm" type="submit">cerrar-sesion</button>
				</form>
			</nav>
		</div>		
	</header>
		
	<div class="container ">	
        <div class="row">  
	        <div class="col-md-3  border rounded">
				<h5 class="text-black">Presupuesto</h5>
				<div class="list-group p-2">
					<a href="../presupuesto/nuevopresupuesto/nuevop.php" class="list-group-item list-group-item-action">Nuevo Presupuesto</a>
					<a href="../presupuesto/buscadorpresupuesto.php" class="list-group-item list-group-item-action">Buscar Presupuesto</a>
					<a href="../presupuesto/buscadorpresupendiente.php" class="list-group-item list-group-item-action">Presupuestos Pendientes</a>
					<a href="../presupuesto/listadop.php" class="list-group-item list-group-item-action">Listado de Presupuesto</a>
					<a href="../presupuesto/panular.php" class="list-group-item list-group-item-action">Anular Presupuesto</a>
				 </div>
			</div>
			<div class="col-md-3 border rounded ">
				<h5 class="text-black">Ingreso</h5>
				<div class="list-group p-2">
				<a href="../ingreso/nuevoingreso/nuevo.php" class="list-group-item list-group-item-action">Nuevo Ingreso</a>
				<a href="#" class="list-group-item list-group-item-action text-white">.</a>			
					<a href="../ingreso/listadoingresos.php" class="list-group-item list-group-item-action">Listar ingresos</a>
						
					<a href="#" class="list-group-item list-group-item-action text-white">.</a>					
		     	</div>
			</div>
			<div class="col-md-3 border rounded ">
			<h5 class="text-black">Articulos & Precios</h5>
				<div class="list-group p-2">			
					<a href="../barcode/leer_etiqueta.php" class="list-group-item list-group-item-action">Leer Codigo de Barras</a>				
					<a href="../barcode/crear_etiqueta.php" class="list-group-item list-group-item-action">Crear etiqueta </a>
					<a href="#" class="list-group-item list-group-item-action text-white">.</a>			
					<a href="../precios/precioManager.php" class="list-group-item list-group-item-action">Actualizar Precios</a>	
					<a href="../articulos/articulos.php" class="list-group-item list-group-item-action">Articulos</a>		
					
		     	</div>
	      	</div>
			  <div class="col-md-3 border rounded">
			<h5 class="text-black">Inventario</h5>
				<div class="list-group p-2">				
				<a href="../stock/StockManager.php" class="list-group-item list-group-item-action">Stock Manager</a>
								
					<a href="#" class="list-group-item list-group-item-action text-white">.</a>						
					<a href="#" class="list-group-item list-group-item-action text-white">.</a>		
					<a href="#" class="list-group-item list-group-item-action text-white">.</a>			
					<a href="../usuarios/registroUsuarios.php" class="list-group-item list-group-item-action">Usuarios</a>
		     	</div>
	      	</div>
		</div>
		
		<hr>
		<footer>
            <small>&copy; Copyright GDJuarez 2022</small>
        </footer>
	</div>
    <!-- Option 1: Bootstrap Bundle (includes Popper) -->  
   	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>	 
</body>
</html>