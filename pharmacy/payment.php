<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Payments</li>
      </ol>
      <?php  
        $sql = mysqli_query($con, "SELECT * FROM patient WHERE patient_id = '".$_GET['id']."'");
        $data = mysqli_fetch_assoc($sql);
      ?>
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add Payments</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <tr>
                <td colspan="2">
                  <i class="fa fa-plus"></i> <b>Patient Name:</b> <?php echo $data['fname']." ".$data['lname']; ?> <em>(<?php echo $data['status']; ?>)</em>
                </td>
              </tr>
              <?php  
                $total = $_GET['cost'];
                $data['status'] == 'student' ? $discount = $total * 25 /100 : $discount = 0;
                $net = $total - $discount;
              ?>
              <tr>
                <td>Total Cost: </td>
                <td><?php echo number_format($total); ?> Tsh</td>
              </tr>
              <tr>
                <td>Discount: </td>
                <td>
                  <?php echo number_format($discount); ?> Tsh
                </td>
              </tr>
              <tr>
                <td>Net Total: </td>
                <td><b><?php echo number_format($net); ?> Tsh</b></td>
              </tr>
              <tr>
                <td>Payment Status: </td>
                <td>
                  <form action="includes/manage_pat.php" method="POST">
                  <select name="pay" id="pay" class="form-control">
                    <option value="Paid">Paid</option>
                    <option value="Not Paid">Not Paid</option>
                  </select>
                </td>
              </tr>
            </table>
            <div align="right">
              <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
              <input type="hidden" name="cost" value="<?php echo $total; ?>">
              <input type="hidden" name="discount" value="<?php echo $discount; ?>">
              <input type="hidden" name="net" value="<?php echo $net; ?>">
              <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
              <input type="hidden" name="name" value="<?php echo $data['fname']." ".$data['lname']; ?>">
              <button type="submit" name="save_paid" class="btn btn-primary">Save & Print PDF</button>
            </div>
            </form>
          </div>
        </div>

      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>