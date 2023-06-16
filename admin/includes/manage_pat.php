<?php
include 'config.php';
if (isset($_GET['act'])) {
  $id = $_GET['id'];

  if ($_GET['act'] == 'del_pat') {
    $sql = mysqli_query($con, "DELETE FROM patient WHERE patient_id = '$id'");
    if ($sql) {
      header("Location:../patient_list.php?r=deleted");
      exit();
    }else{
      header("Location:../patient_list.php?r=not_deleted");
      exit();
    }
  }

  // DELETE USERS
  if ($_GET['act'] == 'del_user') {
    $sql = mysqli_query($con, "DELETE FROM users WHERE user_id = '$id'");
    if ($sql) {
      header("Location:../users_list.php?r=deleted");
      exit();
    }else{
      header("Location:../users_list.php?r=not_deleted");
      exit();
    }
  }
}


// MAKE Appointment
if (isset($_POST['key']) && $_POST['key'] == 'make_appoint') {
  $id = $_POST['id'];
  $sql = mysqli_query($con, "SELECT * FROM patient WHERE patient_id = '$id'");
  $data = mysqli_fetch_assoc($sql);

  $res = array('name' => $data['fname']." ".$data['lname'],'phone'=>$data['phone']);
  exit(json_encode($res));
}

//
if (isset($_POST['appoint'])) {
  $from = $_POST['from'];
  $to = $_POST['to'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $msg = $_POST['app_msg'];

  $sql = mysqli_query($con, "INSERT INTO appointments (app_from,app_to,phone,app_date,app_time,message)
  VALUES ('$from','$to','$phone','$date','$time','$msg')");
  if ($sql) {
    header("Location:../patient_list.php?r=success");
    exit();
  }else {
    echo mysqli_error($con);
  }
}

// DELETE APPOINTMENT
if (isset($_GET['action'])) {
  $id = $_GET['id'];

  $sql = mysqli_query($con, "DELETE FROM appointments WHERE appoint_id = '$id';");
  if ($sql) {
    header("Location: ../appointments.php?appoint_deleted");
    exit();
  }
}
