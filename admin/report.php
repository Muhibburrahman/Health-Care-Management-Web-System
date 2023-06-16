<?php
session_start();
require '../fpdf/fpdf.php';
include 'includes/config.php';

// QUERY
$sql = mysqli_query($con, "SELECT * FROM users");

// PDF
if (isset($_GET['pdf'])) {
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
  $pdf->Ln(15);

  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(189,10,'LIST OF REGISTERED USERS',0,1,'C');
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(70,6,'Full Name',1,0,'C');
  $pdf->Cell(50,6,'Status',1,0,'C');
  $pdf->Cell(70,6,'Last Login',1,1,'C');

  $pdf->SetFont('Arial','',12);


  while($data = mysqli_fetch_assoc($sql)){
    $pdf->Cell(70,6,' '.$data['fname'].' '.$data['lname'],1,0);
    $pdf->Cell(50,6,' '.$data['status'],1,0);
    $pdf->Cell(70,6,' '.$data['last_login'],1,1);
  }

  $pdf->Output('','pharmacy_report.pdf');
}

// EXCEL
if (isset($_GET['excel'])) {
  $report = "<table class='table' border='1'>";
  $report .="
    <tr>
      <th>Full Name</th>
      <th>Status</th>
      <th>Last Login</th>
    </tr>
  ";    
  while($data = mysqli_fetch_assoc($sql)){
    $report .="
      <tr>
        <td>".$data['fname']." ".$data['lname']."</td>
        <td>".$data['status']."</td>
        <td>".$data['last_login']."</td>
      </tr> 
    ";             
  }
  $report .= "</table>";
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=patient_list.xls');

  echo $report;

}
