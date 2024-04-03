<?php

require_once ('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->image('../views/img/civet.png', 10, 4, 40); // X, Y, Tamaño
    $this->Ln(10);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
  
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'Inventario Civetchi ',0,0,'C');
    // Salto de línea
   
    $this->Ln(10);
    $this->SetFont('Arial','B',10);
    $this->SetX(10);
  
    $this->Cell(10,10,'id',1,0,'C',0);
    $this->Cell(40,10,'codigo',1,0,'C',0,);
    $this->Cell(70,10,'Descripcion',1,0,'C',0);
    $this->Cell(20,10,'Cantidad',1,0,'C',0);
    $this->Cell(15,10,'Costo',1,0,'C',0);
    $this->Cell(15,10,'Otro',1,1,'C',0);
    
   
	
  
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
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}

include '../includes/_db.php';
/*$consulta = "SELECT user.id, user.nombre, user.correo, user.password, user.telefono,
user.fecha, permisos.rol FROM user
LEFT JOIN permisos ON user.rol = permisos.id";*/
$query = "SELECT items_copy1.id,items_copy1.codigo_part,items_copy1.descri_part,items_copy1.total_part, items_copy1.costo_part FROM items_copy1";
$resultado = mysqli_query($conexion, $query);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado->fetch_assoc()) {

    $pdf->SetX(10);

    $pdf->Cell(10,10,$row['id'],1,0,'C',0);
    $pdf->Cell(40,10,$row['codigo_part'],1,0,'C',0);
	$pdf->Cell(70,10,$row['descri_part'],1,0,'C',0);
    $pdf->Cell(20,10,$row['total_part'],1,0,'C',0);
    $pdf->Cell(15,10,'0,00',1,0,'C',0);
    $pdf->Cell(15,10,'...',1,1,'C',0);
    
     
	


} 


	$pdf->Output();
?>