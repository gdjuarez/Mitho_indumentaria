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

require("../conex/conexion.php");

require('../fpdf/fpdf.php');
// Include database connection

//CONSULTA
$articulos  = mysqli_query($miConexion,"SELECT * FROM stockarticulos s inner join articulo a on a.idArticulo=s.idArticulo order by a.idArticulo ASC");


class PDF extends FPDF
{
//Page header
	function Header()
	{
		$this->SetFont('Times','B',15);
		$this->Cell(190,10,utf8_decode('Listado de stock-artículos'),0,0,'C');
		//$this->Image('../img/logo.png' , 160 ,10, 10 , 10,'GIF');
		$this->Ln(20);
	}

// Page footer
function Footer()
{
// Position at 1.5 cm from bottom
	$this->SetY(-15);
	$this->SetFont('Times','',10);
	$this->Cell(190, 10, 'Pag '.$this->PageNo().'   ', 0,0,'R');
}
}

//Inicio la construccion del PDF
//parametros P= portrait, mm= milimetros, a4= tipo de hoja y utf8 para simbolos especiles y acentos XD
$pdf = new PDF('p','mm','a4', 'utf8');
$pdf->AddPage();

//$pdf->SetY(40);
$pdf->SetFont('times', 'B', 10);

//tabla
$pdf->Cell(20, 10, '');
$pdf->SetFillColor(255,255,255);
$pdf->Cell(20, 10, 'Codigo', 1,0,'C',1);
$pdf->Cell(70, 10, 'Descripcion', 1,0,'C',1);
$pdf->Cell(20, 10, 'Stock', 1,0,'C',10);
$pdf->Cell(25, 10, 'Stock Minimo', 1,0,'C',1);
$pdf->Ln(10);
$pdf->SetFont('times', '', 10);

//CONSULTA la hice arriba XD
//$articulos  = mysqli_query($miConexion,"SELECT * FROM articulo order by Descripcion ASC");
$item = 0;
$totaluni = 0;
$totaldis = 0;
$f=1; //inicializo $f que es si tiene fondo
while($articulos2 = mysqli_fetch_array($articulos)){

	$pdf->SetFillColor(240,235,230);		//pongo color de fondo
	if($f==0)								//alterno color d fondo cambiando el valor de $f
		{
			$f=1;
		}
	else
		{
			$f=0;
		};

	$item = $item+1;
	//Dibujo las celdas
	$pdf->Cell(20, 8, '');
	$pdf->Cell(20, 8, '',1,0,'',$f);	
	$pdf->Cell(70, 8, '',1,0,'',$f);
	$pdf->Cell(20, 8, '',1,0,'',$f);
	$pdf->Cell(25, 8, '',1,0,'',$f);
	$pdf->Ln(0);
	//Cargo los valores en las celdas
	$pdf->Cell(20,8,'');
	$pdf->Cell(20,8,$articulos2['idArticulo'],0,0,'');
	$pdf->Cell(68,8,$articulos2['Descripcion'],0,0,'');
	$pdf->Cell(18,8,$articulos2['Stock'],0,0,'R');
	$pdf->cell(2,8,'', 0,0,'');
	$pdf->Cell(25,8,$articulos2['StockMinimo'],0,0,'R');
	$pdf->cell(2,8,'',0,0,'');
	$pdf->Ln(8);
}

$pdf->Output();
?>
