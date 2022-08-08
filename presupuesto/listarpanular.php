<?php
    // Include database connection
    include("../conex/conexion.php");

    // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    	
    // consulta a la tabla pedidos
    $result= mysqli_query($miConexion,"SELECT numero,cliente,RazonSocial,date_format(fecha,'%d-%m-%Y') as fecha,Total,estado FROM presupuesto order by numero desc"); 

    if(!$result){
        die('Error'.mysqli_error($miConexion));
    }

    //lleno dinamicamente la table
    $json=array();
    while($row = mysqli_fetch_array($result)){ 

        $json[]=array(
            'numero' => $row['numero'],
            'cliente' => $row['cliente'],
            'RazonSocial' => $row['RazonSocial'],
            'fecha' => $row['fecha'],
            'Total' => $row['Total'],
            'estado' => $row['estado']

        );

    }
     $jsonstring=json_encode($json);
        echo $jsonstring;

?>
