<?php
include("../../conex/conexion.php");

//------Recibo los Datos del ajax----
$cliente= $_POST['codCliente'];
$RazonSocial=$_POST['RazonSocial'];
$Fecha=$_POST['Fecha'];
$Total=$_POST['Total'];
$estado=$_POST['estado'];
//---  recibo array detalle ---------	
$miArray=$_POST['valores'];

//echo ('CABECERA: ('.$cliente.'-'.$RazonSocial.'-'.$Fecha.'-'.$Total.'-'.$estado.')');
 
 $sql = "INSERT INTO presupuesto (cliente, RazonSocial, Fecha,Total,estado) 
  			values ('$cliente','$RazonSocial','$Fecha',$Total,'$estado')";

//echo $sql;
	
 $grabar = mysqli_query($miConexion,$sql);
//	echo ('grabar '.$sql);
	if(!$grabar)
	{
		echo 'error Cabecera';

	}else{

		//echo 'Cabecera ';
		echo 'Nuevo ';
	} 

// ******* Obtengo el ultimo numero de pedido ***************************
	$consultoNumero=mysqli_query($miConexion,"SELECT MAX(numero) as numerop FROM presupuesto");
	$row = mysqli_fetch_row($consultoNumero);
	$numero = $row[0];
		// echo ("(Pedido n°: ".$numero.')');

?>
<?php
//************DETALLE DEL PEDIDO********************************************************

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
$sql = "INSERT INTO presupuestodetalle (presupuesto, articulo, Preciounidad,cantidad,importe) VALUES ";
$sql .= implode( ' , ', $values ).';';//Juntamos los sql's

//echo ( 'pedidoarticulos   consulta '.$sql );//para que lo veas. 
	
 $grabar = mysqli_query($miConexion,$sql);
	//echo ('Registrar: '.$sql);
	if(!$grabar)
	{
		
	  		echo '...ERROR!!! detalle';

	}else{

		//echo  'Detalle registrado';
		echo ' Presupuesto: Registrado ';

		?> 
		<div class="row vh-80 justify-content-around align-items-center border " >
			<div class="col-sm-2" id="mostrar_presupuesto">       
				<form action="../printPDFpresupuesto_nuevo.php" method="POST" target="ventanaForm" 
				onsubmit="window.open('', 'ventanaForm', 'width=500, height=700')"  >
				<input type="text" name="numero" value="<?php echo $numero?>" hidden> 
				<input type="submit" name="submit" value="Ver Presupuesto" class="btn btn-success mb-2"/>                
				</form>        
			</div>
			<div class="col-sm-2"  id="cerrar_form">       
				<form action="nuevop.php" method="POST" >
				<input type="submit" name="submit" value="cerrar" class="btn btn-danger mb-2"/>                
				</form>        
			</div>
		</div>


		 <?php
		
	}

	//****** BAJA DEL STOCK EL DETALLE DEL Presupuesto  *******************
	
	/*
	foreach($miArray as $detalle)
	{
	   
	   $id_articulo = $detalle[0];
	   $stock= $detalle[2];

	   //Armo y Junto los sql's
		$sql_stock = 'UPDATE stockarticulos set Stock = Stock - '.$stock.' where idArticulo = "'.$id_articulo.'"';
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
	*/		



?>