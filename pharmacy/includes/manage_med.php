<?php 
session_start();
include 'config.php';

if (isset($_POST['add_med'])) {
	$pname = $_POST['pname'];
	$price = $_POST['price'];
	$sprice = $_POST['sprice'];
	$qty = $_POST['qty'];
	$rBy = $_SESSION['username'];

	$sql = mysqli_query($con, "INSERT INTO medicine (m_name,p_price,s_price,qty,added_by, added_at, status) VALUES ('$pname','$price','$sprice','$qty','$rBy',NOW(),'active') ");
	if ($sql) {
		header('Location: ../add_medicine.php?r=med+added');
		exit();
	}else{
		echo mysqli_error($con);
	}
}

// DELETE MEDICINE
if (isset($_GET['del_med'])) {
	$id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM medicine WHERE id = '$id'");
	if ($sql) {
		header('Location: ../manage_medicines.php?r=med+deleted');
		exit();
	}else{
		echo mysqli_error($con);
	}
}

// EDIT MEDICINE
if (isset($_POST['edit_med'])) {
	$id = $_POST['id'];
	$pname = $_POST['pname'];
	$price = $_POST['price'];
	$sprice = $_POST['sprice'];
	$qty = $_POST['qty'];

	$sql = mysqli_query($con, "UPDATE medicine SET m_name='$pname',p_price='$price',s_price='$sprice',qty='$qty' WHERE id='$id'");
	if ($sql) {
		header('Location: ../manage_medicines.php?r=med+updated');
		exit();
	}else{
		echo mysqli_error($con);
	}
}