<?php include 'header.php'; ?>
  <!-- BODY -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Appointments List</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="appointments.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Patients List</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="patient_list.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Users List</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users_list.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">My Profile!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="profile.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
              <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">Reg Vaccine List</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="reg_vaccine.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
          <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-tasks"></i>
              </div>
              <div class="mr-5">Vaccine Stock</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="vaccine_stock.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
     
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Latest System's Users</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <th>Full Name</th>
                  <th>E-mail Address</th>
                  <th>Status</th>
                  <th width="25%">Last Login</th>
                  <th width="12%">Actions</th>
                </thead>
                <tbody>
                   <?php
                    $sql = mysqli_query($con, "SELECT * FROM users LIMIT 10");
                    while ($data=mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                      <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                      <td><?php echo $data['email']; ?></td>
                      <td><?php echo $data['status']; ?></td>
                      <td><?php echo $data['last_login']; ?></td>
                      <td>
                        <a href="includes/manage_pat.php?act=del_user&id=<?php echo $data['user_id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
                        <a href="add_user.php?edit=<?php echo $data['user_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
       
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include 'footer.php'?>

