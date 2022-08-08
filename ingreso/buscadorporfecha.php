<?php 
require_once('../conex/conexion.php');

	// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	echo "<br>";

	$fecha_ymd=date('Y-m-d');
 
	
	if (isset($_POST['search'])){
		$search = $_POST['search'];		
		}

	//echo $search;
   // echo "********";
	$fecha = new DateTime($search);
	$fecha_ymd = $fecha->format('Y/m/d');
	//echo $fecha_m_d_y;

	// consulta a la tabla 
	$consulta = ("SELECT idCompra,codProveedor,RazonSocial,date_format(Fecha,'%d-%m-%Y'),Total FROM compras where fecha = '".$fecha_ymd ."' order by idCompra desc "); 
	$sql = mysqli_query($miConexion,$consulta); 

	//echo $consulta;

// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);
   
			
?>

<?php if ($search !='') { 
	
// creo la table y el encabezado 
    
 	$dyn_table= "<table id='Tabla'class='table table-striped'>";
    $dyn_table.="<td>" . "numero" ."</td>";  
    $dyn_table.="<td>" . "Proveedor" ."</td>";
    $dyn_table.="<td>" . "Razon Social" ."</td>";  
    $dyn_table.="<td>" . "Fecha" ."</td>";
    $dyn_table.="<td>" . "Importe ". "</td>";
	
        
//lleno dinamicamente la table
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ 
    
    $numero = $row["idCompra"];
    $Proveedor = $row["codProveedor"];
    $RazonSocial = $row["RazonSocial"];
    $Fecha = $row["date_format(Fecha,'%d-%m-%Y')"];
    $Total = $row["Total"];

      
    $dyn_table.="<tr>";
    $dyn_table.="<td>" ."<input type='submit' name='compra' class='btn btn-info' value='".$numero."'/>"."</td>";
    $dyn_table.="<td>" . $Proveedor ."</td>";
    $dyn_table.="<td>" . $RazonSocial ."</td>";
    $dyn_table.="<td>" . $Fecha ."</td>";
    $dyn_table.="<td>" . $Total ."</td>";

}
 $dyn_table.="</tr></table>";

?>

		<div id="chequeo">       
		    <form action="printPDFingresos.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=500, height=700')"  >
		        <?php 
		         echo "<p id='cantRegistros' align='center'> Ingresos realizados: ".$cantidad_registros."</p>";
		         echo $dyn_table;
		          ?>            
		    </form>        
	    </div>
			
<?php } 
elseif($search=='') echo '<h3>Ingresa un parámetro de búsqueda</h3>';
else echo '<h2>No se han encontrado resultados</h2>';
?>