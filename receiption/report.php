<?php
session_start();
require '../fpdf/fpdf.php';
include 'includes/config.php';

// QUERY
if (!empty($_POST['from']) AND !empty($_POST['to'])) {
  $from = $_POST['from'];
  $to = $_POST['to'];
  $sql = mysqli_query($con, "SELECT * FROM patient WHERE regDate BETWEEN '$from' AND '$to'");
}else{
  $sql = mysqli_query($con, "SELECT * FROM patient ORDER BY patient_id DESC");
}

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
  $pdf->Ln(10);
  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(0,10,'LIST OF REGISTERED PATIENTS',0,1,'C');

  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(50,6,'Patient Name',1,0,'C');
  $pdf->Cell(33,6,'DoB',1,0,'C');
  $pdf->Cell(33,6,'Gender',1,0,'C');
  $pdf->Cell(33,6,'Phone',1,0,'C');
  $pdf->Cell(40,6,'Address',1,1,'C');

  $pdf->SetFont('Arial','',12);


  while($data = mysqli_fetch_assoc($sql)){
    $pdf->Cell(50,6,$data['fname'].' '.$data['lname'],1,0);
    $pdf->Cell(33,6,$data['dob'],1,0);
    $pdf->Cell(33,6,$data['gender'],1,0);
    $pdf->Cell(33,6,$data['phone'],1,0);
    $pdf->Cell(40,6,$data['address'],1,1);
  }

  $pdf->Output('','pharmacy_report.pdf');
}

// EXCEL
if (isset($_GET['excel'])) {
  $report = "<table class='table' border='1'>";
  $report .="
    <tr>
      <th>Full Name</th>
      <th>DoB</th>
      <th>Gender</th>
      <th>Phone Number</th>
      <th>Address</th>
      <th>Registred at</th>
    </tr>
  ";    
  while($data = mysqli_fetch_assoc($sql)){
    $report .="
      <tr>
        <td>".$data['fname']." ".$data['lname']."</td>
        <td>".$data['dob']."</td>
        <td>".$data['gender']."</td>
        <td>".$data['phone']."</td>
        <td>".$data['address']."</td>
        <td>".$data['regDate']."</td>
      </tr> 
    ";             
  }
  $report .= "</table>";
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=patient_list.xls');

  echo $report;

}
