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
        $this->Cell(0,15,'REPORTE DE PAGOS A EMPLEADOS',0,0,'C');
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

$query  = 'SELECT 
                pagoempleado.id, 
                empleado.nombre,
                empleado.apellido,
                pagoempleado.cantidad,
                usuarios.nombre,
                usuarios.apellido,
                pagoempleado.fecha 
            FROM pagoempleado 
                INNER JOIN empleado 
                ON pagoempleado.idempleado = empleado.id
                INNER JOIN usuarios 
                ON empleado.idusuario = usuarios.id';
$result = mysqli_query($conexion,$query);
if (!$result)
{
    die(mysqli_error($conexion));
}

$pdf->SetFont('Arial','',12);
$desc='Actualmente, en la empresa "El Carrito Feliz" se han reportadolos siguientes pagos';
$pdf->MultiCell(0,10,$desc,0,1);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(8,10,'Id',1,0);
$pdf->Cell(56, 10,'Empleado',1,0);
$pdf->Cell(35, 10,'Cantidad',1,0);
$pdf->Cell(56, 10,'Responsable de pago',1,0);
$pdf->Cell(0, 10,'Fecha',1,1);

$pdf->SetFont('Arial','',12);
$i=1;
$total=0;
while($row = mysqli_fetch_array($result))
{
    $pdf->SetTextColor(50,100,150);
    $pdf->Cell(8,10,$i,1,0);
    $pdf->Cell(56,10,utf8_decode($row[1].' '.$row[2]),1,0);
    $pdf->Cell(35,10,utf8_decode('$ '.$row[3]),1,0);
    $pdf->Cell(56,10,utf8_decode($row[4].' '.$row[5]),1,0);
    $pdf->Cell(0,10,utf8_decode($row[6]),1,1);
    $total=$total+$row[3];
    $i++;
}
$pdf->Ln(5);

$pdf->SetTextColor(0,0,0);
$desc='Cantidad total:';
$pdf->Cell(170,10,$desc,0,0,'R');
$pdf->Cell(0,10,'$ '.$total,0,1,'R');
$pdf->Output();
?>
