(function($) {
  "use strict"; // Start of use strict
  // Configure tooltips for collapsed side navigation
  $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
    template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip" style="pointer-events: none;"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
  })
  // Toggle the side navigation
  $("#sidenavToggler").click(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");
    $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
    $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
  });
  // Force the toggled class to be removed when a collapsible nav link is clicked
  $(".navbar-sidenav .nav-link-collapse").click(function(e) {
    e.preventDefault();
    $("body").removeClass("sidenav-toggled");
  });
  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
    var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  });
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  // Configure tooltips globally
  $('[data-toggle="tooltip"]').tooltip()
  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });
})(jQuery); // End of use strict


// Medical DETAILS
$(document).ready(function(){
  get_medicines();
  
  var count = 1;
  $('#add_row').click(function(){
    count = count + 1;
    var table_row = "<tr id='row" + count + "'>";
    table_row += "<td class='med_name'></td>";
    table_row += "<td contenteditable='true' class='med_qty'></td>";
    table_row += "<td contenteditable='true' class='med_dos'></td>";
    table_row += "<td contenteditable='true' class='comment'></td>";
    table_row += "<td><button type='button' data-row='row" + count + "' class='btn btn-danger btn-sm remove'><i class='fa fa-trash-o'></i> remove row</button></td>";
    table_row += "</tr>";
    $('#medical-table').append(table_row);

    get_medicines();
  });

  $(document).on('click','.remove',function(){
    var data_row = ($(this).data('row'));
    $('#'+data_row).remove();
  });

  // SAVE MEDICINE
  $('#save-med').click(function(){
    var name = [];
    var qty = [];
    var dos = [];
    var com = [];
    var pid = $('#patient_ID').val();

    $('.m_name').each(function(){
      name.push($(this).val());
    });
    $('.med_qty').each(function(){
      qty.push($(this).text());
    });
    $('.med_dos').each(function(){
      dos.push($(this).text());
    });
    $('.comment').each(function(){
      com.push($(this).text());
    });

    console.log(name);

    $.ajax({
      url:'./includes/manage_pat.php',
      method:'POST',
      data:{key:'save_med',med_name:name,med_qty:qty,med_dos:dos,com:com,id:pid},
      success:function(data){
        if (data == 'success') {
           $("td[contenteditable='true']").text('');
          for (var i = 2; i <= count; i++) {
              $('tr#row' + i +'').remove();
          } 
          alert("Record saved successfully!");
          window.location = 'patient_list.php';
        }else{
          alert(data);
        } 
      }
    });
  });

  // SELECT PIKER
  $('.selectpicker').selectpicker();
  $('#test').change(function(){
    $('#hidden_items').val($('#test').val());
  });
});

function get_medicines(){
      $.ajax({
      url:'./includes/server.php?huss',
      method:'GET',
      success:function(data){
        $('.med_name').html(data);
      }
    });
  }

  // MANAGE Appointments
function manage_appoit(key,id){
  $.ajax({
    url:'./includes/manage_appoit.php',
    method:'POST',
    dataType:'text',
    data:{key:key,id:id},
    success:function(data){
      console.log(data);
      if (data == 'Accepted') {
        $('#app_'+id).html("<button class='btn btn-default btn-sm' style='width: 154px;' disabled='disabled'>Accepted</button>");
        window.location.reload();
      }else if (data == 'Declined') {
        $('#app_'+id).html("<button class='btn btn-warning btn-sm' style='width: 154px;' disabled='disabled'>Declined</button>");
        window.location.reload();
      }
    }
  });
}