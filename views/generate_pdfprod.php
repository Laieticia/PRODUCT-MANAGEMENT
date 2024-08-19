<?php
require('./fpdf186/fpdf.php');
require_once "../model/Productdb.php";
require_once "../model/Categorydb.php";

class PDF extends FPDF
{

function header ()
{
   $this->SetFont('Arial','B',12);
   $this->Cell(0, 10,'List of Products',0,1,'C');
   $this->Ln(10);
   $this->SetFont('Arial','B',12);
   $this->Cell(10, 10, 'N°',1);
   $this->Cell(40, 10, 'Name',1);
   $this->Cell(20, 10, 'Price',1);
   $this->Cell(20, 10, 'Quantity',1);
   $this->Cell(70, 10, 'Image',1);
   $this->Cell(30, 10, 'CategoryId',1);
 
   $this->Ln();
   
}
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','B',12);
    $this->Cell(0, 10,'Page', $this->PageNo(),0,0,'C'); 
}
}
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$Productdb = new Productdb();
$Categorydb = new Categorydb();
$Products = $Productdb->readAll();
if ($Products != null && (sizeof($Products)!=0)){
    $i=1;
    foreach($Products as $Pro){
        $Category=$Categorydb->read($Pro->CategoryId);
        $pdf->Cell(10,10,$i++, 1);
        $pdf->Cell(40,10, $Pro->Name,1);
        $pdf->Cell(20,10, $Pro->Price,1);
        $pdf->Cell(20,10, $Pro->Quantity,1);
        $pdf->Cell(70,10, $Pro->Image,1);
        $pdf->Cell(30,10, $Category->Libelle,1);
      
        $pdf->Ln();
    }
}
$pdf->Output();

?>