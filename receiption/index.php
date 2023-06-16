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
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Appointments!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="appointments.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">New Patients!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="patient_list.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Treated Patients!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="patient_list.php?treated">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
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
      </div>
     
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Latest Registered Patients</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>DoB</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Registred at</th>
                  <th width="18%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'includes/config.php';
                $sql = mysqli_query($con, "SELECT * FROM patient ORDER BY patient_id DESC LIMIT 5");
                while($data = mysqli_fetch_assoc($sql)){?>
                  <tr>
                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                    <td><?php echo $data['dob']; ?></td>
                    <td><?php echo $data['gender']; ?></td>
                    <td><?php echo $data['phone']; ?></td>
                    <td><?php echo $data['address']; ?></td>
                    <td><?php echo $data['regDate']; ?></td>
                    <td>
                      <?php if ($data['treated'] == 1): ?>
                        <button disabled class="btn btn-default btn-sm" title="edit" onclick="make_appoint(<?php echo $data['patient_id']; ?>)">
                        <i class="fa fa-check-square"></i> appoint</button>

                      <button disabled class="btn btn-primary btn-sm" title="You can't edit treated Patient">
                        <i class="fa fa-edit"></i>
                        </button>

                      <a href="includes/manage_pat.php?act=delete_pat&id=<?php echo $data['patient_id']; ?>" class="btn btn-danger btn-sm" title="Edit Patient Infomation">
                        <i class="fa fa-remove"></i>
                      </a>

                      <?php else: ?>
                        <button class="btn btn-info btn-sm" title="edit" onclick="make_appoint(<?php echo $data['patient_id']; ?>)">
                        <i class="fa fa-check-square"></i> appoint</button>
                        <a href="edit_pat.php?act=edit_pat&id=<?php echo $data['patient_id']; ?>" class="btn btn-primary btn-sm" title="Edit Patient Infomation">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="includes/manage_pat.php?act=delete_pat&id=<?php echo $data['patient_id']; ?>" class="btn btn-danger btn-sm" title="Edit Patient Infomation">
                        <i class="fa fa-remove"></i>
                      </a>
                      <?php endif ?>
                      
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