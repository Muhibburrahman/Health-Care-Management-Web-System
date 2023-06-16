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
                <th>Phone</th>
                <th>Check For</th>
                <th>Checking Date</th>
                <th width="12%">Actions</th>
              </thead>
              <tbody>
                 <?php
                  include 'includes/config.php';
                  $sql = mysqli_query($con, "SELECT * FROM patient INNER JOIN lab_appoint ON lab_appoint.patient_id = patient.patient_id INNER JOIN employee ON lab_appoint.doc_id = employee.user_id WHERE doc_id = '".$_SESSION['user_id']."'");
                  while ($data=mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                    <td><?php echo $data['phone']; ?></td>
                    <td><?php echo $data['req_test']; ?></td>
                    <td><?php echo $data['e_date']; ?></td>
                    
                    <td>
                      <?php if ($data['status'] == 0): ?>
                        <a href="lab_results.php?action=make&id=<?php echo $data['patient_id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-check"> Select</i></a>
                        <?php else: ?>
                          <button disabled class="btn btn-default btn-sm"><i class="fa fa-check"></i> Tested</button>
                      <?php endif ?>
                      
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>