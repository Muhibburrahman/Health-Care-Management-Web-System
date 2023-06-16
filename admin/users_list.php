<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User list</li>
      </ol>
      
      <!-- Main -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> List of Registered Users <a href="add_user.php" class="float-right btn btn-info">Add</a></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <th>Full Name</th>
                  <th>E-mail Address</th>
                  <th>Status</th>
                  <th width="25%">Last Login</th>
                  <th width="12%">Actions</th>
                </thead>
              <tbody>
                <?php
            
                 $sql = mysqli_query($con, "SELECT * FROM users");
        
                while($data = mysqli_fetch_assoc($sql)){?>
                  <tr>
                      <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                      <td><?php echo $data['email']; ?></td>
                      <td><?php echo $data['status']; ?></td>
                      <td><?php echo $data['last_login']; ?></td>
                      <td>
                    <a href="includes/manage_pat.php?act=del_user&id=<?php echo $data['user_id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
                        <a href="add_user.php?edit=<?php echo $data['user_id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
               <?php } ?>
              </tbody>
            </table>
            <hr>
            <div align="right" style="padding-right: 15px">
              <a href="report.php?excel" class="btn btn-success">Print Excel Sheet</a>
              <a href="report.php?pdf" class="btn btn-info">Print PDF</a>
            </div>
          </div>
        </div>
        
      </div>
  </div>
</div>
<?php include 'footer.php'; ?>