<?php
session_start();
include 'includes/config.php';
$sql = mysqli_query($con, "SELECT * FROM medicine ORDER BY id DESC");

if (isset($_GET['pdf'])) {
  	require '../fpdf/fpdf.php';
	class PDF extends FPDF{
	  function Footer(){
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',8);
	    $this->Cell(0,10,$this->PageNo(),0,0,'C');
	  }
	}
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetY(20);

$pdf->Image('../img/logo.png',92,10,-200);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(189,6,'HEALTH CARE MANAGEMENT SYSTEM',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(189,5,'P.O.BOX 123, Tel: +255 224 556 225, Fax: +255 224 556 225, CHWAKA-ZANZIBAR',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'LIST OF ALL MEDICINE',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,7,'Medicine Name',1,0);
$pdf->Cell(30,7,'Purchased',1,0,'C');
$pdf->Cell(30,7,'Price',1,0,'C');
$pdf->Cell(30,7,'Quantity',1,0,'C');
$pdf->Cell(30,7,'Total Cost',1,0,'C');
$pdf->Cell(30,7,'Added',1,1,'C');

$pdf->SetFont('Arial','',12);

while($data = mysqli_fetch_assoc($sql)){
  $pdf->Cell(40,7,$data['m_name'],1,0);
  $pdf->Cell(30,7,$data['p_price'],1,0,'R');
  $pdf->Cell(30,7,$data['s_price'],1,0,'R');
  $pdf->Cell(30,7,$data['qty'],1,0,'R');
  $pdf->Cell(30,7,number_format(($data['p_price'] * $data['qty'])),1,0,'R');
  $pdf->Cell(30,7,$data['added_at'],1,1,'R');
}


$pdf->Output('','pharmacy_report.pdf');
}


if (isset($_GET['excel'])) {
	$result = '';
	$result .= "<table class='table' border='1'>
	<tr>
	  <th>ID</th>
      <th>Medicine Name</th>
      <th>Purchasing Price</th>
      <th>Selling Price</th>
      <th>Available Qty</th>
      <th>Total Cost</th>
	</tr>";
	$i=1;
	while($data = mysqli_fetch_assoc($sql)){
		$result .= "
		<tr>
		  <td>".$i."</td>
          <td>".$data['m_name']."</td>
          <td>".$data['p_price']."</td>
          <td>".$data['s_price']."</td>
          <td>".$data['qty']."</td>
          <td>".number_format(($data['p_price'] * $data['qty']))."</td>
		</tr>";
		$i++;
	}
	$result .= "</table>";

	header('Content-Type: application/xls');
	header('Content-Disposition: attachment; filename=report.xls');
	echo $result;
}

if (isset($_GET['patient_final'])) {
	
}