<?php
require('./fpdf186/fpdf.php');
require_once "../model/Categorydb.php";

class PDF extends FPDF
{

function header ()
{
   $this->SetFont('Arial','B',12);
   $this->Cell(0, 10,'List of Category',0,1,'C');
   $this->Ln(10);
   $this->SetFont('Arial','B',12);
   $this->Cell(10, 10, 'N°',1);
   $this->Cell(60, 10, 'Name',1);
   $this->Cell(70, 10, 'Description',1);
   $this->Cell(30, 10, 'Actions',1);
   $this->Ln();
   
}
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','B',12);
    $this->Cell(0, 10,'Page'. $this->PageNo(),0,0,'C'); 
}
}
$pdf = new PDF();
$pdf-> AddPage();
$pdf-> SetFont('Arial','',12);
$Categorydb = new Categorydb();
$Categories = $Categorydb->readAll();
if ($Categories != null && (sizeof($Categories)!=0)){
    $i=1;
    foreach($Categories as $Cat){
        $pdf->Cell(10,10,$i++, 1);
        $pdf->Cell(60,10, $Cat->Libelle,1);
        $pdf->Cell(70,10, $Cat->Description,1);
        $pdf->Cell(30,10,'',1);
        $pdf->Ln();
    }
}
$pdf->Output();

?>