$(document).ready(function(){
  //$('body').scrollspy({ target: '.navbar-example' });
/*
  $("#nav ul li a[href^='#']").on('click', function(e) {

   // prevent default anchor click behavior
   e.preventDefault();

   // store hash
   var hash = this.hash;

   // animate
   $('html, body').animate({
       scrollTop: $(this.hash).offset().top
     }, 3000, function(){

       // when done, add hash to url
       // (default click behaviour)
       window.location.hash = hash;
     });

  });*/

  $('.thumbs').portfolio({
      cols: 3,
      transition: 'slideDown'
  });

  $('#rest-tab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
   var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today = yyyy+'-'+mm+'-'+dd;
    mm =parseInt(mm)+3;
    var end_date = yyyy+'-'+mm+'-'+dd;
    $('#check-in-date').on('changeDate',function(e){
      var date2 = $(this).datepicker('getDate', '+1d'); 
      date2.setDate(date2.getDate()+1);
      $('#check-out-date').datepicker('setStartDate',date2);
      $('#check-out-date').datepicker('update',date2);
    })
  $('#datepicker input').datepicker(
  {
    format : "yyyy-mm-dd",
    startDate : today,
    endDate : end_date
  })

  function getParam(url,param)
  { 
    var params_array = url.split('&');
    var return_data;
    $.each(params_array,function(key,value){
      var individual_param = value.split('=');
      if(individual_param[0] == param)
      {
        return_data = individual_param[1];
      }
    })
    return return_data;
  }

  $('#payumoney').click(function(){
    var url = location.href.split('?')[1];
    var start = getParam(url,"start");
    var end = getParam(url,"end");
    var adults = getParam(url,"adults");
    var id = getParam(url,"id");
    $.ajax({
      url: 'calculateFare.php',
      method: 'POST',
      async: false,
      dataType: 'json',
      data : {start:start,end:end,adults:adults,id:id},
      success: function(response){
      },
      failure: function(error){
        alert('Internal server error please try again in sometime');
      }
    })
  });


  $('[data-toggle="tooltip"]').tooltip();

  $(document).on('click','.facility-group',function(){
    console.log($(this).data('id'));
    var div_id = $(this).data('id');
    var content_html = $('#facility-content #'+div_id).html();
    $('#facility-show-content').empty();
    var content_html = "<div class=\"content\">" +content_html+"</div>";
    console.log(content_html);
    $('#facility-show-content').append(content_html);
  });

  $('.facility-group').hover(function(){
    var div_id = $(this).data('id');
    var content_html = $('#facility-content #'+div_id).html();
    $('#facility-show-content').empty();
    var content_html = "<div class=\"content\">" +content_html+"</div>";
    $('#facility-show-content').append(content_html);
    $('#tariffs').css('background-image',"url('img/"+div_id+".jpg'");
  },function(){
    console.log("out");
  });

  $('.booking-btn').click(function(){
    var url = location.href.split('?')[1];
    url = url + "&id="+$(this).data('id');
    console.log(url);
    location.href="prepay.php?"+url;
  });

 
  var content_html = $('#facility-content #standard').html();
  $('#facility-show-content').empty();
  var content_html = "<div class=\"content\">" +content_html+"</div>";
  $('#facility-show-content').append(content_html);


});