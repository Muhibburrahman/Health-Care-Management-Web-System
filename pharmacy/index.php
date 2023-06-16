<?php include 'header.php'; ?>
  <!-- BODY -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Patients</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="patient_list.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Medicines</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="manage_medicines.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">My Profile!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="profile.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
     
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Latest Registered Medicine</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Medicine Name</th>
                  <th>Purchasing Price</th>
                  <th>Selling Price</th>
                  <th>Available Qty</th>
                  <th>Total Cost</th>
                  <th width="10%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM medicine LIMIT 5");
                $i = 1;
                while($data = mysqli_fetch_assoc($sql)){?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['m_name']; ?></td>
                    <td><?php echo $data['p_price']; ?></td>
                    <td><?php echo $data['s_price']; ?></td>
                    <td><?php echo $data['qty']; ?></td>
                    <td><?php echo number_format(($data['p_price'] * $data['qty'])); ?></td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm" title="edit"><i class="fa fa-edit"></i></a>
                      <a href="includes/manage_med.php?del_med&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-remove"></i></a>
                    </td>
                  </tr>
               <?php $i++;} ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include 'footer.php'?>