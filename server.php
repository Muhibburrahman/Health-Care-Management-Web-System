<?php
session_start();
include 'admin/includes/config.php';

// Check For Username
if (isset($_POST['key']) && $_POST['key'] == 'checkEmail') {
  $email = $_POST['email'];
  $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
  if (mysqli_num_rows($sql)>0) {
    echo "available";
  }
}

// LOGIN USER INTO THE SYSTEM IF PASSWORD MATCH WITH EMAIL
if (isset($_POST['key']) && $_POST['key'] == 'checkPass') {
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $time = date('jS F, Y h:i:s A');

  $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'");
  if (mysqli_num_rows($sql)>0) {
    $data = mysqli_fetch_assoc($sql);
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['username'] = $data['fname']." ".$data['lname'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['role'] = $data['status'];
    $update = mysqli_query($con, "UPDATE users SET last_login='$time' WHERE user_id='".$_SESSION['user_id']."'");

    if ($update) {
        if ($_SESSION['role'] == 'Doctor') {
          exit("doctor/");
        }elseif($_SESSION['role'] == 'Admin'){
          exit("admin/");
        }elseif($_SESSION['role'] == 'Receptionist'){
          exit("receiption/");
        }elseif($_SESSION['role'] == 'Lab Technician'){
          exit("lab_tech/");
        }else{
          exit("pharmacy/");
        }
      }
    }else{
      exit('nothing');
    }
  }
