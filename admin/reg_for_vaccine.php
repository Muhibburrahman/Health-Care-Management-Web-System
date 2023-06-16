<?php include 'header.php';
include("includes/config.php"); ?>
<?php
date_default_timezone_set('Asia/Kolkata');
if (isset($_POST['submit'])) {
  $Name = $_POST['full_name'];
  $Phone = $_POST['phone'];
  $Aadhar = $_POST['aadhar_no'];
  $vaccine =$_POST['vac_nme'];
  $dosh_no=$_POST['dosh_no'];
  $date_time=date('d-M-Y - h:i:s A');
  $query="INSERT INTO `vaccine`(`name`, `phone`, `status`, `vac_nme`, `reg_dte`, `aadhar`, `dosh_no`) VALUES ('$Name','$Phone','Register','$vaccine','$date_time','$Aadhar','$dosh_no')";
  $result = mysqli_query($con,$query);

  if ($result) {
      echo '<script>alert("Your Registration is done")</script>';
     echo '<script>window.location.href="reg_vaccine.php";</script>';
  }else{
      echo '<script>alert("Your Registration filed..")</script>';
    echo '<script>window.location.href="reg_for_vaccine.php";</script>';
  }
}
if (isset($_POST['reg_update'])) {
  $reg_id=$_POST['reg_id'];
  $Name = $_POST['full_name'];
  $Phone = $_POST['phone'];
  $Aadhar = $_POST['aadhar_no'];
  $vac_nme =$_POST['vac_nme'];
  $dosh_no=$_POST['dosh_no'];
  /*$d_name=$_SSECTION[''];*/
  $date_time=date('d-M-Y - h:i:s A');
  $query="UPDATE `vaccine` SET `status`='Done',
                               `vac_nme`='$vac_nme',
                               `dname`='$Name',
                               `reg_upd`='$date_time',
                               `dosh_no`='$dosh_no' WHERE id='$reg_id'";
  $result = mysqli_query($con,$query);

  if ($result) {
      echo '<script>alert("Your Vaccine data updated")</script>';
  echo '<script>window.location.href="reg_vaccine.php";</script>';
  }else{
      echo '<script>alert("Your updated filed..")</script>';
    echo '<script>window.location.href="reg_for_vaccine.php";</script>';
  }
}

?>
<div class="content-wrapper">
   <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Registration for Vaccine</li>
      </ol>
      
<?php if(isset($_GET['edit'])){
$w=mysqli_query($con,"SELECT * FROM `vaccine` WHERE id='".$_GET['edit']."'");
while($row=mysqli_fetch_array($w))
{
$full_name=$row['name'];
$phone=$row['phone'];
$status=$row['status'];
$vac_nme=$row['vac_nme'];
$aadhar=$row['aadhar'];
$dosh_no=$row['dosh_no'];
$reg_id=$row['id'];
}
?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Registration for Vaccine</div>
        <div class="card-body">
          <form class="panel panel-success" role="form" action="#" method="Post" enctype="multi">
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" class="form-control" name="full_name" value="<?php echo $full_name;?>">
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone;?>">
              </div>
            </div>
              <div class="col-md-6">
                  <div class="form-group">
                <label for="">Aadhar Number</label>
                <input type="text" name="aadhar_no" class="form-control"value="<?php echo $aadhar;?>">
              </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                <label for="">Vaccine Name</label>
                <select class="form-control" name="vac_nme">
                  <option value="<?php echo $vac_nme;?>"><?php echo $vac_nme;?></option>
                  <?php $q=mysqli_query($con,"SELECT*FROM vacc_stk");
                  while($vac=mysqli_fetch_array($q)){
                    echo '<option value="'.$vac['vac_name'].'">'.$vac['vac_name'].'</option>';}?>
                </select>
              </div>
            </div> 
                  <div class="col-md-3">
                <div class="form-group">
                <label for="">Select Dosh</label>
                <select class="form-control" name="dosh_no">
               
               <?php 
                 if($dosh_no=='1'){
                  echo '<option value="1">1</option>
                        <option value="2">2</option>';
                 }
                    elseif($dosh_no=='2'){
                  echo '<option value="2">2</option>
                        <option value="1">1</option>';
                 }
                   elseif($dosh_no==''){
                  echo '
                  <option value="">Select..</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                        ';
                 }
               ?>
                </select>
              </div>
            </div>  
            </div>
           <a href="reg_vaccine.php" class="btn btn-secondary">Back</a>
           <input type="hidden" name="reg_id" value="<?php echo $reg_id;?>">
            <button type="submit" class="btn btn-primary" name="reg_update">UPDATE</button>
          </form>
        </div>
      </div>
      <?php }else{?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Registration for Vaccine</div>
        <div class="card-body">
          <form class="panel panel-success" role="form" action="#" method="Post" enctype="multi">
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" class="form-control" name="full_name" 
                  autocomplete="off" required>
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone" class="form-control"  autocomplete="off" required>
              </div>
            </div>
              <div class="col-md-6">
                  <div class="form-group">
                <label for="">Aadhar Number</label>
                <input type="text" name="aadhar_no" class="form-control" autocomplete="off" required>
              </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                <label for="">Vaccine Name</label>
                <select class="form-control" name="vac_nme">
                  <option>Select..</option>
                  <?php $q=mysqli_query($con,"SELECT*FROM vacc_stk");
                  while($vac=mysqli_fetch_array($q)){
                    echo '<option value="'.$vac['vac_name'].'">'.$vac['vac_name'].'</option>';}?>
                </select>
              </div>
            </div> 
                  <div class="col-md-3">
                <div class="form-group">
                <label for="">Select Dosh</label>
                <select class="form-control" name="dosh_no">
                <option value="1">1</option>
                <option value="2">2</option>
                </select>
              </div>
            </div>  
            </div>
           <a href="reg_vaccine.php" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="submit">Register</button>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>