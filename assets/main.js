$(document).ready(function(){

});

function validateEmail() {
  var email = $('#email');
  var emEr = $('#emlError');
  document.getElementById('msg').style.display = 'none';

  if (!mailVal(email.val())) {
    emEr.html("Email address is not valid!").css('display','block');
    email.css('border','2px solid #db0707');
  }else{
    email.css('border','2px solid green');
    emEr.css('display','none');
  }
}

function mailVal(email) {
  var patt = /^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/;
  return patt.test(email);
}

function validatePwd() {
  var pass = $('#pwd');
  var passEr = $('#pwdError');
  document.getElementById('msg').style.display = 'none';
  if (pass.val().length < 5) {
    passEr.html("Password is too short!").css('display','block');
    pass.css('border','2px solid #db0707');
  }else{
    pass.css('border','2px solid green');
    passEr.css('display','none');
  }
}

function showMsg(){
  var msg = $('#msg');
  var pass = $('#pwd');
  var email = $('#email');
  var passEr = $('#pwdError');
  var emEr = $('#emlError');

  if (email.val() == "") {
    emEr.html("Please enter your Email!").css('display','block');
    email.css('border','2px solid #db0707');
  }else{
    // Check if email has been registered
    $.ajax({
      url:'includes/server.php',
      method:'POST',
      data:{key:'checkEmail',email:email.val()},
      success:function(data){
        console.log(data);
        if (data == 'available') {
          if (pass.val() == "") {
            passEr.html("Please enter your Email!").css('display','block');
            pass.css('border','2px solid #db0707');
          }else{
            $.ajax({
              url:'includes/server.php',
              method:'POST',
              data:{key:'checkPass',email:email.val(),pass:pass.val()},
              success:function(data){
                console.log(data);
                if (data == 'receiption/') {
                  window.location = data;
                }else{
                  passEr.html("Invalid Password! Please enter a valid Password.").css('display','block');
                  pass.css('border','2px solid #db0707');
                }
              }
            });
          }
        }else{
          emEr.html("Please enter a valid Email Address!").css('display','block');
          email.css('border','2px solid #db0707');
        }
      }
    });
  }
}
