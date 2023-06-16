<?php include 'header.php'; 
if (isset($_GET['success'])) {
  echo "<script>alert('Success')</script>";
}

?>
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
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Enter Patients Lab Results</div>
        <div class="card-body">
          <form action="includes/server.php" method="POST">   
            <div class="form-group row">
              <div class="col-md-2">
                <label for="">Malaria</label>
                <select name="malaria" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="">Typhoid</label>
                <select name="typhoid" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="">HIV/AIDs</label>
                <select name="hiv" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="Negative">Negative</option>
                  <option value="Positive">Positive</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="">Blood Group</label>
                <select name="blood" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="0">O</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="">U.T.I</label>
                <select name="uti" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>
            </div>

            <!-- Devider -->
            <div style="height: 50px"></div>
            
            <div class="form-group row">
              <div class="col-md-2">
                <label for="">U.P.T</label>
                <select name="utp" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="">Blood Pressure</label>
                <select name="pressure" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="">Allergy</label>
                <select name="allergy" class="form-control">
                  <option value="n/a">n/a</option>
                  <option value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="">Weight in Kg</label>
                <input type="text" name="weight" value="n/a" class="form-control">
              </div>
              <div class="col-md-2">
               <label for="">Height in cm</label>
                <input type="text" name="height" value="n/a" class="form-control">
              </div>
            </div>
            <?php $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI']; ?>
            <div align="center" style="margin-top: 50px;">
              <button type="submit" name="makeBtn" class="btn btn-primary" style="width: 200px">Submit Results</button>
            </div>
            <input type="hidden" name="idd" value="<?php echo $_GET['id']; ?>">
          </form>
        </div>
        
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>