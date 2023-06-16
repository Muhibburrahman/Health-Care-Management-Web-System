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
          <i class="fa fa-table"></i> Registration List
          <a href="reg_for_vaccine.php" class="btn btn-info float-right">Registration</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th>Full-Name</th>
                <th>Aadhar-Card</th>
                <th>Vaccine-Name</th>
                <th>Reg-Date</th>
                <th>Status</th>
                <th>Actions</th>
              </thead>
              <tbody>
                 <?php
                  $con=mysqli_connect("localhost","root","","student_hcmsdb");
                  $sql = mysqli_query($con, "SELECT * FROM `vaccine`");
                  while ($data=mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['aadhar']; ?></td>
                    <td><?php echo $data['vac_nme']; ?></td>
                    <td><?php echo $data['reg_dte']; ?></td>
                     <td><?php echo $data['status']; ?></td>
                       <td>
                      <a href="reg_for_vaccine.php?edit=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm" title="edit">
                        <i class="fa fa-edit"></i></a>
                          <a href="print.php?cert=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm" title="view vaccine certificate">
                        <i class="fa fa-print"></i></a>
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