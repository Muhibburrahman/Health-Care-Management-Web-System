<?php include 'header.php'; 
if (isset($_GET['wait'])) {
  echo "<script>alert('Please wait for Results')</script>";
}
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="patient_list.php">Patients</a>
        </li>
        <li class="breadcrumb-item active">Lab Results</li>
      </ol>
      <?php  
      if (isset($_GET['lab_results'])) {
        /*$id = $_GET['id'];*/
          $id = '2';
        $req = $_GET['req'];
        $sql = mysqli_query($con, "SELECT * FROM lab_results INNER JOIN patient ON lab_results.patient_id = patient.patient_id WHERE patient.patient_id = '' AND lab_results.status = 0 ORDER BY lab_results.id DESC LIMIT 1");

        $data = mysqli_fetch_array($sql);
      }
      ?>
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Confirm Patients Lab Results</div>
        <div class="card-body">
          <h5>Lab results for: <span><?php echo $data['fname']." ".$data['lname']; ?></span></h5>
            <small>Conducted by Dr. <b><?php echo $data['checked_by']; ?></b> at <span>Friday, 23th May, 2018</span></small>
            <hr>
            <table class="table table-hover table-tripped">
              <thead>
                <tr>
                  <th>Malaria</th>
                  <th>Typhoid</th>
                  <th>HIV/AIDs</th>
                  <th>Blood Group</th>
                  <th>U.T.I</th>
                  <th>U.P.T</th>
                  <th>Blood Pressure</th>
                  <th>Weight</th>
                  <th>Height</th>
                  <th>Allergy</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $data[2]; ?></td>
                  <td><?php echo $data[3]; ?></td>
                  <td><?php echo $data[4]; ?></td>
                  <td><?php echo $data[5]; ?></td>
                  <td><?php echo $data[6]; ?></td>
                  <td><?php echo $data[7]; ?></td>
                  <td><?php echo $data[8]; ?></td>
                  <td><?php echo $data[9]; ?></td>
                  <td><?php echo $data[10]; ?></td>
                  <td><?php echo $data[11]; ?></td>
                </tr>
              </tbody>
            </table>
            <div align="right">
              <?php if (mysqli_num_rows($sql) == 0): ?>
              <div style="float: left;">
                <?php
                 $sql = mysqli_query($con, "SELECT * FROM employee WHERE position = 'Labe Technician'");
                ?>
                <form action="includes/manage_appoit.php" class="form-inline" method="POST">
                   <?php $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI']; ?>
                  <input type="hidden" value="<?php echo $id ?>" name="pid">
                  <select name="appoint" style="margin-right: 10px;" class="form-control">
                    <?php
                      while ($data=mysqli_fetch_assoc($sql)) {
                        echo '<option value="'.$data['user_id'].'">'.$data['uname'].'</option>';
                      }
                    ?>
                  </select>
                  <input type="hidden" name="req" value="<?php echo $req; ?>">
                  <button class="btn btn-info" type="submit" name="appointBtn">Appoint</button>
                </form>
              </div>
              <?php endif ?>
              <form action="includes/manage_pat.php" method="POST">
                <input type="hidden" value="<?php echo $data['patient_id']; ?>" name="id">
                <button class="btn btn-primary" type="submit" name="confirm">Confirm & Next</button>
              </form>
            </div>
        </div>

      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>