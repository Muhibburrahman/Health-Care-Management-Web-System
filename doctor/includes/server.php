<?php
session_start();
include 'config.php';

// PATIENT REGISTRATION
if (isset($_POST['key']) && $_POST['key']=='addPatient') {
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $height = mysqli_real_escape_string($con, $_POST['height']);
  $weight = mysqli_real_escape_string($con, $_POST['weight']);
  $dob = mysqli_real_escape_string($con, $_POST['dob']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $regDate = date('d-m-Y');

  // Check if is not empty
    if (empty($fname)||empty($lname)||empty($gender)||empty($height)||empty($weight)
      ||empty($dob)||empty($phone)||empty($address)||empty($email)) {
      echo "Something wrong!";
    }else{
      $sql = mysqli_query($con, "INSERT INTO patient (fname,lname,address,phone,email,dob,gender,height,weight,regDate)
      VALUES ('$fname','$lname','$address','$phone','$email','$dob','$gender','$height','$weight','$regDate')");
      if ($sql) {
        echo "success";
      }else{
        echo mysqli_error($con);
      }
  }
}

// PATIENT REGISTRATION
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


if (isset($_GET['huss'])) {
  $res = '';

  $sql = mysqli_query($con, "SELECT * FROM medicine");
  $res .= "<select class='form-control m_name'>";

  while($data = mysqli_fetch_assoc($sql)){
    $res .= "
      <option>".$data['m_name']."</option>
    ";
  }

  $res .= "</select>";
  echo $res;
}