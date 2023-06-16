<?php
session_start();
include 'includes/config.php';
$time = date('jS F, Y h:i:s A');
$update = mysqli_query($con, "UPDATE users SET last_login='$time' WHERE user_id='".$_SESSION['user_id']."'");
if ($update) {
	session_destroy();
	header("location: ../index.php");
}

?>
