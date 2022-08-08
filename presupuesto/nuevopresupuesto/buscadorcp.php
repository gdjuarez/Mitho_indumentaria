<?php 
	require_once("../../conex/conexion.php");
	//sleep(1);
	$buscar = '';

	if (isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}

	$resultado = mysqli_query ($miConexion,"SELECT * FROM cliente WHERE codCliente LIKE '%$buscar%' or Apellido LIKE '%$buscar%' or RazonSocial LIKE '%$buscar%' order by Apellido ASC");
	
	
	$total = mysqli_num_rows($resultado);
		
?>

<?php if ($total>0 && $buscar!='') { 

//Creo la tabla y lleno con la consulta
    	$dyn_table= "<table id='TablaCliente' class='table table-striped table-hover'>";
		$dyn_table.="<th>" . "Cuil" ."</th>";  
		$dyn_table.="<th>" . "Razon Soc" ."</th>";
		$dyn_table.="<th>" . "Domicilio" ."</th>";
		$dyn_table.="<th>" . "Tel.Fijo " ."</th>";
		$dyn_table.="<th>" . "Tel.Celular " ."</th>";
		$dyn_table.="<th>" . "Email " ."</th>";
?>

<?php 
	while ($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){

	 	$codCliente = $fila["codCliente"];
	    $cApellido = $fila["Apellido"];
		$cNombre = $fila["Nombre"];	
		$cRazonsocial = $fila["RazonSocial"];
	    $cDomicilio = $fila["Domicilio"];
		$cTelFijo = $fila["TelFijo"];
		$cTelCelular = $fila["TelCelular"];
		$cEmail = $fila["Email"];
		
		$dyn_table.="<tr>";
	    $dyn_table.="<td>" . $codCliente."</td>";
		$dyn_table.="<td>" . $cApellido .' '. $cNombre.' '.$cRazonsocial."</td>";		
		$dyn_table.="<td>" . $cDomicilio."</td>";
		$dyn_table.="<td>" . $cTelFijo ."</td>";
		$dyn_table.="<td>" . $cTelCelular  ."</td>";
		$dyn_table.="<td>" . $cEmail ."</td>";
    
}
$dyn_table.="</tr></table>";
?>

<div id="chequeo" align="center" >   		
	<?php 
	echo "Resultados de la búsqueda:".$total." "; //total de filas de la tabla
	echo $dyn_table; //imprimo la tabla
	?>      
</div>
<script>     
          // selecciono la fila de la table y copio los datos a los inputs XD
        $('#TablaCliente tr').on('click', function(){
        	//alert('ALERTA');
           var dato = $(this).find('td:first').html();
         $('#entity-id').val(dato);
         var dato2 = $(this).find('td:nth-child(2)').html();
          $("#entity-social").val(dato2); 
          var dato3 = $(this).find('td:nth-child(3)').html();
          $("#entity-domicilio").val(dato3);
          	// oculto el resultado 
		  $("#cerrarcliente").click();
        });
      
 </script>

			
<?php } 
elseif($total>0 && $buscar=='') echo 'Ingrese un parámetro de búsqueda';
else echo 'No se han encontrado resultados';
?>