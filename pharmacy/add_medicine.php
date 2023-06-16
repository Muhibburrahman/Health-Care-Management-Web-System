<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add New</li>
      </ol>
      
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add New Medicine</div>
        <div class="card-body">
          <form action="includes/manage_med.php" method="POST">
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="">Medicine Name</label>
                <input type="text" class="form-control" name="pname" autocomplete="off" required>
              </div>
              <div class="col-sm-6">
                <label for="">Purchasing Price Per Item</label>
                <input type="text" class="form-control" name="price" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="">Selling Price Per Item</label>
                <input type="text" class="form-control" name="sprice" autocomplete="off" required>
              </div>
              <div class="col-sm-6">
                <label for="">Quantity</label>
                <input type="text" class="form-control" name="qty" autocomplete="off" required>
              </div>
            </div>
            <div align="right">
              <button class="btn btn-primary" type="submit" name="add_med"><i class="fa fa-check"></i> Save Medicine</button>
            </div>
          </form>
        </div>

      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>