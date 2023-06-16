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
      
<?php if(isset($_GET['edit'])){ 
	$w=mysqli_query($con,"SELECT*FROM users WHERE user_id='".$_GET['edit']."'");
	while($row=mysqli_fetch_array($w)){
 $fname=$row['fname'];
 $lname=$row['lname'];
 $phone=$row['phone'];
 $email=$row['email'];
 $status=$row['status'];
 $password=$row['password'];
 $user_id=$row['user_id'];
	}?>
<!---update-user--->
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add new user to the system</div>
        <div class="card-body">
          <form class="panel panel-success" role="form" action="#" method="post">
            <div class="form-group row">
              <div class="col-md-6">
                <label for="username">First Name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>" required>
              </div>
              <div class="col-md-6">
                <label for="username">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone;?>" required>
              </div>
              <div class="col-md-6">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email;?>" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="status">Status:</label>
                <select class="form-control" name="status" required="">
                <option value="<?php echo $status;?>"><?php echo $status;?></option>
                  <option value="Receptionist">Receptionist</option>
                  <option value="Doctor">Doctor</option>
                  <option value="Lab-Technician">Lab Technician</option>
                  <option value="Pharmasist">Pharmasist</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="pwd">Password:</label>
                <input type="text" class="form-control" name="password" value="<?php echo $password;?>">
              </div>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
            <a href="users_list.php" class="btn btn-dark">Back</a>
            <button type="submit" class="btn btn-primary" name="USER_UPDATE">UPDATE</button>
          </form>
        </div>
      </div>
<!--update--->
<?php 
 }else{?>
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add new user to the system</div>
        <div class="card-body">
          <form class="panel panel-success" role="form" action="" method="post">
            <div class="form-group row">
              <div class="col-md-6">
                <label for="username">First Name</label>
                <input type="text" class="form-control" name="fname" autocomplete="off" required>
              </div>
              <div class="col-md-6">
                <label for="username">Last Name</label>
                <input type="text" class="form-control" name="lname" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="">Phone Number</label>
                <input type="text" name="phone" class="form-control" autocomplete="off" required>
              </div>
              <div class="col-md-6">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                <option value="null">Select Status</option>
                  <option>Receptionist</option>
                  <option>Doctor</option>
                  <option>Lab Technician</option>
                  <option>Pharmasist</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="pwd">Password:</label>
                <input type="text" class="form-control" readonly value="Default Password is: HCMS123">
              </div>
            </div>
             <a href="users_list.php" class="btn btn-dark">Back</a>
            <button type="submit" class="btn btn-primary" name="submit">Add User</button>
          </form>
        </div>
      </div>
  <?php } ?>
  </div>
</div>
<?php
if(isset($_POST['submit'])){
  $fname=$_POST['fname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $lname=$_POST['lname'];
  $status=$_POST['status'];
  $ckeck_email="select * from users where email='$email'";
  $run_check=mysqli_query($con,$ckeck_email);
  if(mysqli_num_rows($run_check)>0){
    echo"<script>alert('Email is already in use. Please use another one')</script>";
     echo '<script>window.location.href="add_user.php";</script>';
  }
  $query="INSERT INTO users (fname,lname,phone,email,status,password,date_reg,position) values('$fname','$lname','$phone','$email','$status','HCMS123',NOW(),'1')";
  $run=mysqli_query($con,$query);

  if ($run) {
    $sql = mysqli_query($con, "SELECT * FROM users WHERE phone = '$phone' AND email = '$email' ORDER BY user_id DESC LIMIT 1");
    $data = mysqli_fetch_assoc($sql);

    $run2=mysqli_query($con,"insert into employee(user_id,uname,email,position)values('".$data['user_id']."','$fname','$email','$status')");
    if($run2){
      echo"<script>alert('Succsess')</script>";
     echo '<script>window.location.href="users_list.php";</script>';
    }
    else{
      echo"<script>alert('Error')</script>";
      echo '<script>window.location.href="add_user.php";</script>';
    }
  }
}


if(isset($_POST['USER_UPDATE'])){
  $user_id=$_POST['user_id'];
  $fname=$_POST['fname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $lname=$_POST['lname'];
  $status=$_POST['status'];
  $password=$_POST['password'];
  $run=mysqli_query($con,"UPDATE `users` SET `fname`='$fname',`lname`='$lname',`phone`='$phone',`email`='$email',`password`='$password',`status`='$status' WHERE user_id='$user_id'");
   if($run){
     echo"<script>alert('Succsess')</script>";
     echo '<script>window.location.href="users_list.php";</script>';
    }
    else{
      echo"<script>alert('Error')</script>";
      echo '<script>window.location.href="add_user.php";</script>';
    }
}
?>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>