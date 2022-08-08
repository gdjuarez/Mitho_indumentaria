<?php 
require_once('../conex/conexion.php');

	// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	echo "<br>";


	$desde=$_POST['desde'];
	$hasta=$_POST['hasta'];

	// consulta a la tabla 
	$consulta = ("SELECT numero,cliente,RazonSocial,date_format(fecha,'%d-%m-%Y'),Total,estado FROM presupuesto where fecha >= '".$desde ."' and fecha <= '".$hasta."' order by numero desc "); 
	$sql = mysqli_query($miConexion,$consulta); 

	// consulta a la tabla 
	$consulta_suma = ("SELECT sum(Total) as total FROM presupuesto where fecha >= '".$desde ."' and fecha <= '".$hasta."'"); 
	$consulta_total = mysqli_query($miConexion,$consulta_suma); 

	 foreach ($consulta_total as $reg): 
		$total = $reg['total'];         
	 endforeach;

	//echo $consulta;

// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);   
			
?>

<?php if ($desde !='') { 	
// creo la table y el encabezado     
 	$dyn_table= "<table id='Tabla' class='table table-hover'>";
	$dyn_table.="<tr class='ti  bg-secondary'>";  
    $dyn_table.="<th>" . "numero" ."</th>";  
    $dyn_table.="<th>" . "Cliente" ."</th>";
    $dyn_table.="<th>" . "Razon Social" ."</th>";  
    $dyn_table.="<th>" . "Fecha" ."</th>";
    $dyn_table.="<th>" . "Importe ". "</th>";
	$dyn_table.="<th>" . "estado ". "</th>";
	$dyn_table.="</tr>";  
        
//lleno dinamicamente la table
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ 
    
    $numero = $row["numero"];
    $cliente = $row["cliente"];
    $RazonSocial = $row["RazonSocial"];
    $Fecha = $row["date_format(fecha,'%d-%m-%Y')"];
    $Total = $row["Total"];
	$estado=$row['estado'];
      
    $dyn_table.="<tr>";
    $dyn_table.="<td>" ."<input type='submit' name='nPedido' class='btn btn-info' value='".$numero."'/>"."</td>";
    $dyn_table.="<td>" . $cliente ."</td>";
    $dyn_table.="<td>" . $RazonSocial ."</td>";
    $dyn_table.="<td>" . $Fecha ."</td>";
    $dyn_table.="<td>" . number_format($Total,2, ",", ".")."</td>";
	$dyn_table.="<td>" . $estado ."</td>";
    
}
 $dyn_table.="</tr>";
 $dyn_table.="<tr>";
 $dyn_table.="<th>Total:</th><td></td><td></td><td></td>"; 
 $dyn_table.="<th>".number_format($total,2, ",", ".")."</th><th></th>"; 
 $dyn_table.="</tr></table>";

?>

		<div id="chequeo">       
		    <form action="printPDFpresupuestos.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=500, height=700')"  >
		        <?php 		       
		         echo $dyn_table;
				 echo "<p id='cantRegistros' align='center'> Pedidos realizados: ".$cantidad_registros."</p>";
		          ?>            
		    </form>        
	    </div>
			
<?php } 
elseif($search=='') echo '<h3>Ingresa un parámetro de búsqueda</h3>';
else echo '<h2>No se han encontrado resultados</h2>';
?>