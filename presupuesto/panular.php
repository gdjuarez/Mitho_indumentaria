<?php
session_start();
if ($_SESSION['logged'] == 'yes') {
	//echo 'Usuario: '.$_SESSION['user'];	
} else {
	echo 'No te has logeado, inicia sesion.';
	header("Location: ../index.php"); /* Redirección del navegador */
}
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
    $(document).ready(function() {
        //console.log("esta funkando !!!!");
        //alert("ok");
        listarp();

        function listarp() {

            $.ajax({
                type: 'GET',
                url: 'listarpanular.php',
                success: function(response) {
                    //console.log(response);
                    let data = JSON.parse(response);
                    let template = '';
                    //recorro este arreglo data y pongo cada fila pedido en la tabla
                    data.forEach(pedido => {
                        //console.log(data);
                        template += ` 
							<tr npedido ='${pedido.numero}'>
								<td>${pedido.numero}</td>
								<td>${pedido.cliente}</td>
								<td>${pedido.RazonSocial}</td>
								<td>${pedido.fecha}</td>
								<td>${pedido.Total}</td>
								<td>${pedido.estado}</td>
								<td>
								<button class='anular btn btn-danger btn-sm'>Anular</button>
								<td>
								<button class='borrar btn btn-danger btn-sm'>Borrar</button>
								</td>
							</tr> `
                    })

                    $('#presupuesto').html(template);

                }

            })

        }

        $(document).on('click', '.anular', function() {

            if (confirm('Esta seguro de Anular este Presupuesto?')) {
                //obtengo el elemento clickeado con this;
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('npedido');
                //console.log(id);
                $.post('anular_presupuesto.php', {
                    id
                }, function(response) {
                    //console.log(response);
                    //refresco la tabla
                    listarp()
                })
            }

        })

        $(document).on('click', '.borrar', function() {

            if (confirm('Esta seguro de Eliminar este Presupuesto?')) {
                //obtengo el elemento clickeado con this;
                let element = $(this)[0].parentElement.parentElement;
                let id = $(element).attr('npedido');
                //console.log(id);
                $.post('eliminar.php', {
                    id
                }, function(response) {
                    //console.log(response);
                    //refresco la tabla
                    listarp()
                })
            }

        })


    });
    </script>


</head>


<header class="sticky-top">
    <div class='container bg-warning rounded'>
        <nav class="navbar navbar-light">
            <!-- Navbar content -->
            <form action="../menu/menu.php" method="POST">
                <input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
            </form>
            <a href="#" class="navbar-brand">
                <h2>Anular Presupuestos</h2>
            </a>
            <form action="../destruir.php" method="POST" class="form-inline">
                <button class="btn btn-dark sm" type="submit">usuario: <?php echo $_SESSION['user'] ?>
                    <br>cerrar-sesion</button>
            </form>

        </nav>

</header>

<div class='container bg-light rounded'>
    <div class='row p-2'>
        <div class="col-md-1"> </div>

        <div class="col-md-10">
            <table class="table  table-hover">
                <thead>
                    <tr>
                        <th>Presupuesto N°</th>
                        <th>cliente</th>
                        <th>Razon Social</th>
                        <th>Fecha</th>
                        <th>Importe</th>
                        <th>Estado</th>
                        <th>Anular</th>
						<th>Borrar</th>
                    </tr>
                </thead>
                <tbody id="presupuesto">
                    <!--  aca va el template creado   -->
                </tbody>
            </table>
            <div id="volver">
                <form action="../menu/menu.php" method="POST">
                    <input name="Enviar" type="submit" value="volver al Menu" class="btn btn-warning btn-block" />
                </form>
            </div>
        </div>

        <div class="col-md-1"> </div>

    </div>
    <HR>
    <footer>
        <small>&copy; Copyright 2021</small>
    </footer>

</div>
<!-- Option 1: Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>

</body>


</html>