<?php
include("../conex/conexion.php");

if(isset($_POST['id'])){

	//codigo de pedido 
	$presupuesto= $_POST['id'];
	//elimino detalle pedido
	 $sqldetalle = "DELETE FROM presupuestodetalle WHERE presupuesto =".$presupuesto."";
	 //elimino cabecera pedido
	 $sql = "DELETE FROM presupuesto WHERE numero =".$presupuesto."";
		
	 $borrardetalle = mysqli_query($miConexion,$sqldetalle);
		//echo ('grabardetalle '.$sqldetalle);
		if(!$borrardetalle)
		{
			echo '<script language=javascript>
		  		alert("Hubo un error al anular")
		  		self.location = "../menu/panular.php"</script>';

		}else{

			$borrar = mysqli_query($miConexion,$sql);
				//echo ('grabar '.$sql);
				if(!$borrar)
				{
					echo '<script language=javascript>
				  		alert("Hubo un error al anular")
				  		self.location = "../menu/panular.php"</script>';

				}else{

					echo '<script language=javascript>
				  		alert("Presupueto Eliminado")
				  		self.location = "../menu/panular.php"</script>';		
				}		
		}


}



?>