<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Vaccination Stock</li>
      </ol>
      
      <!-- Main -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Stock List
      
          <a href="vaccine_stock_add.php"><button class="btn btn-success float-right">Entry</button></a></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Vaccine Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['treated'])){
                  $sql = mysqli_query($con, "SELECT * FROM vacc_stk ");
                }else{
                 $sql = mysqli_query($con, "SELECT * FROM vacc_stk");
                }
                while($data = mysqli_fetch_assoc($sql)){?>
                  <tr>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $data['vac_name']; ?></td>
                     <td><?php echo $data['quantity']; ?></td>
                    <td><?php echo $data['price']; ?></td>
                    <td>
                       <a href="vaccine_stock_add.php?del=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" title="edit vaccine Quantity">
                        <i class="fa fa-remove"></i> 
                      </a>
                      <a href="vaccine_stock_add.php?edit=<?php echo $data['id']; ?>" class="btn btn-info btn-sm" title="delete">
                        <i class="fa fa-edit"></i> 
                      </a>
                    </td>
                  </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>