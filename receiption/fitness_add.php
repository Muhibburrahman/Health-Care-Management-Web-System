<?php include 'header.php';
include("includes/config.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add user</li>
      </ol>
      <!-- Main -->
      <?php
      if(isset($_GET['del']))
      {
       $id=$_GET['del'];
       $q=mysqli_query($con,"DELETE FROM `fitness` WHERE fit_id='$id'");
       if($q){
        echo '<script>window.location.href="fitness.php";</script>';
       }
       else{
         echo '<script>window.location.href="fitness.php";</script>';
       }
      }

       if(isset($_POST['submit'])){
           $Name_with_tittle=$_POST['Name_with_tittle'];
           $Parents_Name=$_POST['Parents_Name'];
           $Village=$_POST['Village'];
           $Age_Years=$_POST['Age_Years'];
           $Doctor_Name=$_POST['Doctor_Name'];
           $Post_Office=$_POST['Post_Office'];
           $Massage=$_POST['Massage'];
           $State=$_POST['State'];
           $Pincode=$_POST['Pincode'];
           $District=$_POST['District'];
           $Registration_No=$_POST['Registration_No'];
           $Date_Of_Issue=$_POST['Date_Of_Issue'];
           $Joining_date=date('d-M-Y');
$query=mysqli_query($con,"INSERT INTO `fitness`(`Name_with_tittle`, `Parents_Name`, `Village`, `Age_Years`, `Doctor_Name`, `Post_Office`, `Massage`, `State`, `Pincode`, `District`, `Registration_No`, `Date_Of_Issue`, `Joining_date`, `Status`) VALUES ('$Name_with_tittle', '$Parents_Name', '$Village', '$Age_Years', '$Doctor_Name', '$Post_Office', '$Massage', '$State', '$Pincode', '$District', '$Registration_No', '$Date_Of_Issue', '$Joining_date', 'Y')");
      if($query)
      {
         $last_id = $con->insert_id;
           echo '<script>window.location.href="certificate.php?print='.$last_id.'";</script>';
      }
      else
      {
         echo '<script>alert("try..");</script>';
        echo '<script>window.location.href="fitness_add.php";</script>';
      }
      }
      ?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add new user to the system</div>
        <div class="card-body">
          <form class="panel panel-success" role="form" action="#" method="post">
           
            <div class="form-group row">
              <div class="col-md-6">
                <label >Name with tittle:</label>
                <input type="text" class="form-control" name="Name_with_tittle">
              </div>
              <div class="col-md-6">
           
                <label>Parents Name:</label>
                 <input type="text" class="form-control" name="Parents_Name">
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col-md-6">
                <label for="village">Village:</label>
                <input type="text" class="form-control" name="Village">
              </div>
              <div class="col-md-6">
                <label>Age Years:</label>
                <input type="text" class="form-control" name="Age_Years">
              </div>
            </div>
            <div class="form-group row">
              
               <div class="col-md-6">
                <label for="Doctor name">Doctor Name:</label>
                <input type="text" class="form-control" name="Doctor_Name">
              </div>
               
              <div class="col-md-6">
                <label for="pc">Post Office:</label>
                <input type="text" class="form-control" name="Post_Office">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="Massage">Massage:</label>
                <input type="text" class="form-control" name="Massage">
              </div>
             <div class="col-md-6">
               <label for="status">State:</label>
                <input type="text" class="form-control" name="State">
              </div>
            </div>
            <div class="form-group row">
               <div class="col-md-6">
                <label for="pincode">Pincode:</label>
                <input type="text" class="form-control" name="Pincode">
              </div>
              <div class="col-md-6">
                <label for="District">District:</label>
                <input type="text" class="form-control" name="District">
              </div>
             
            </div>
            
            <div class="form-group row">
              <div class="col-md-6">
                <label for="Registration">Dr. Registration No.:</label>
                <input type="text" class="form-control" name="Registration_No">
              </div>
              <div class="col-md-6">
                <label>Date Of Issue:</label>
                <input type="text" class="form-control" name="Date_Of_Issue">
              </div>
            </div>
            <div class="form-group row">
            </div>
            <a href="fitness.php" class="btn btn-dark">Back</a>
            <button type="submit" class="btn btn-primary" name="submit">Print</button>
          </form>
        </div>
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>