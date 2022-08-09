<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];

}else{

	echo '<script language=javascript>
		  alert("No te has logeado, inicia sesion")
		  self.location = "index.html"</script>';
}
?>

<?php
require('../fpdf/fpdf.php');
// Include database connection
include("../conex/conexion.php");

// recibo numero de pedido
$nPed = $_POST["numero"];

class PDF extends FPDF
{
// Page footer
function Footer()
{
   //Subtotales y total
   $this->SetY(-21);
   //Ingreso total
   $this->Cell(190, 15, ' Comprobante no valido como factura (presupuesto valido para la fecha de emision) NO INCLUYE FLETE ', 1,0,'C');
   $this->Ln(5);
   
}
}

//Inicio la construccion del PDF
//parametros P= portrait, mm= milimetros, a4= tipo de hoja y utf8 para simbolos especiles y acentos XD
$pdf = new PDF('p','mm','a4', 'utf-8');
$pdf->AddPage();

//Encabezado
//Varibles
$tipoFactura='P';
//Obtengo datos para encabezado
$misdatos = mysqli_query($miConexion,"SELECT * FROM misdatos");
$item = 0;
while($misdatos2 = mysqli_fetch_array($misdatos)){
    $ciudad=$misdatos2['Ciudad'];
    $Cuit=$misdatos2['Cuit'];
    $direccion=$misdatos2['Direccion'];
    $RazonSocial=$misdatos2['RazonSocial'];
    $Telefono=$misdatos2['Telefono'];
    $Email=$misdatos2['Email'];
	}
//Obtengo datos del pedido
$pedido = mysqli_query($miConexion,"SELECT p.numero,p.cliente, p.RazonSocial, p.fecha , p.Total,c.Domicilio FROM presupuesto p
 left join cliente c on c.codcliente= p.cliente where numero= $nPed");
$item = 0;
while($pedido2 = mysqli_fetch_array($pedido)){
	$item = $item+1;
    $nPedido= $pedido2['numero'];
    $cliente=$pedido2['cliente'];
    $RazonSocialCliente=$pedido2['RazonSocial'];
    $fecha=$pedido2['fecha'];
    $total= $pedido2['Total'];
    $Domicilio=$pedido2['Domicilio'];
}
$pdf->SetFont('arial', 'B', 14);
$pdf->Cell(190, 10, 'Original', 1,0,'C');
$pdf->Ln(10);
$pdf->Cell(95, 29, '',1);
$pdf->Cell(95, 29, '',1);
$pdf->Ln(0);
$pdf->Cell(87, 40, '',0);

//pinto el recuadro donde dice el tipo de factura
$pdf->SetXY(97,20);                  // Primero establece Donde estará la esquina superior izquierda donde estará tu celda
$pdf->SetFillColor(255,255,255);     // establece el color del fondo de la celda (en este caso es AZUL)
$pdf->Cell(16, 12, '',1,0,'C',1);

$pdf->Ln(0);
//declro y ubico imagen
$image1 = "../img/mmLogo.jpg";
$pdf->Image($image1 , 12 ,21, 40 , 20,'jpg');
//primera linea
$pdf->Cell(190, 10, $tipoFactura, 0 ,0,'C');
$pdf->SetFont('arial', 'B', 14);
$pdf->Ln(0);
$pdf->Cell(0, 20, '                                                                                   Presupuesto n: '.$nPed, 0);
$pdf->Ln(5);
$pdf->Cell(87, 10,'', 0);
$pdf->SetFont('arial', 'B', 10);
$pdf->Cell(16, 10, '', 0,0,'C');
$pdf->Ln(0);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(105, 10, '',0);
$pdf->Cell(85, 10, '', 0);
$pdf->Ln(7);
$pdf->Cell (105, 10,utf8_decode('                                          Avda 2 Nº 3175 esq 107'), 0);
$pdf->Cell(85, 10,'     Fecha de emision:'.date("d/m/Y", strtotime($fecha)), 0);
$pdf->Ln(7);
$pdf->Cell(105, 10, '       Tel.: (02324) 422410  6600 Mercedes (Bs. As.)',0);
$pdf->Cell(85, 10, '  IVA RESPONSABLE INSCRIPTO', 0);
$pdf->Ln(10);

//tabla encabezado
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(190, 17, '',1);
$pdf->Ln(0);
$pdf->Cell(5, 10, '', 0);
$pdf->Cell(10, 10, 'Cuil:', 0);
$pdf->SetFont('times', '', 12);
$pdf->Cell(35, 10, $cliente, 0); //85,10
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(30, 10, 'Razon Social:  ', 0);//24,10
$pdf->SetFont('times', '', 12);
$pdf->Cell(80, 10, $RazonSocialCliente, 0);  //10
$pdf->SetFont('times', 'B', 12);
$pdf->Ln(5);
$pdf->Cell(5, 10, '', 0);
$pdf->Cell(20, 10, 'domicilio', 0); //'domicilio'
$pdf->SetFont('times', '', 12);
$pdf->Cell(120, 10, utf8_decode($Domicilio), 0);
$pdf->SetFont('times', 'B', 12);
$pdf->Ln(12);
$pdf->Cell(190, 210, '',1);
$pdf->Ln(0);

//tabla Pedido
$pdf->SetFont('times', 'B', 10);
$pdf->Cell(25, 10, 'Cod articulo',  1,0,'C');
$pdf->Cell(44, 10, 'Descripcion', 1,0,'C');
$pdf->Cell(20, 10, 'Cantidad', 1,0,'C');
$pdf->Cell(20, 10, 'U. medida', 1,0,'C');
$pdf->Cell(20, 10, 'Precio unit', 1,0,'C');
$pdf->Cell(18, 10, '% Bonif.', 1,0,'C');
$pdf->Cell(18, 10, 'Imp Bonif.', 1,0,'C');
$pdf->Cell(25, 10, 'Importe', 1,0,'C');
$pdf->Ln(10);

//CONSULTA Pedido
$pedidoA = mysqli_query($miConexion,"SELECT pa.idp, pa.presupuesto,pa.articulo,a.Descripcion,pa.Preciounidad,pa.cantidad,pa.Importe FROM presupuestodetalle pa inner join articulo a on a.idArticulo = pa.articulo where presupuesto = $nPed");
$item = 0;
$totaluni = 0;
$totalimp = 0;
$pdf->SetFont('times', '', 10);
while($pedidoA2 = mysqli_fetch_array($pedidoA)){
    $item = $item+1;
    $pdf->Cell(1, 10, '', 0);
    $pdf->Cell(24, 10, $pedidoA2['articulo'], 0);
    $pdf->Cell(1, 10, '', 0);
    $pdf->Cell(43, 10, $pedidoA2['Descripcion'], 0);
    $pdf->Cell(20, 10, '     '.$pedidoA2['cantidad'], 0);
    $pdf->Cell(20, 10, '',0);
    $pdf->Cell(19, 10, '   '.number_format($pedidoA2['Preciounidad'],2,",","."), 0,0,'R');
    $pdf->Cell(1, 10, ' ', 0);
    $pdf->Cell(18, 10, ' ', 0);
    $pdf->Cell(18, 10, '', 0);
    $pdf->Cell(24, 10, '   '.number_format($pedidoA2['Importe'],2,",",".") , 0,0,'R');
    $totalimp += $pedidoA2['Importe'];
    $pdf->Ln(5);
}
$pdf->Ln(10);
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(115, 10, ' ', 0);
$pdf->Cell(30, 10, 'Total: ', 0);
$pdf->SetFont('times', '', 12);
$pdf->Cell(40, 10,'$ '. number_format( $total,2,",","."), 0,0,'R');
$pdf->Output();
?>