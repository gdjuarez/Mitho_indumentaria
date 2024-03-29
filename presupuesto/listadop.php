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
    <title>Presupuesto Realizados</title>
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
    $(function() {

        $("#listar").click(function() {

            //alert("funka!");
            var desde = $('#desde').val();
            var hasta = $('#hasta').val();

            $.ajax({
                type: 'POST',
                url: 'buscadorprefecha.php',
                data: {
                    desde: desde,
                    hasta: hasta
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
                    <h2>Listado de Presupuestos</h2>
                </a>
                <form action="../destruir.php" method="POST" class="form-inline">
                    <button class="btn btn-dark sm" type="submit">usuario: <?php echo $_SESSION['user']?>
                        <br>cerrar-sesion</button>
                </form>

            </nav>

    </header>

    <div class="container bg-light rounded">
        <div class="row align-items-center p-4">
            <div class="col-md-2">

            </div>

            <div class="col-md-8">
                <div id='titulobuscador'>
                    <h4>Buscador entre fechas: </h4>
                </div>
                <div class="input-group input-group mb-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">desde: </span>
                    </div>
                    <input type="date" id='desde' value="<?php echo date('Y-m-d'); ?>" class="form-control">
		

                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">hasta: </span>
                    </div>
                    <input type="date" id='hasta' value="<?php echo date('Y-m-d'); ?>" class="form-control">
				    <input type="button" value="listar" id="listar" class="btn btn-dark btn-md">

                </div>

                <div id="resultados" style="min-height: 600px;"></div>


                <div id="volver">
                    <form action="../menu/menu.php" method="POST">
                        <input name="Enviar" type="submit" value="volver" class="btn btn-info btn-block" />
                    </form>
                </div>

                <HR>
                <footer>
                    <small>&copy; Copyright 2021</small>
                </footer>

            </div>

            <div class="col-md-2">

            </div>

        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>


</body>


</html>