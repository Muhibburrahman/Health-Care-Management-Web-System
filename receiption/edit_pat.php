<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
      <?php  
      $sql = mysqli_query($con, "SELECT * FROM patient WHERE patient_id = '".$_GET['id']."'");
      $data = mysqli_fetch_assoc($sql);
      ?>
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Edit Patients Information</div>
        <div class="card-body">
			<form id="patient_reg_form">
				<div class="form-group row">
					<div class="col-md-4">
						<label>First Name</label>
						<input type="text" id="fname" class="form-control" value="<?php echo $data['fname'] ?>">
					</div>
					<div class="col-md-4">
						<label>Last Name</label>
						<input type="text" id="lname" class="form-control" value="<?php echo $data['lname'] ?>">
					</div>
					<div class="col-md-4">
						<label>Gender</label>
						<select id="gender" class="form-control" value="<?php echo $data['gender'] ?>">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-4">
						<label>Birth Date</label>
						<input type="date" id="dob" class="form-control" value="<?php echo $data['regDate'] ?>">
					</div>
					<div class="col-md-4">
						<label>Phone Number</label>
						<input type="text" id="phone" class="form-control" value="<?php echo $data['phone'] ?>">
					</div>
					<div class="col-md-4">
						<label>Email Address</label>
						<input type="text" id="email" class="form-control" value="<?php echo $data['email'] ?>">
					</div>
				</div>
				<!-- Address -->
				<div class="form-group row">
					<div class="col-md-4">
						<label>Resident Address</label>
						<input type="text" id="address" class="form-control" value="<?php echo $data['address'] ?>">
					</div>
					<div class="col-md-4">
						<label for="">Is the Student?</label>
						<select class="form-control" id="pat-type">
							<option value="non student">Choose one</option>
							<option value="student">Student</option>
							<option value="non student">Non Student</option>
						</select>
					</div>
					<div class="col-md-4 regNumber" style="display:none">
						<label for="">Enter Registration Number</label>
						<input type="text" id="regNo" class="form-control" value="<?php echo $data['regNumber'] ?>">
					</div>
				</div>

				<!-- Buttons -->
				<div align="right">
					<input type="hidden" id="rowID" value="<?php echo $data['patient_id']; ?>">
					<div style="float: left;" class="back_msg"></div>
					<input type="button" class="btn btn-primary" value="Updated" onclick="add_patient('editPatient');">
					<input type="reset" class="btn btn-default" value="Reset">
				</div>
			</form>
        </div>
      
      </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>