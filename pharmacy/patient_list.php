<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Patients</li>
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
                  <th>Full Name</th>
                  <th>DoB</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Registred at</th>
                  <th width="11%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM patient");

                while($data = mysqli_fetch_assoc($sql)){?>
                  <tr>
                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                    <td><?php echo $data['dob']; ?></td>
                    <td><?php echo $data['gender']; ?></td>
                    <td><?php echo $data['phone']; ?></td>
                    <td><?php echo $data['address']; ?></td>
                    <td><?php echo $data['regDate']; ?></td>
                    <td>
                      <?php if ($data['treated'] == 2): ?>
                        <a href="medical_description.php?act=select_pat&id=<?php echo $data['patient_id']; ?>" class="btn btn-primary btn-sm" title="delete"><span class="glyphicon glyphicon-ok"></span> Select</a>
                      <?php else: ?>
                        <button disabled class="btn btn-default">Treated</button>
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
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>