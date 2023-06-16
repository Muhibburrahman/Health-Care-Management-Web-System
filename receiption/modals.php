<!-- Change Password -->
<div class="modal fade" id="changePassword">
  <?php $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI']; ?>
  <div class="modal-dialog"  style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Change Your Password</h3>
      </div>
      <div class="modal-body">
        <form action="includes/userinfo.php" method="POST">
          <div class="form-group">
            <label>Enter the Current Password</label>
            <input type="password" name="current" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Enter New Password</label>
            <input type="password" name="new" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="changeBtn">Change</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- APPOINTMENTS -->
<!-- Change Password -->
<?php
 $sql = mysqli_query($con, "SELECT * FROM employee WHERE position = 'Doctor'");
?>
<div class="modal fade" id="appointments">
  <?php $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI']; ?>
  <div class="modal-dialog" style="max-width: 800px">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Doctor Appointment</h3>
      </div>
      <div class="modal-body">
        <form action="includes/manage_pat.php" method="POST">
          <div class="form-group row">
            <div class="col-md-6">
              <label>From</label>
              <input type="text" id="current" class="form-control" readonly>
              <input type="hidden" id="app_from" name="from" >
            </div>
            <div class="col-md-6">
              <label>To Doctor</label>
              <select name="to" class="form-control">
                <?php
                  while ($data=mysqli_fetch_assoc($sql)) {
                    echo '<option value="'.$data['user_id'].'">'.$data['uname'].'</option>';
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label>Phone Number</label>
              <input type="text" id="a_phone" name="phone" class="form-control" readonly>
            </div>
            <div class="col-md-3">
              <label>Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label>Time</label>
              <input type="time" name="time" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
              <label>Message</label>
              <textarea name="app_msg" class="form-control"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="appoint">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
