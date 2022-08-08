<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];
}else{
	echo 'No te has logeado, inicia sesion.';
	header("Location: ../index.php"); /* Redirección del navegador */

}


require_once('../conex/conexion.php');
	//sleep(1);
$search = '';
if (isset($_POST['search'])){
		$search = strtolower($_POST['search']);
}
$resultado = mysqli_query ($miConexion,"SELECT * FROM articulo WHERE Descripcion  LIKE '%".$search."%' or idArticulo  LIKE '%".$search."%' order by idArticulo ASC");
$total = mysqli_num_rows($resultado);

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Prec. Compra</th>
            <th>Prec. Venta</th>
            <th>Marca</th>
            <th>Rubro</th>
            <th>Imagen</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>

        <?php if ($total>0 && $search!='') {

while($row = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $row['idArticulo']; ?></td>
            <td><?php echo $row['Descripcion']; ?></td>
            <td><?php echo $row['PrecioCompra']; ?></td>
            <td><?php echo $row['PrecioVenta']; ?></td>
            <td><?php echo $row['Marca']; ?></td>
            <td><?php echo $row['Rubro']; ?></td>
            <td><?php echo $row['Imagen']; ?></td>
            <td>
                <div class="btn-group">
                    <a href="edit.php?id=<?php echo $row['idArticulo']?>" class="btn btn-secondary"><i
                            class="fas fa-marker"></i> </a>
                    <a href="delete.php?id=<?php echo $row['idArticulo']?>" class="btn btn-danger"><i
                            class="far fa-trash-alt"></i> </a>
                </div>
            </td>
        </tr>

        <?php
    }
?>

        <?php
echo "Resultados de la búsqueda:".$total.""; //total de filas de la tabla
?>

        <?php }
elseif($total>0 && $search=='') echo '<h3>Ingresa un parámetro de búsqueda</h3>';
else echo '<h2>No se han encontrado resultados</h2>';
?>