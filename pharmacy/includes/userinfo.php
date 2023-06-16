<?php
session_start();
include 'config.php';

// CHANGE USER PASSWORD
if (isset($_POST['changeBtn'])) {
  $current = mysqli_real_escape_string($con, $_POST['current']);
  $new = mysqli_real_escape_string($con, $_POST['new']);

  $check = mysqli_query($con, "SELECT password FROM users WHERE email='".$_SESSION['email']."' AND password='$current'");
  if (mysqli_num_rows($check)>0) {
    $sql = mysqli_query($con, "UPDATE users SET password = '$new' WHERE email = '".$_SESSION['email']."' AND password = '$current'");
    if ($sql) {
      header("Location: ".$_SESSION['redirectURL']."?r=changed");
      echo "Changed";
    }else{
      echo mysqli_error($con);
    }
  }else{
    echo "You enter a wrong current Password";
  }
}
