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
      <?php  
        if (isset($_GET['edit'])) {
          $id = $_GET['id'];

          $sql = mysqli_query($con, "SELECT * FROM medicine WHERE id = '$id'");
          $data = mysqli_fetch_array($sql);
        }
      ?>
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add New Medicine</div>
        <div class="card-body">
          <form action="includes/manage_med.php" method="POST">
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="">Medicine Name</label>
                <input type="text" class="form-control" name="pname" autocomplete="off" value="<?php echo $data[1] ?>">
              </div>
              <div class="col-sm-6">
                <label for="">Purchasing Price Per Item</label>
                <input type="text" class="form-control" name="price" autocomplete="off" value="<?php echo $data[2] ?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="">Selling Price Per Item</label>
                <input type="text" class="form-control" name="sprice" autocomplete="off" value="<?php echo $data[3] ?>">
              </div>
              <div class="col-sm-6">
                <label for="">Quantity</label>
                <input type="text" class="form-control" name="qty" autocomplete="off" value="<?php echo $data[4] ?>">
              </div>
            </div>
            <div align="right">
              <input type="hidden" name="id" value="<?php echo $data[0] ?>">
              <button class="btn btn-success" type="submit" name="edit_med"><i class="fa fa-pencil-square-o"></i> Update Medicine</button>
            </div>
          </form>
        </div>
      
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>