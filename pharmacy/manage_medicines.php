<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Manage Medicines</li>
      </ol>
      
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Medicine List
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Medicine Name</th>
                  <th>Purchasing Price</th>
                  <th>Selling Price</th>
                  <th>Available Qty</th>
                  <th>Total Cost</th>
                  <th width="17%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM medicine");
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
                      <a href="edit_medicine.php?edit&id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm" title="edit"><i class="fa fa-edit"></i> edit</a>
                      <a href="includes/manage_med.php?del_med&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-remove"></i> Remove</a>
                    </td>
                  </tr>
               <?php $i++;} ?>
              </tbody>
            </table>
            <div align="right">
              <a href="report.php?excel" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Print Excel Sheet</a>
              <a href="report.php?pdf" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Print PDF</a>
            </div>
          </div>
        </div>

      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>