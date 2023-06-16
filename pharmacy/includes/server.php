<?php
session_start();
include 'config.php';

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
