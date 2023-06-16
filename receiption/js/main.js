$(document).ready(function(){
  //$('#add-patient-form').hide();
  $('#addPatient').click(function(){
    $('#add-patient-form').css('display','block');
    $('#patient-list').css('display','none');
  });

// DataTable
$('#patient_table').DataTable({
    retrieve:true,
    ordering:false,
    lengthChange:false,
  });
});

// Add Patients
function add_patient(key){
  
  $.ajax({
    url:'./includes/server.php',
    method:'POST',
    dataType:'text',
    data:{
      key:key,
      fname:$('#fname').val(),
      regNo:$('#regNo').val(),
      lname:$('#lname').val(),
      dob:$('#dob').val(),
      gender:$('#gender').val(),
      type:$('#pat-type').val(),
      phone:$('#phone').val(),
      email:$('#email').val(),
      address:$('#address').val(),
      id:$('#rowID').val()
    },
    success:function(response){
      if (response != 'success') {
        $('.back_msg').html('<p style="color:#c70505"><span class="glyphicon glyphicon-remove"></span> Something went wrong. Please check your form!</p>').fadeIn();
        setTimeout(function(){
          $('.back_msg').fadeOut();
        },5000);
      }else{
        $('.back_msg').html('<p style="color:green"><span class="glyphicon glyphicon-ok"></span> Patient has been registered successfully!</p>').fadeIn();
        setTimeout(function(){
          $('.back_msg').fadeOut();
        },5000);
        $('#patient_reg_form')[0].reset();
        $('.regNumber').css('display','none').fadeOut();
      }
    }
  });

}


// Appointments
function make_appoint(id){
  $.ajax({
    url:'./includes/manage_pat.php',
    method:'POST',
    dataType:'json',
    data:{key:'make_appoint',id:id},
    success:function(data){
      console.log(data);
      $('#current').val(data.name);
      $('#app_from').val(id);
      $('#a_phone').val(data.phone);
      $('#appointments').modal('show');
    }
  });
}

// PRINT REPORT
function print_report(key){
  var from = $('#from').val();
  var to = $('#to').val();
  $.ajax({
    url:'./includes/server.php',
    method:'POST',
    dataType:'text',
    data:{key:key,from:from,to:to},
    success:function(data){
      $('#patient_list_table').html(data);
      $('#s_from').val(from);
      $('#s_to').val(to);
    }
  });
}
