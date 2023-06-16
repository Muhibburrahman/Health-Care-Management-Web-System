<?php 
   session_start();
   include 'includes/config.php';
   if (!isset($_SESSION['user_id'])) {
     header("Location: ../index.php?login");
     exit();
   }
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
   <title>Tech Phantoms | HCMS</title>
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
   </head>
   <body class="fixed-nav sticky-footer" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
         <a class="navbar-brand" href="index.php"  >Tech Phantoms</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
        
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                  <a class="nav-link" href="index.php" style="font-size: 20px; border:solid 2px #fff;color:#fff;
          text-align: center;">
                  <i class="fa fa-fw fa-dashboardh"></i>
                  <span class="nav-link-text">Reception Panel</span>
                  </a>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                  <a class="nav-link" href="index.php">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">Dashboard</span>
                  </a>
               </li>
               
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Patients">
                  <a class="nav-link" href="patient_list.php">
                  <i class="fa fa-stethoscope"></i> 
                  <span class="nav-link-text">View Patients</span>
                  </a>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Appoitments">
                  <a class="nav-link" href="appointments.php">
                  <i class="fa fa-stethoscope"></i> 
                  <span class="nav-link-text">Appoitments List</span>
                  </a>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
                  <a class="nav-link" href="profile.php">
                  <i class="fa fa-fw fa-user"></i>
                  <span class="nav-link-text">My Profile</span>
                  </a>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
                  <a class="nav-link" href="reg_vaccine.php">
                  <i class="fa fa-fw fa-users"></i>
                  <span class="nav-link-text">Reg Vacc List</span>
                  </a>
               </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
                  <a class="nav-link" href="vaccine_stock.php">
                  <i class="fa fa-fw fa-tasks"></i>
                  <span class="nav-link-text">Vaccine Stock</span>
                  </a>
               </li>
              
            </ul>
            <ul class="navbar-nav sidenav-toggler">
               <li class="nav-item">
                  <a class="nav-link text-center" id="sidenavToggler">
                  <i class="fa fa-fw fa-angle-left"></i>
                  </a>
               </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               </li>
               <!--<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
                      <span class="badge badge-pill badge-warning">6 New</span>
                    </span>
                    <span class="indicator text-warning d-none d-lg-block">
                      <i class="fa fa-fw fa-circle"></i>
                    </span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">New Notification:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <span class="text-success">
                        <strong>
                          <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                      </span>
                      <span class="small float-right text-muted">11:21 AM</span>
                      <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <span class="text-danger">
                        <strong>
                          <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                      </span>
                      <span class="small float-right text-muted">11:21 AM</span>
                      <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <span class="text-success">
                        <strong>
                          <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                      </span>
                      <span class="small float-right text-muted">11:21 AM</span>
                      <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a>
                  </div>
                  </li>  -->
               <li class="nav-item">
                  <form class="form-inline my-2 my-lg-0 mr-lg-2">
                     <h5 style="margin-top: 7px; color: #f4f4f4"><?php echo $_SESSION['username']; ?></h5>
                  </form>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-fw fa-sign-out"></i>Logout</a>
               </li>
            </ul>
         </div>
      </nav>