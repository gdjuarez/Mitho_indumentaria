<?php 
	require_once('../../conex/conexion.php');
	//sleep(1);
	$buscar = '';

	if (isset($_POST['buscarArt'])){
		$buscar = $_POST['buscarArt'];
	}

	$resultado = mysqli_query ($miConexion,"SELECT * FROM articulo WHERE idArticulo LIKE '%$buscar%' or Descripcion LIKE '%$buscar%' order by Descripcion asc");
	
	
	$total = mysqli_num_rows($resultado);
		
?>

<?php if ($total>0 && $buscar!='') { 

//Creo la tabla y lleno con la consulta
    	$dyn_table= "<table id='TablaArticulo' class='table table-hover'>";
		$dyn_table.="<th>" . "Articulo" ."</th>";  
		$dyn_table.="<th>" . "Descripcion" ."</th>";
		$dyn_table.="<th>" . "Precio Venta" ."</th>";
		
?>

<?php 
	while ($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){

	 	$idArticulo = $fila["idArticulo"];
	    $Descripcion = $fila["Descripcion"];
		$PrecioVenta = $fila["PrecioVenta"];	
		
		
		$dyn_table.="<tr>";
	    $dyn_table.="<td>" . $idArticulo."</td>";
		$dyn_table.="<td>" . $Descripcion."</td>";		
		$dyn_table.="<td>" . $PrecioVenta."</td>";
		    
}
$dyn_table.="</tr></table>";
?>

<div id="resultadoArticulos" align="center" >   		
	<?php 
	echo "Registros:".$total." "; //total de filas de la tabla
	echo $dyn_table; //imprimo la tabla
	?>      
</div>
<script>     
          // selecciono la fila de la table y copio los datos a los inputs XD
        $('#TablaArticulo tr').on('click', function(){
        
          var dato = $(this).find('td:first').html();
         $('#IdProducto').val(dato);
         var dato2 = $(this).find('td:nth-child(2)').html();
          $("#Productos").val(dato2); 
          var dato3 = $(this).find('td:nth-child(3)').html();
          $("#Precio").val(dato3);
          	// cierro modal 
			  $("#cerrarArticulo").click(); 

           	//simulo que clicke cantidad para q multiplique cantidad por precio = importe
			$('#cantidad').click();
			
        });
        	
      
 </script>

			
<?php } 
elseif($total>0 && $buscar=='') echo 'Ingrese un parámetro de búsqueda';
else echo 'No se han encontrado resultados';
?>