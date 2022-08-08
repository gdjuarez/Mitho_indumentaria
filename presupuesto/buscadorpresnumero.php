<?php 
require_once('../conex/conexion.php');

	// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	echo "<br>";
	
	if (isset($_POST['search'])){
		$search = $_POST['search'];		
		}

	// consulta a la tabla 
	$consulta = ("SELECT numero,cliente,RazonSocial,date_format(fecha,'%d-%m-%Y'),Total,estado FROM presupuesto where numero LIKE '%".$search."%' order by numero desc "); 
	$sql = mysqli_query($miConexion,$consulta); 

	//echo $consulta;

// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);   
			
?>

<?php if ($search !='') { 
	
// creo la table y el encabezado 
    
 	$dyn_table= "<table id='Tabla'class='table table-striped'>";
    $dyn_table.="<td>" . "numero" ."</td>";  
    $dyn_table.="<td>" . "Cliente" ."</td>";
    $dyn_table.="<td>" . "Razon Social" ."</td>";  
    $dyn_table.="<td>" . "Fecha" ."</td>";
    $dyn_table.="<td>" . "Importe ". "</td>";
	$dyn_table.="<td>" . "estado". "</td>";
        
//lleno dinamicamente la table
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ 
    
    $numero = $row["numero"];
    $cliente = $row["cliente"];
    $RazonSocial = $row["RazonSocial"];
    $Fecha = $row["date_format(fecha,'%d-%m-%Y')"];
    $Total = $row["Total"];
	$estado = $row["estado"];
      
    $dyn_table.="<tr>";
    $dyn_table.="<td>" ."<input type='submit' name='nPedido' class='btn btn-info' value='".$numero."'/>"."</td>";
    $dyn_table.="<td>" . $cliente ."</td>";
    $dyn_table.="<td>" . $RazonSocial ."</td>";
    $dyn_table.="<td>" . $Fecha ."</td>";
    $dyn_table.="<td>" . $Total ."</td>";
	$dyn_table.="<td>" . $estado ."</td>";
    
}
 $dyn_table.="</tr></table>";

?>

		<div id="chequeo">       
		    <form action="printPDFpresupuestos.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=500, height=700')"  >
		        <?php 
		         echo "<p id='cantRegistros' align='center'>  realizados: ".$cantidad_registros."</p>";
		         echo $dyn_table;
		          ?>            
		    </form>        
	    </div>
			
<?php } 
elseif($search=='') echo '<h3>Ingresa un parámetro de búsqueda</h3>';
else echo '<h2>No se han encontrado resultados</h2>';
?>