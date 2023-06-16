<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Profile</li>
      </ol>
      
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> My Profile Information</div>
        <div class="card-body">
          <?php
            if (isset($_SESSION['user_id'])) {
              include 'includes/config.php';
              $id = $_SESSION['user_id'];

              $sql = mysqli_query($con, "SELECT * FROM users WHERE user_id = '$id'");
              $data = mysqli_fetch_assoc($sql);
            }
          ?>

          <form action="../includes/userinfo.php" method="post">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="fname" value="<?php echo $data['fname']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="lname" value="<?php echo $data['lname']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $data['phone']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="">Email Address</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>">
                  </div>
                </div>
<!--                 <div class="form-group row">
                  <div class="col-md-6">
                    <label for="">Enter Your Password</label>
                    <input type="password" class="form-control" name="pass1" required>
                  </div>
                  <div class="col-md-6">
                    <label for="">Re-Enter Your Password</label>
                    <input type="password" class="form-control" name="pass2" required>
                  </div>
                </div> -->
                <?php $_SESSION['redirectURL']=$_SERVER['REQUEST_URI']; ?>
              <!--   <button type="submit" name="update" class="btn btn-primary" style="width:120px;">Update</button> -->
              </form>
        </div>
      
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>