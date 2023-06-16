<?php
session_start();
include 'config.php';

// INSERT PATIENTS SICK DETAILS IN THE DATABASE
if (isset($_POST['add_desc'])) {
  $id = $_POST['id'];
  $prob = $_POST['prob'];
  $since = $_POST['since'];
  $nature = $_POST['nature'];
  $doct = $_SESSION['username'];
  $comm = $_POST['doct-com'];
  $test = $_POST['hidden_items'];
  $date = date("Y-m-d");

  $sql = mysqli_query($con, "INSERT INTO sick_description (patient_id,problem,since,nature, checked_by,checked_date,comment)
        VALUES ('$id','$prob','$since','$nature','$doct','$date','$comm')");
  if ($sql) {
    header("location:../lab_results.php?lab_results&id=$id&req=$test");
    exit();
  }else{
    echo mysqli_error($con);
  }
}

// COMFIRM LAB RESULT
if (isset($_POST['confirm'])) {
  $id = $_POST['id'];

  $sql = mysqli_query($con, "UPDATE lab_results SET status = '1' WHERE patient_id = '$id'");
  if ($sql) {
    header('Location: ../medical.php?id='.$id);
    exit();
  }
}





// SAVE MEDICINE
if (isset($_POST['key']) && $_POST['key'] == 'save_med') {
  $name = $_POST['med_name'];
  $qty = $_POST['med_qty'];
  $dos = $_POST['med_dos'];
  $com = $_POST['com'];
  $id = $_POST['id'];

  $sql = "";
  for ($i=0; $i<count($name); $i++) { 

    $name_clean = mysqli_real_escape_string($con, $name[$i]);
    $qty_clean = mysqli_real_escape_string($con, $qty[$i]);
    $dos_clean = mysqli_real_escape_string($con, $dos[$i]);
    $com_clean = mysqli_real_escape_string($con, $com[$i]);

    if ($name_clean != '' && $qty_clean != '' && $dos_clean != '' && $com_clean != '') {

       $check = mysqli_query($con, "SELECT * FROM medicine WHERE m_name LIKE '$name_clean'");
      $data = mysqli_fetch_assoc($check);
      $cost =  $data['s_price'] * $qty_clean;
      
      $sql .= "INSERT INTO medication (patient_id,med_name,med_qty,dosage,cost,comments,md_date) VALUES ('$id','$name_clean','$qty_clean','$dos_clean','$cost','$com_clean',NOW());";
    }
  }

  if ($sql != '') {
    if (mysqli_multi_query($con, $sql)) {
      
      // Close connection first to eliminate error
      mysqli_close($con);

      // Open new connection
      include 'config.php';
      $upd = mysqli_query($con, "UPDATE patient SET treated = 2 WHERE patient_id = '$id'");
      if ($upd) {
        echo "success";
      }else{
      echo mysqli_error($con);
    }
    }else{
      echo mysqli_error($con);
    }
  }else{
    echo "All fields are required!";
  }

  //echo "Name: ".$name." Quantity ".$qty." Dosage ".$dos;
}