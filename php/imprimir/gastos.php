<?php
include ("pdf/fpdf.php");
include ("../conexion.php");
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Line(10,10,206,10);
        $this->Line(10,35,206,35);
        $this->Cell(0,15,'REPORTE DE GASTOS',0,0,'C');
        $this->Image('../../assets/iconoCarro.png',12,12,25);
        $this->Ln(25);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$pdf=new PDF('p', 'mm', 'Letter');
$pdf->SetMargins(12, 15);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 9);

$query  = 'SELECT * from producto 
        INNER JOIN usuarios 
            ON producto.idusuario = usuarios.id';
$result = mysqli_query($conexion,$query);
if (!$result)
{
    die(mysqli_error($conexion));
}

$query1  = 'SELECT * from gasto 
        INNER JOIN usuarios 
            ON gasto.idusuario = usuarios.id';
$result1 = mysqli_query($conexion,$query1);
if (!$result1)
{
    die(mysqli_error($conexion));
}

$pdf->SetFont('Arial','',14);
$desc='Actualmente, en la empresa "El Carrito Feliz" se han reportadolos siguientes gastos';
$pdf->MultiCell(0,10,$desc,0,1);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$desc='Gastos en inventario';
$pdf->MultiCell(0,10,$desc,0,1);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(8,10,'Id',1,0);
$pdf->Cell(56, 10,'Descripcion',1,0);
$pdf->Cell(35, 10,'Cantidad',1,0);
$pdf->Cell(56, 10,'Responsable del gasto',1,0);
$pdf->Cell(0, 10,'Fecha',1,1);

$pdf->SetFont('Arial','',12);
$i=1;
$total=0;
while($row = mysqli_fetch_array($result))
{
    $pdf->SetTextColor(50,100,150);
    $pdf->Cell(8,10,$i,1,0);
    $pdf->Cell(56,10,utf8_decode($row[2]),1,0);
    $pdf->Cell(35,10,utf8_decode('$ '.$row[3]*$row[4]),1,0);
    $pdf->Cell(56,10,utf8_decode($row[7].' '.$row[8]),1,0);
    $pdf->Cell(0,10,utf8_decode($row[5]),1,1);
    $total=$total+($row[3]*$row[4]);
    $i++;
}
$pdf->Ln(5);
$pdf->SetTextColor(0,0,0);
$desc='Cantidad en productos:';
$pdf->Cell(170,10,$desc,0,0,'R');
$pdf->Cell(0,10,'$ '.$total,0,1,'R');

$pdf->SetFont('Arial','B',12);
$desc='Gastos del encargado';
$pdf->MultiCell(0,10,$desc,0,1);
$pdf->Ln(5);
$pdf->Cell(8,10,'Id',1,0);
$pdf->Cell(56, 10,'Descripcion',1,0);
$pdf->Cell(35, 10,'Cantidad',1,0);
$pdf->Cell(56, 10,'Responsable del gasto',1,0);
$pdf->Cell(0, 10,'Fecha',1,1);

$pdf->SetFont('Arial','',12);
$i=1;
$total1=0;
while($row = mysqli_fetch_array($result1))
{
    $pdf->SetTextColor(50,100,150);
    $pdf->Cell(8,10,$i,1,0);
    $pdf->Cell(56,10,utf8_decode($row[2]),1,0);
    $pdf->Cell(35,10,utf8_decode('$ '.$row[3]),1,0);
    $pdf->Cell(56,10,utf8_decode($row[6].' '.$row[7]),1,0);
    $pdf->Cell(0,10,utf8_decode($row[4]),1,1);
    $total1=$total1+($row[3]);
    $i++;
}
$pdf->Ln(5);
$pdf->SetTextColor(0,0,0);
$desc='Cantidad en otros gastos:';
$pdf->Cell(170,10,$desc,0,0,'R');
$pdf->Cell(0,10,'$ '.$total1,0,1,'R');

$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$desc='Cantidad total:';
$pdf->Cell(170,10,$desc,0,0,'R');
$pdf->Cell(0,10,'$ '.($total+$total1),0,1,'R');


$pdf->Output();
?>
