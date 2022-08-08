<?php
include("../conex/conexion.php");



	//codigo de pedido 
	$presupuesto= $_GET['numero'];

	echo ('PRESUpuesto:'.$presupuesto);


	//consultar articulos en el presupuesto

	$consulta= "SELECT articulo,cantidad FROM presupuestodetalle WHERE presupuesto = $presupuesto";

	//echo ($consulta);

	$stock = mysqli_query($miConexion,$consulta);


	foreach ($stock as $row):       

        $id_articulo = $row["articulo"];
        $cantidad = $row["cantidad"];
  	
         //****** BAJA DEL STOCK EL DETALLE DEL Presupuesto  *******************
     
		$sql_stock = 'UPDATE stockarticulos set Stock = Stock - '.$cantidad.' where idArticulo = "'.$id_articulo.'"';
	
		//echo ($sql_stock);

		$update = mysqli_query($miConexion,$sql_stock);

			if(!$update)
			{
				echo '...ERROR!!! detalle';

			}else{
					
			}
			

	endforeach;

	//****** CAMBIO DE ESTADO AL PRESUPUESTO DE (Pendiente -> Entregado) **********
	
	 $sql = "UPDATE presupuesto SET estado = 'Entregado' WHERE numero = $presupuesto";
	// echo $sql;
	
	 $estado = mysqli_query($miConexion,$sql);
	
		if(!$estado)
		{
			echo '<script language=javascript>
		  		alert("Hubo un error al cambiar de estado")
		  		self.location = "buscadorpresupendiente.php"</script>';

		}else{

			echo '<script language=javascript>
				  		alert("Presupueto Entregado")
				  		self.location = "buscadorpresupendiente.php"</script>';		
				
		}
	


?>
