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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <title>Stock</title>

    <!-- jquery -->
    <script src="lib/jquery.js"></script>
    <!-- js personalizado -->
    <script src="scriptStock.js"></script>

    <link rel="stylesheet" href="../stylefondoMadera.css">


    <script>
    $(function() {
        $('#search').focus();
        $('#search_form').submit(function(e) {
            e.preventDefault();
        })

        $('#search').keyup(function() {

            var search = $('#search').val();

            $('#resultados').html(
                '<h3><img src="../img/loading.gif" width="20" alt="" /> Cargando</h3>');

            $.ajax({
                type: 'POST',
                url: 'Stock.php',
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
    		
			.container{
				background-color: pink;
			}
    	</style>
</head>

<body>
    <header class="sticky-top">
        <div class='container rounded'>
            <nav class="navbar navbar-light ">
                <!-- Navbar content -->
                <form action="../menu/menu.php" method="POST">
                    <input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
                </form>
                <a href="#" class="navbar-brand">
                    <h2>S T O C K </h2>
                </a>
                <form action="../destruir.php" method="POST" class="form-inline">
                    <button class="btn btn-dark sm" type="submit">cerrar-sesion</button>
                </form>
            </nav>
        </div>
    </header>

    <div class="container bg-light rounded">
        <div class="row align-items-center p-4">
            <div class="col-md-12">
                <div id='titulobuscador'>
                    <h6>Buscador de Articulo: </h6>
                </div>
                <div id="buscador" class="form-inline">
                    <form action="" method="post" name="search_form" id="search_form">
                        <input title="Ingrese articulo" type="text" name="search" id="search"
                            placeholder="codigo Articulo">
                    </form>
                </div>
                <div>
                    <h8><span class="small">% (lista todos)</span> </h8>
                </div>

                <div id="resultados" style="min-height: 600px;"></div>
            
            </div>
            <div id="respuesta_update"></div>
        </div>
        <div class="row align-items-center p-4">
            <div class="col-md-3"> </div>
            <div class="col-md-3">
            <td><button class="btn btn-success" id='Actualizar'>Actualizar</button></td>
            </div>
            <div class="col-md-3">
            <td>
                <form action="printPDFstock.php" method="POST" target="ventanaForm" onsubmit="window.open('','ventanaForm', 'width=900 , height=900')" >
                    <input type="submit" value="Imprimir Stock"  name="Enviar" 
                     onsubmit="window.open('', 'ventanaForm', 'width=900',' height=900')" 
                    class="btn btn-dark" />
                </form>
            </td>
            </div>
            <div class="col-md-3"> </div>
            <a href="javascript:location.reload()">Recargar</a>

        </div>
        <hr>

</body>
<!-- Option 1: Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>


</html>