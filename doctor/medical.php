<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Medication</li>
      </ol>
  
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Medical Details</div>
        <div class="card-body">
          <div class="table-response">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Medicine Name</th>
                  <th>Quantity</th>
                  <th>Dosage</th>
                  <th width="30%">Comments</th>
                  <th width="10%">#</th>
                </tr>
              </thead>
              <tbody  id="medical-table">
                <tr id="row1">
                  <td class="med_name"></td>
                  <td contenteditable="true" class="med_qty"></td>
                  <td contenteditable="true" class="med_dos"></td>
                  <td contenteditable="true" class="comment"></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            <div align="right">
              <input type="hidden" value="<?php echo $_GET['id']; ?>" id="patient_ID">
              <button type="button" id="add_row" class="btn btn-primary btn-sm"><i class="  fa fa-plus"></i> add row</button>
              <button class="btn btn-success btn-sm" id="save-med"><i class="fa fa-check"></i> Submit</button>
            </div>
          </div>
        </div>
     
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>
