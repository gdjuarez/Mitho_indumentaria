<?php 
require_once('../conex/conexion.php');

	// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	echo "<br>"; 
	
	if (isset($_POST['search'])){
		$search = $_POST['search'];		
		}

	// consulta a la tabla 
	$consulta = ("SELECT numero,cliente,RazonSocial,date_format(fecha,'%d-%m-%Y'),Total,estado FROM
	 presupuesto where estado ='Pendiente' AND numero LIKE '%".$search."%' order by numero desc "); 

	$sql = mysqli_query($miConexion,$consulta); 
	//echo $consulta;

	// cantidad de registros
	$cantidad_registros = mysqli_num_rows($sql);   	

?>
<!doctype html>
<html lang="en">

<head>
    <title>presupuestos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--  CSS personalizado -->
    <link rel="stylesheet" href="../../stylefondo.css">
    <!-- jquery -->
    <script src="nuevopresupuesto/lib/jquery.js"></script>

	

    <!-- js personalizado -->
<script language="JavaScript">

    function aviso_pdf(url) {
        if (!confirm(
                " Desea ver el presupuesto?,\n click en ACEPTAR\n de lo contrario de click en CANCELAR. "
            )) {
            return false;
        } else {
           // document.location = url;
            window.open(url,'Presupuesto','height=768,width=800');
             return true;
        }
    }

    function aviso_entregar(url) {
        if (!confirm(
                "va a Entregar este Presupuesto,\n si desea Entregar, click en ACEPTAR\n de lo contrario de click en CANCELAR. "
            )) {
            return false;
        } else {
            document.location = url;
            return true;
        }
    }

</script>
</head>

<body>

    <table id='Tabla' class='table table-hover'>
        <th>Ver</th>
        <th>Cliente</th>
        <th>Razon Social</th>
        <th>Fecha</th>
        <th>Importe</th>
        <th>estado</th>
        <th>entregar</th>

        <?php
        //lleno dinamicamente la table
		
		foreach ($sql as $row):       

        $numero = $row["numero"];
        $cliente = $row["cliente"];
        $RazonSocial = $row["RazonSocial"];
        $Fecha = $row["date_format(fecha,'%d-%m-%Y')"];
        $Total = $row["Total"];
        $estado = $row["estado"];
		?>

        <tr>
            <td>
                <div class="btn-group">
                    <a href="javascript:;" class="btn btn-info" 
                        onclick="aviso_pdf('printPDFpresupuestos_pend.php?nPedido=<?php echo $numero?>'); return false;"><i
                            class="fas fa-search-location"></i>  <?php echo $numero?> </a>
                </div>
            </td>
            <td><?php echo $cliente ?></td>
            <td><?php echo $RazonSocial ?></td>
            <td><?php echo $Fecha ?></td>
            <td><?php echo $Total ?></td>
            <td><?php echo $estado ?></td>
            <td>
                <div class="btn-group">
                    <a href="javascript:;" class="btn btn-success"
                        onclick="aviso_entregar('entregar_presupuesto.php?numero=<?php echo $numero?>'); return false;"><i
                            class="fas fa-file-invoice"></i></a>
                </div>
            </td>
        </tr>
        <?php  endforeach ?>
    </table>

	    <!-- Option 1: Bootstrap Bundle (includes Popper) -->  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>