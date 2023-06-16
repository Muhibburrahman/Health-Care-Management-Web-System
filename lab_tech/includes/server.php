<?php
session_start();
include 'config.php';

// ENTER PATIENTS VIPIMO
if (isset($_POST['makeBtn'])) {
	$mal = $_POST['malaria'];
	$typ = $_POST['typhoid'];
	$hiv = $_POST['hiv'];
	$bld = $_POST['blood'];
	$uti = $_POST['uti'];
	$utp = $_POST['utp'];
	$pre = $_POST['pressure'];
	$ale = $_POST['allergy'];
	$wei = $_POST['weight'];
	$hei = $_POST['height'];
	$id  = $_POST['idd'];

	$sql = mysqli_query($con, "INSERT INTO lab_results VALUES ('','$id','$mal','$typ','$hiv','$bld','$uti','$utp','$pre','$wei','$hei','$ale','".$_SESSION['username']."','0')");
	if ($sql) {
		$update =  mysqli_query($con, "UPDATE lab_appoint SET status = 1 WHERE patient_id = '$id'");
		header("Location:".$_SESSION['redirectURL']."&success");
		exit();
	}else{
		echo mysqli_error($con);
	}
}