<?php include 'header.php';
  if (!isset($_GET['act']) || $_GET['act'] != 'select_pat') {
    header("Location: patient_list.php?r=select");
    exit();
  }else{
    include "includes/config.php";
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM patient WHERE patient_id = '$id'");
    $data = mysqli_fetch_assoc($sql);
    $fname = $data['fname'];
    $lname = $data['lname'];

    $date1=date_create($data['dob']);
    $date2=date_create(date("Y-m-d"));
    $diff=date_diff($date1,$date2);
    $age = $diff->format("%y");
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
        <li class="breadcrumb-item active">Sick Description</li>
      </ol>
      
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Fill Patients Sick Description</div>
        <div class="card-body">
          <form method="POST" action="includes/manage_pat.php">
              <div class="form-group row">
                <div class="col-md-4">
                  <label>First Name</label>
                  <input type="text" value="<?php echo $fname; ?>" class="form-control" readonly>
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="col-md-4">
                  <label>Last Name</label>
                  <input type="text" value="<?php echo $lname; ?>" class="form-control" readonly>
                </div>
                <div class="col-md-4">
                  <label>Age</label>
                  <input type="text" value="<?php echo $age; ?>" class="form-control" readonly>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-4">
                  <label>Problem / Disease</label>
                  <input type="text" name="prob" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <label>Since</label>
                  <input type="date" name="since" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <label>Nature of Problem</label>
                  <input type="text" name="nature" class="form-control" required>
                </div>
              </div>
              <!-- Address -->
              <div class="form-group row">
                <div class="col-md-4">
                  <label>Make test for</label>
                  <select name="test" id="test" class="form-control selectpicker" data-live-search="true" multiple>
                    <option>Malaria</option>
                    <option>Typhoid</option>
                    <option>HIV/AIDs</option>
                    <option>Blood Group</option>
                    <option>U.T.I</option>
                    <option>U.T.P</option>
                    <option>Blood Pressure</option>
                    <option>Weight</option>
                    <option>Height</option>
                    <option>Allergy</option>
                  </select>
                </div>
                <div class="col-md-8">
                  <label for="">Comment</label>
                   <textarea class="form-control" name="doct-com"></textarea>
                </div>
              </div>

              <!-- Buttons -->
              <div class="modal-footer" style="padding: 35px 0 0">
                <div class="back_msg">

                </div>
                <input type="hidden" name="hidden_items" id="hidden_items">
                <input type="submit" class="btn btn-primary" value="Submit" name="add_desc">
                <input type="reset" class="btn btn-default" value="Reset">
              </div>
            </form>
        </div>

      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>
