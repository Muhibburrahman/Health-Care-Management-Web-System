<?php
session_start();
include 'config.php';

// INSERT PATIENTS SICK DETAILS IN THE DATABASE
if (isset($_POST['save_paid'])) {
  $cost = $_POST['cost'];
  $disc = $_POST['discount'];
  $net = $_POST['net'];

  $name = $_POST['name'];
  $email = $_POST['email'];
  $pay = $_POST['pay'];
  $id = $_POST['id'];

  $sql = mysqli_query($con, "INSERT INTO malipo (patient_id, amount, Status) VALUES ('$id','$net','$pay')");
  if ($sql) {
    $update = mysqli_query($con, "UPDATE medication SET status = 1 WHERE patient_id = '$id'");
    $update = mysqli_query($con, "UPDATE patient SET treated = 1 WHERE patient_id = '$id'");
    header("Location: ../final.php?cost=$cost&disc=$disc&net=$net&id=$id");
    exit();
  }else{
    echo mysqli_error($con);
  }
}