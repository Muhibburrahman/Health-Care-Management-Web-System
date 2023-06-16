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
