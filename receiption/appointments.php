<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Appointments</li>
      </ol>
      
      <!-- Main -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Appointment List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th>From</th>
                <th>To Doctor</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th width="12%">Actions</th>
              </thead>
              <tbody>
                 <?php
                  include 'includes/config.php';
                  $sql = mysqli_query($con, "SELECT * FROM patient INNER JOIN appointments ON appointments.app_from = patient.patient_id INNER JOIN employee ON appointments.app_to = employee.user_id");
                  while ($data=mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                    <td><?php echo "Dr. ".$data['uname']; ?></td>
                    <td><?php echo $data['phone']; ?></td>
                    <td><?php echo $data['app_date']; ?></td>
                    <td><?php echo $data['app_time']; ?></td>
                    
                    <td>
                      <a href="includes/manage_pat.php?action=delete_app&id=<?php echo $data['appoint_id']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"> Remove</span></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>