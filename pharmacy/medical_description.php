<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Medical</li>
      </ol>
      
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Medical Description</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Medicine Name</th>
                  <th>Quantity</th>
                  <th>Dosage</th>
                  <th>Availability</th>
                  <th>Cost</th>
                  <th width="30%">Comments</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'includes/config.php';
                $sql = mysqli_query($con, "SELECT *  
                  FROM medication WHERE patient_id = '".$_GET['id']."' AND status = 0");
                $i = 1;
                $cost = 0;
                while($data = mysqli_fetch_assoc($sql)){?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $data['med_name'];?></td>
                    <td><?php echo $data['med_qty']; ?></td>
                    <td><?php echo $data['dosage']; ?></td>
                    <td align="center"><span class="btn-success btn-sm"> Yes </span></td>
                    <td><?php echo $data['cost']; ?></td>
                    <td><?php echo $data['comments']; ?></td>
                  </tr>
                  
               <?php $i++; $cost += $data['cost']; } ?>
              </tbody>
            </table>
            <div align="right">
              <a href="payment.php?id=<?php echo $_GET['id']; ?>&cost=<?php echo $cost; ?>" class="btn btn-primary">Save & Next</a>
            </div>
          </div>
        </div>

      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>