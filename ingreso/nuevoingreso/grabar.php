<?php
include("../../conex/conexion.php");

//------Recibo los Datos del ajax----
$Proveedor= $_POST['codProveedor'];
$RazonSocial=$_POST['RazonSocial'];
$Fecha=$_POST['Fecha'];
$Total=$_POST['Total'];

//---  recibo array detalle ---------	
$miArray=$_POST['valores'];

//echo ('CABECERA: ('.$Proveedor.'-'.$RazonSocial.'-'.$Fecha.'-'.$Total.'-'.$estado.')');
 
 $sql = "INSERT INTO compras (codProveedor, RazonSocial, Fecha,Total) 
  			values ('$Proveedor','$RazonSocial','$Fecha',$Total)";

//echo $sql;
	
 $grabar = mysqli_query($miConexion,$sql);
//	echo ('grabar '.$sql);
	if(!$grabar)
	{
		echo 'error Cabecera';

	}else{

		echo 'Cabecera Registrada';		
	} 

// ******* Obtengo el ultimo numero de pedido ***************************
	$consultoNumero=mysqli_query($miConexion,"SELECT MAX(idCompra) as numerop FROM compras");
	$row = mysqli_fetch_row($consultoNumero);
	$numero = $row[0];
		// echo ("( n°: ".$numero.')');

?>
<?php
//************DETALLE DEL INGRESO********************************************************

//---  Recorro el Array Y armo los values ------
$values = array();

foreach($miArray as $detalle)
	{
	    foreach($detalle as $indice=>$value)
	    {  
			//echo $indice."-".$value;    
	    }
	   $values[] = ("(".$numero.",'".$detalle[0]."',".$detalle[1].",".$detalle[2].",".$detalle[3].")");
	  // echo ($values[0]);	    
	}

//Armo y Junto los sql's
$sql = "INSERT INTO compraarticulos (idCompra, idArticulo,Cantidad, PrecioUnitario,Importe) VALUES ";
$sql .= implode( ' , ', $values ).';';//Juntamos los sql's

//echo ( 'consulta '.$sql );//para que lo veas. 
	
 $grabar = mysqli_query($miConexion,$sql);
	//echo ('Registrar: '.$sql);
	if(!$grabar)
	{
		
	  		echo '...ERROR!!! detalle';

	}else{

		echo  '(Detalle registrado)';
		
	}

	//****** BAJA DEL STOCK EL DETALLE DEL Presupuesto  *******************
	
	
	foreach($miArray as $detalle)
	{
	   
	   $id_articulo = $detalle[0];
	   $stock= $detalle[2];

	   //Armo y Junto los sql's
		$sql_stock = 'UPDATE stockarticulos set Stock = Stock + '.$stock.' where idArticulo = "'.$id_articulo.'"';
		//echo ('<br>');
		//echo ($sql_stock);

		$update = mysqli_query($miConexion,$sql_stock);

			if(!$update)
			{
				echo '...ERROR!!! detalle';

			}else{
				echo  '(Detalle registrado)';		
			}
	  
	}




?>