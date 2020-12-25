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
        $this->Cell(0,15,'REPORTE DE DINERO INGRESADO',0,0,'C');
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

$query="    SELECT 
                autolavado.id, 
                empleado.nombre,
                empleado.apellido,
                cliente.nombre,
                cliente.apellido, 
                autolavado.tamano, 
                autolavado.precio,
                usuarios.nombre,
                usuarios.apellido,
                autolavado.fecha
            FROM autolavado 
                INNER JOIN cliente ON autolavado.idcliente = cliente.id 
                INNER JOIN empleado ON autolavado.idempleado = empleado.id
                INNER JOIN usuarios ON empleado.idusuario = usuarios.id";
$result = mysqli_query($conexion,$query);
if (!$result)
{
    die(mysqli_error($conexion));
}

$pdf->SetFont('Arial','',12);
$desc='Actualmente, en la empresa "El Carrito Feliz" se han tenido los siguientes ingresos';
$pdf->MultiCell(0,10,$desc,0,1);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(6,10,'Id',1,0);
$pdf->Cell(42, 10,'Empleado',1,0);
$pdf->Cell(43, 10,'Cliente',1,0);
$pdf->Cell(43, 10,'Responsable',1,0);
$pdf->Cell(21, 10,utf8_decode('Tamaño'),1,0);
$pdf->Cell(15, 10,'Precio',1,0);
$pdf->Cell(0, 10,'Fecha',1,1);

$pdf->SetFont('Arial','',11);
$i=1;
$total=0;
while($row = mysqli_fetch_array($result))
{
    $nombreEmpleado= $row[1].' '.$row[2];
        $nombreCliente=$row[3].' '.$row[4];
        $nombreEncargado=$row[7].' '.$row[8];
        $tamano='';
        switch($row[5]){
            case 'S':
                $tamano = 'Coche';
                break;
            case 'M':
                $tamano = 'Camioneta';
                break;
            case 'L':
                $tamano = 'Camion';
                break;
        }
    $pdf->SetTextColor(50,100,150);
    $pdf->Cell(6,10,$i,1,0);
    $pdf->Cell(42,10,utf8_decode($nombreEmpleado),1,0);
    $pdf->Cell(43,10,utf8_decode($nombreCliente),1,0);
    $pdf->Cell(43,10,utf8_decode($nombreEncargado),1,0);
    $pdf->Cell(21,10,utf8_decode($tamano),1,0);
    $pdf->Cell(15,10,utf8_decode('$ '.$row[6]),1,0);
    $pdf->Cell(0,10,utf8_decode($row[9]),1,1);
    $total=$total+$row[6];
    $i++;
}
$pdf->Ln(5);

$pdf->SetTextColor(0,0,0);
$desc='Cantidad total ingresada:';
$pdf->Cell(170,10,$desc,0,0,'R');
$pdf->Cell(0,10,'$ '.$total,0,1,'R');
$pdf->Output();
?>