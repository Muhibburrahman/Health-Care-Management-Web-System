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

// UPDATE USER PROFILE
if (isset($_POST['update'])) {
  $fname=$_POST['fname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $lname=$_POST['lname'];
  $id = $_SESSION['user_id'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];

  if ($pass1 != $pass2) {
    header("Location: ".$_SESSION['redirectURL']."?r=pass_not_match");
    exit();
  }else{
    $check = mysqli_query($con, "SELECT * FROM users WHERE user_id='$id' AND password='$pass1'");
    if (mysqli_num_rows($check)>0) {
      $sql = mysqli_query($con, "UPDATE users SET fname='$fname',lname='$lname',phone='$phone',email='$email' WHERE user_id='$id'");
      if ($sql) {
        $_SESSION['username'] = $fname." ".$lname;
        header("Location: ".$_SESSION['redirectURL']."?r=changed");
        exit();
      }
    }else{
      header("Location: ".$_SESSION['redirectURL']."?r=pass_not_found");
      exit();
    }
  }
}
