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
          <i class="fa fa-table"></i> Latest Registered Patients</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Patient Name</th>
                  <th>Problem</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id = $_SESSION['user_id'];
                $sql = mysqli_query($con, "SELECT * FROM patient as pa
                  INNER JOIN appointments as ap ON ap.app_from = pa.patient_id
                  WHERE ap.app_to = '$id' ORDER BY pa.patient_id DESC");
                while($data = mysqli_fetch_assoc($sql)){?>
                  <tr>
                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                    <td>Homa</td>
                    <td><?php echo $data['address']; ?></td>
                    <td><?php echo $data['phone']; ?></td>
                    <td><?php echo $data['app_date']; ?></td>
                    <td><?php echo $data['app_time']; ?></td>
                    <?php if ($data['status'] != 'Pending'): ?>
                      <td>
                        <?php if ($data['status']=='Accepted'): ?>
                          <a href="sick_description.php?act=select_pat&id=<?php echo $data['patient_id']; ?>" class='btn btn-primary btn-sm' style="width: 130px;"><i class="fa fa-check"></i> Select</a>
                        <?php else: ?>
                            <button class='btn btn-warning btn-sm' style='width: 154px;' disabled='disabled'>Declined</button>
                        <?php endif; ?>
                      </td>
                    <?php else: ?>
                      <td id="app_<?php echo $data['appoint_id'];?>">
                        <button onclick="manage_appoit('accept',<?php echo $data['appoint_id']; ?>)" class="btn btn-primary btn-sm" title="Accept"><span class="glyphicon glyphicon-ok"></span> Accept</button>
                        <button onclick="manage_appoit('decline',<?php echo $data['appoint_id']; ?>)" class="btn btn-danger btn-sm" title="Decline"><span class="glyphicon glyphicon-remove"></span> Decline</button>
                      </td>
                    <?php endif; ?>
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