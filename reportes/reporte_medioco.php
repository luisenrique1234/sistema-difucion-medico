<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página

function Header()
{
    $date = (new DateTime())->format('d/m/y');
    $stri ='Fecha: '.$date;
	$this->Image('../images/logo.png',10,8,23);
    // Arial bold 15
    $this->SetFont('Arial','',14);
    // Movernos a la derecha
    
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Sistema de difusion de información médico'),0,0,'C');
    $this->Ln(10);
    $this->Cell(200,10,utf8_decode('Listado de Médicos'),0,0,'C');
    $this->Ln(10);

    $this->Cell(190,10,$stri,0,0,'R');
    //$this->Cell(280,10,utf8_decode('Fecha'),0,0,'c');
    // Salto de línea
    $this->SetFont('Arial','',10);
    $this->Ln(20);
    $this->cell(15,10,utf8_decode('Código'),1,0,'C',0);
    $this->Cell(25,10,'Nombre',1,0,'C',0);
	$this->Cell(20,10,'Apellido',1,0,'C',0);
	$this->Cell(20,10,'Usuario',1,0,'C',0);
    $this->Cell(30,10,utf8_decode('Exequátur'),1,0,'C',0);

    $this->Cell(50,10,utf8_decode('Provincia'),1,0,'C',0);
    $this->Cell(25,10,utf8_decode('Especialdade'),1,0,'C',0);
    $this->Cell(13,10,utf8_decode('Roles'),1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("../php/conexion.php");
$consulta = "SELECT * FROM medico";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(15,10,$row['id_medico'],1,0,'C',0);
	$pdf->Cell(25,10,$row['nombre_medico'],1,0,'C',0);
	$pdf->Cell(20,10,$row['apellido_medico'],1,0,'C',0);
	$pdf->Cell(20,10,$row['user_medico'],1,0,'C',0);
    $pdf->Cell(30,10,$row['codigo_medico'],1,0,'C',0);

    $pdf->Cell(50,10,utf8_decode($row['provincia_me']),1,0,'C',0);
    $pdf->Cell(25,10,$row['especialidadm'],1,0,'C',0);
    $pdf->Cell(13,10,$row['idRol'],1,1,'C',0);

} 


	$pdf->Output();
?>