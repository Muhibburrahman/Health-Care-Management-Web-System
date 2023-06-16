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
          <a href="fitness_add.php" class="btn btn-info float-right">New-Certificate</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                <th>Full-Name</th>
                <th>Doctor Name:</th>
                <th>Date Of Issue</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                 <?php
                  include 'includes/config.php';
                  $sql = mysqli_query($con, "SELECT * FROM `fitness`");
                  while ($data=mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr class="text-center">
                    <td><?php echo $data['Name_with_tittle'];?></td>
                    <td><?php echo $data['Doctor_Name']; ?></td>
                    <td><?php echo $data['Date_Of_Issue']; ?></td>
                       <td>
                          <a href="fitness_add.php?del=<?php echo $data['fit_id']; ?>" class="btn btn-danger btn-sm" title="view vaccine certificate">
                        <i class="fa fa-remove"></i></a>
                         <a target="_blank" href="certificate.php?print=<?php echo $data['fit_id']; ?>" class="btn btn-warning btn-sm" title="view vaccine certificate">
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