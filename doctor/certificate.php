  <?php 
   session_start();
   include 'includes/config.php';
   if (!isset($_SESSION['user_id'])) {
     header("Location: ../index.php?login");
     exit();
   }
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>HCMS</title>
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
   </head>
   <body onload="window.print()">
    <?php
    if (isset($_GET['print'])) {
      $id=$_GET['print'];
      $p=mysqli_query($con,"SELECT * FROM fitness WHERE fit_id='$id'");
while($d=mysqli_fetch_array($p)){
  $name=$d['Name_with_tittle'];
  $parent=$d['Parents_Name'];
  $village=$d['Village'];
  $age=$d['Age_Years'];
  $doctor=$d['Doctor_Name'];
  $post=$d['Post_Office'];
  $message=$d['Massage'];
  $state=$d['State'];
  $pin=$d['Pincode'];
  $dist=$d['District'];
  $reg=$d['Registration_No'];
  $date=$d['Date_Of_Issue'];
  $jdate=$d['Joining_date'];
  $status=$d['Status'];
}
    }
    ?>
    <div>
      <div style="width:1200px; height: 1700px;border: solid 2px #000; font-size: 25px">
          <h4 class="text-center pt-5 pb-3 text-uppercase"><u>Medical Certificate Of Fitness</u></h4>
          <div class="container pt-4 ">
            <p> I have examined <b>Shri <?php echo $name;?></b> Daughter of Shri <b><?php echo $parent;?>    </b> aged <b><?php echo $age;?></b> Years of Village <b><?php echo $village;?></b> Post <b><?php echo $post;?> </b> Dist <b><?php echo $dist;?></b> State <b><?php echo $state;?> </b> PIN <b><?php echo $pin;?></b> and certify that he/she is free from deafness, defective vission (including coalour vision ) or any other infrimity , mental or physical , likely to interferewith the efficency of his /her work and found him/her possesing good health.</p>
          </div>
          <div class="container">
          <div class="Certificate_title">
            <p>This certificate is being given to him / her for the purpose of <b><?php echo $message;?></b>.</p>
          </div>
          <div class="sing_left_top pb-4">
               <h4 class="pt-3"><u>Singnature of Candinate:</u></h4>
            <p>(To be digned in presence of the Medical Officer)</p>
          </div>
    
            <div class="sing_right_top">
                 <h4><u>Signature of Medical Officer:</u></h4>
                         <p> Name of Medical Officer:<b class="pl-5">Dr.<?php echo $doctor;?></b><br>
                         Registration No.:<b style="padding-left: 130px"> <?php echo $reg;?></b></p>
          </div>
          <div class="row">
            <div class="col-md-10">
              <p>Date: </p>
              <p><?php echo $date;?></p>
            </div>  
              <div class="col-md-2">
              <p>Seal</p>
              <p>________________</p>
            </div>  
          </div>
                 <div class="note pt-5">
           <p><b>Note:</b> Medical certificate granted by a qualififed medical practitioner holding at least M.B.B.S. Degree and registered with medical Council of India, shall only be valid. The date iof issue of the medical certificate should be withing one year from the date of application.</p>  
        </div>
    </div>
    <h1 class="text-center pt-5 pb-3 ">...............</h1>
   </body>
   </html>