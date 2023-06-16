<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tech Phantoms | LOGIN</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <div class="logo">
      <h2>Tech Phantoms</h2>
    </div>
    <form class="login-form">
      <p>
        <label class="input_label">Email Address</label>
        <input class="textBoxes error" id="email" onkeydown="validateEmail()" type="text" autocomplete="off">
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
        <small id="emlError">Email address is not valid!</small>
      </p>
      <p>
        <label class="input_label">Password</label>
        <input class="textBoxes error" id="pwd" onkeydown="validatePwd()" type="password" autocomplete="off">
        <small id="pwdError">Password is too short!</small>
      </p>
      <p>
        <button type="button" onclick="showMsg()">LOGIN</button>
      </p>
    </form>
       <p id="msg"></p>
  <div class="footer">
     <p style="color:#000;font-size:15px;">Copyright © 2021 HCMS. All Rights Reserved</p>
  </div>
 
  </div>
<!--   <ol style="padding-left: 20px;">
    <li> sr ----- username ------ password</li>
    <li>1- 
      admin@gmail.com ---      admin
    </li>
      <li>2- 
      lab@gmail.com ---      admin
    </li>
      <li>3- 
      receptionist@gmail.com ---      admin
    </li>
      <li>4- 
      doctor@gmail.com ---      admin
    </li>
      <li>5- 
      pharmasist@gmail.com ---      admin
    </li>
  </ol> -->

<script src="assets/js/jquery.min.js"></script>
<script src="main.js"></script>
</body>
</html>

<style>
  body{

  background-image: url(login-page-bg.jpg);
  background-size: cover;
  height: 100vh;
  background-repeat: no-repeat;
  background-position: center;
}
.container{
  box-shadow: 0px 0px 10px 0px #bdb3bb;
  background-color: #dcebfea6;
}
</style>
