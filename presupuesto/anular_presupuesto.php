<?php
include("../conex/conexion.php");

if(isset($_POST['id'])){

	//codigo de pedido 
	$presupuesto= $_POST['id'];

	// cambio valor del estado --> anulado
	 $sql = "UPDATE presupuesto SET estado = 'Anulado' WHERE numero =".$presupuesto."";
	
		
	 $estado = mysqli_query($miConexion,$sql);
	
		if(!$estado)
		{
			echo '<script language=javascript>
		  		alert("Hubo un error al anular")
		  		self.location = "../menu/panular.php"</script>';

		}else{

			echo '<script language=javascript>
				  		alert("Presupueto Anulado")
				  		self.location = "../menu/panular.php"</script>';		
				
		}


}



?>