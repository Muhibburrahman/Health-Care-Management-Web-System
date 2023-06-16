<?php
session_start();
include 'config.php';
if (isset($_POST['key'])) {
  $id = $_POST['id'];
  if ($_POST['key'] == 'accept') {
    $sql = mysqli_query($con, "UPDATE appointments SET status='Accepted' WHERE appoint_id = '$id'");
    exit("Accepted");
  }else {
    $sql = mysqli_query($con, "UPDATE appointments SET status='Declined' WHERE appoint_id = '$id'");
    exit("Declined");
  }
}

// APPOINT LAB CHECKING
if (isset($_POST['appointBtn'])) {
	$pid = $_POST['pid'];
	$did = $_POST['appoint'];
  $req = $_POST['req'];

	$sql = mysqli_query($con, "INSERT INTO lab_appoint (patient_id,doc_id,req_test,e_date) VALUES ('$pid','$did','$req',NOW())");
	if ($sql) {
		header('Location:'.$_SESSION['redirectURL'].'&wait');
		exit();
	}
}