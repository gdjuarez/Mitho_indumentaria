<?php
include("../conex/conexion.php");

//---  recibo array detalle ---------	
$miArray=$_POST['valores'];


//---  Recorro el Array Y armo los values ------
$values = array();

foreach($miArray as $detalle)
	{
	    $checkeado = $detalle[0];
   		$id_articulo = $detalle[1];
        $PrecioCompra = $detalle[2];           
        $PrecioVenta = $detalle[3];

		if($checkeado =='1'){

			$sql_art = 'UPDATE articulo
	  				SET PrecioCompra = '.$PrecioCompra.',
					PrecioVenta = '.$PrecioVenta.' 
					WHERE idArticulo = "'.$id_articulo.'"';

				//echo $sql_stock;
				//echo ('<br>');
			$update = mysqli_query($miConexion,$sql_art);

				if(!$update)
				{
					echo '...ERROR!!! stock';
	
				}

		}
	  


	}


?>