$(document).ready(function(){
    //$("#addresForm").hide();
    $('.radio-group .radio').click(function(){
    $('.radio').addClass('gray');
    $(this).removeClass('gray');
    });
    
    $('.plus-minus .plus').click(function(){
    var count = $(this).parent().prev().text();
    $(this).parent().prev().html(Number(count) + 1);
    });
    
    $('.plus-minus .minus').click(function(){
    var count = $(this).parent().prev().text();
    $(this).parent().prev().html(Number(count) - 1);
    });
    
    });
$("#btn-address").click(function(){
    if ($("#addresForm").hasClass('d-none')) {
        $("#addresForm").removeClass('d-none');
    }
    else{
        $("#addresForm").addClass('d-none');
    }

  });
$('#pinCode').on('input', function(){
  if($(this).val().length == 6){
  $.ajax({
    type: "GET",
    url: "https://api.postalpincode.in/pincode/"+$(this).val(),
   cache: false,
   success: function(response){
   //$("#more").after(html);
    $("#district").val(response[0]['PostOffice'][0]['District']);
    $("#state").val(response[0]['PostOffice'][0]['State']);
    console.log(response[0]['PostOffice'][0]['State']);
    console.log(response[0]['PostOffice'][1]['Name']);
   }
  });
  }
});

$('#saveAddress').click(function(){
  var addressData = {};
    addressData['user_id'] = $("#userId").val();
    addressData['line_1'] = $("#fullName").val();
    addressData['line_2'] = $("#completeAddress").val();
    addressData['line_3'] = $("#location").val();
    addressData['district'] = $("#district").val();
    addressData['state'] = $("#state").val();
    addressData['pin'] = $("#pinCode").val();
    addressData['contact_number_1'] = $("#primaryMobile").val();
    addressData['contact_number_2'] = $("#SecondMobile").val();
    $.ajax({
        data: addressData, 
        type: 'POST',
        url: $('#baseUrl').val()+'profile/add_new_address',
        success: function(response){
           location.reload();
        }
    });
});
    
// $("#btn-address").click(function(){

//     $("#addresForm").show();

//   });


  $("#btn-cancel").click(function(){

    $("#addresForm").hide();

  });