<?php
session_start();
include 'config.php';

// PATIENT REGISTRATION
if (isset($_POST['key']) && $_POST['key'] == 'addPatient') {
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $type = mysqli_real_escape_string($con, $_POST['type']);
  if ($type == 'non student') {
    $regNo = '-';
  }else{
    $regNo = mysqli_real_escape_string($con, $_POST['regNo']);
  }
  $dob = mysqli_real_escape_string($con, $_POST['dob']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $regDate = date('Y-m-d');

  // Check if is not empty
    if (empty($fname)||empty($lname)||empty($gender)||empty($type)||empty($regNo)
      ||empty($dob)||empty($phone)||empty($address)||empty($email)) {
      echo "Something wrong!";
    }else{
      $sql = mysqli_query($con, "INSERT INTO patient (fname,lname,status,regNumber,address,phone,email,dob,gender,regDate)
      VALUES ('$fname','$lname','$type','$regNo','$address','$phone','$email','$dob','$gender','$regDate')");
      if ($sql) {
        echo "success";
      }else{
        echo mysqli_error($con);
      }
  }
}

// PATIENT VIEW
if (isset($_POST['key']) && $_POST['key']=='viewPatient') {
  $sql = mysqli_query($con, "SELECT * FROM patient ORDER BY patient_id DESC");
  $result = '';
  while($data = mysqli_fetch_assoc($sql)){
  $result .= '
  <tr>
      <td>'.$data['fname'].' '.$data['lname'].'</td>
      <td>'.$data['dob'].'</td>
      <td>'.$data['gender'].'</td>
      <td>'.$data['phone'].'</td>
      <td>'.$data['address'].'</td>
      <td>'.$data['regDate'].'</td>
      <td>
        <button class="btn btn-info btn-sm" title="edit"><span class="glyphicon glyphicon-edit"></span></button>
        <button class="btn btn-danger btn-sm" title="delete"><span class="glyphicon glyphicon-remove"></span></button>
      </td>
    </tr>';
  }
  exit($result);
}


// PATIENT EDIT
if (isset($_POST['key']) && $_POST['key'] == 'editPatient') {
  $id = $_POST['id'];
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $type = mysqli_real_escape_string($con, $_POST['type']);
  if ($type == 'non student') {
    $regNo = '-';
  }else{
    $regNo = mysqli_real_escape_string($con, $_POST['regNo']);
  }
  $dob = mysqli_real_escape_string($con, $_POST['dob']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $email = mysqli_real_escape_string($con, $_POST['email']);

  // Check if is not empty
    if (empty($fname)||empty($lname)||empty($gender)||empty($type)||empty($regNo)
      ||empty($dob)||empty($phone)||empty($address)||empty($email)) {
      echo "Something wrong!";
    }else{
      $sql = mysqli_query($con, "UPDATE patient SET fname='$fname',lname='$lname',status='$type',regNumber='$regNo',address='$address',phone='$phone',email='$email',dob='$dob',gender='$gender' WHERE patient_id='$id'");
      if ($sql) {
        echo "success";
      }else{
        echo mysqli_error($con);
      }
  }
}


// 
