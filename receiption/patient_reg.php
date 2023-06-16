<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Patient Registration</li>
      </ol>
      
      <!-- Main -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Confirm Patients Lab Results</div>
        <div class="card-body">
			<form id="patient_reg_form">
				<div class="form-group row">
					<div class="col-md-4">
						<label>First Name</label>
						<input type="text" id="fname" class="form-control" required>
					</div>
					<div class="col-md-4">
						<label>Last Name</label>
						<input type="text" id="lname" class="form-control" required>
					</div>
					<div class="col-md-4">
						<label>Gender</label>
						<select id="gender" class="form-control" required>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-4">
						<label>Birth Date</label>
						<input type="date" id="dob" class="form-control" required>
					</div>
					<div class="col-md-4">
						<label>Phone Number</label>
						<input type="text" id="phone" class="form-control" required>
					</div>
					<div class="col-md-4">
						<label>Email Address</label>
						<input type="text" id="email" class="form-control" required>
					</div>
				</div>
				<!-- Address -->
				<div class="form-group row">
					<div class="col-md-4">
						<label>Resident Address</label>
						<input type="text" id="address" class="form-control" required>
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
						<input type="text" id="regNo" class="form-control">
					</div>
				</div>

				<!-- Buttons -->
				<div align="right">
					<a href="patient_list.php" class="btn btn-dark">Back</a>
					<div style="float: left;" class="back_msg"></div>
					<input type="button" class="btn btn-primary" value="Register" onclick="add_patient('addPatient');">
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