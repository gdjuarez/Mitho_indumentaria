<?php
	require_once('../conex/conexion.php');
	//sleep(1);
	$search = '';
	if (isset($_POST['search'])){
		$search = strtolower($_POST['search']);
	}

	//$sql="SELECT * FROM articulo WHERE Descripcion  LIKE '%".$search."%' or idArticulo  LIKE '%".$search."%' order by Descripcion ASC";
	$sql = "SELECT a.idArticulo,a.Descripcion,a.PrecioCompra,a.PrecioVenta,a.Marca ,a.Rubro ,s.Stock ,s.StockMinimo
	 FROM articulo a inner join stockarticulos s on a.idArticulo=s.idArticulo
	 WHERE a.Descripcion  LIKE '%".$search."%' or a.idArticulo  LIKE '%".$search."%' order by Descripcion ASC";
	
	$resultado = mysqli_query ($miConexion,$sql);

	$total = mysqli_num_rows($resultado);
	//total de filas de la tabla
	echo "Resultados de la búsqueda:".$total.""; 
?>

<table class="table table-hover" id="tablastock">
   
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Prec. Compra</th>
            <th>Prec. Vent</th>
            <th>Marca</th>
            <th>Rubro</th>
            <th>Stock</th>
            <th>Stock Minimo</th>
            <th>check</th>
        </tr>
  

        <?php if ($total>0 && $search!='') {

while($row = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $row['idArticulo']; ?></td>
            <td><?php echo $row['Descripcion']; ?></td>
            <td><?php echo $row['PrecioCompra']; ?></td>
            <td><?php echo $row['PrecioVenta']; ?></td>
            <td><?php echo $row['Marca']; ?></td>
            <td><?php echo $row['Rubro']; ?></td>
            <td><input type="number" id='cantidad' class="form-control form-control-sm text-center" name="stock"
                    value="<?php echo $row['Stock']; ?>"></td>
            <td><input type="number" id='minimo' class="form-control form-control-sm text-center" name="stockminimo"
                    value="<?php echo $row['StockMinimo']; ?>"></td>
            <td>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" id='check' class="form-check-input" value="0" >
                        <label>
            </td>
            </div>
        </tr>

        <?php
    }

?>
</table>


<?php }
elseif($total>0 && $search=='') echo '<h6>Ingresa un parámetro de búsqueda</h6>';
else echo '<h6>No se han encontrado resultados</h6>';
?>