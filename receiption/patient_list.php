<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Patient List  </li>
      </ol>
      
      <!-- Main -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Latest Registered Patients    <a href="patient_reg.php" class="float-right btn btn-info">Add-Patients</a></div>
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
                if (isset($_GET['treated'])) {
                  $sql = mysqli_query($con, "SELECT * FROM patient WHERE treated=1");
                }else{
                 $sql = mysqli_query($con, "SELECT * FROM patient ORDER BY treated ASC");
                }
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
            <hr>
            <div align="right" style="padding-right: 15px">
              <a href="report.php?excel" class="btn btn-success">Print Excel Sheet</a>
              <a href="report.php?pdf" class="btn btn-info">Print PDF</a>
            </div>
          </div>
        </div>
      
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>