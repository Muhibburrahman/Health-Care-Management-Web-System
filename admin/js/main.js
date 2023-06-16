$(document).ready(function(){
  getPatientData()
  //$('#add-patient-form').hide();
  $('#addPatient').click(function(){
    $('#add-patient-form').css('display','block');
    $('#patient-list').css('display','none');
  });
  $('#managePatient').click(function(){
    $('#add-patient-form').css('display','none');
    $('#patient-list').css('display','block');
  });

// Add Patients
function add_patient(){
  $.ajax({
    url:'./includes/server.php',
    method:'POST',
    dataType:'text',
    data:{
      key:'addPatient',
      fname:$('#fname').val(),
      height:$('#height').val(),
      lname:$('#lname').val(),
      dob:$('#dob').val(),
      gender:$('#gender').val(),
      weight:$('#weight').val(),
      phone:$('#phone').val(),
      email:$('#email').val(),
      address:$('#address').val(),
    },
    success:function(response){
      console.log(response);
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
        // getPatientData()
      }
    }
  });
}

// FETCH PTIENTS Data
function getPatientData(){
  $.ajax({
    url:'./includes/server.php',
    method:'POST',
    dataType:'text',
    data:{key:'viewPatient'},
    success:function(data){
      $('#patient_list').html(data);
      if ($.fn.dataTable.isDataTable('#patient_table')) {
        table = $('#patient_table').DataTable();
      }else{
        table = $('#patient_table').DataTable({
          retrieve:true,
          ordering:false,
          lengthChange:false,
          pageLength:5
        });
      }
    }
  });
}
