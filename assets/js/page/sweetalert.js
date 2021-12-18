"use strict";

$("#swal-1").click(function () {
  swal('Hello');
});

$("#swal-2").click(function () {
  swal('Good Job', 'You clicked the button!', 'success');
});

$("#swal-3").click(function () {
  swal('Good Job', 'You clicked the button!', 'warning');
});

$("#swal-4").click(function () {
  swal('Good Job', 'You clicked the button!', 'info');
});

$("#swal-5").click(function () {
  swal('Good Job', 'You clicked the button!', 'error');
});

$(".swal-6").click(function () {
  swal({
    title: 'Are you sure?',
    text: 'Once deleted, you will not be able to recover this imaginary file!',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './editproduct/delete',
          success: function(response){
            swal('Done! Product Successfully deleted!', {
              icon: 'success',
            });
         setTimeout(function(){ location.reload(); }, 1500);
          }
        });
      } 
      else {
        swal('No problem Product is safe!');
      }
    //e.preventDefault();
    });
});

$(".disable-prod").click(function () {
  debugger;
  swal({
    title: 'Are you sure?',
    text: 'Do you want to disable the product!',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './editproduct/disableprod',
          success: function(response){
            swal('Done! Product Successfully disabled!', {
              icon: 'success',
            });
          setTimeout(function(){ location.reload(); }, 1500);
          }
        });
      } 
      else {
        swal('No problem Product is safe!');
      }
    // window.location.href = window.location.href;
    // window.location.reload(true);
    // e.preventDefault();
    });
});


$(".enable").click(function () {
  swal({
    title: 'Are you sure?',
    text: 'Do you want to enable the product!',
    icon: 'success',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './editproduct/enableprod',
          success: function(response){
            swal('Done! Product Successfully enabled!', {
              icon: 'success',
            });
          setTimeout(function(){ location.reload(); }, 1500);
          }
        });
      } 
      else {
        swal('No problem Product is safe!');
      } 
    //   window.location.reload(true);
    // e.preventDefault();
    });
});



$("#swal-7").click(function () {
  swal({
    title: 'What is your name?',
    content: {
      element: 'input',
      attributes: {
        placeholder: 'Type your name',
        type: 'text',
      },
    },
  }).then((data) => {
    swal('Hello, ' + data + '!');
  });
});

$("#swal-8").click(function () {
  swal('This modal will disappear soon!', {
    buttons: false,
    timer: 3000,
  });
});

$(".swal-9").click(function () {
  swal({
    title: 'Are you sure?',
    text: 'Once deleted, you will not be able to recover this imaginary file!',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './editcategory/delete',
          success: function(response){
            swal('Done! Category Successfully deleted!', {
              icon: 'success',
            });
          setTimeout(function(){ location.reload(); }, 1500);
          }
        });
      } 
      else {
        swal('No problem Category is safe!');
      } 
    //e.preventDefault();
    });
});


$(".disablecat").click(function () {
  swal({
    title: 'Are you sure?',
    text: 'Do you like to disable!',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './editcategory/disablecat',
          success: function(response){
            swal('Done! Category Successfully Disabled!', {
              icon: 'success',
            });
          setTimeout(function(){ location.reload(); }, 1000);
          }
        });
      } 
      else {
        swal('No problem Category is safe!');
      }
    //   window.location.reload(true);
    // e.preventDefault();
    });
});

$(".enablecat").click(function () {
  swal({
    title: 'Are you sure?',
    text: 'Do you want to enable category!',
    icon: 'success',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './editcategory/enablecat',
          success: function(response){
            swal('Done! Category Successfully Enabled!', {
              icon: 'success',
            });
          setTimeout(function(){ location.reload(); }, 1500); 
        }
        });
      } 
      else {
        swal('No problem Category is safe!');
      }
      
      // window.location.reload(true);
      // e.preventDefault();
    });
});


$(".swal-10").click(function () {
  swal({
    title: 'Are you sure?',
    text: 'User will not able to login after this',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './userlist/change_status',
          success: function(response){
            swal('Done! User Successfully Inactivated!', {
              icon: 'success',
            });
          setTimeout(function(){ location.reload(); }, 1500);}
        });
      } 
      else {
        swal('No problem User is safe!');
      }
      //setTimeout(function(){ location.reload(); }, 3000); 
      // window.location.reload(true);
      // e.preventDefault();
    });
});

$(".swal-11").click(function () {
  swal({
    title: 'Are you sure?',
    text: 'User Able To Login After This',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var productId = {};
        productId['id'] = $(this).attr('dataSet');
        $.ajax({
          data: productId,
          type: 'POST',
          url: './userlist/change_status_active',
          success: function(response){
            swal('Done! User Successfully Activated!', {
              icon: 'success',
            });
         setTimeout(function(){ location.reload(); }, 1500);}
        });
      } 
      else {
        swal('No problem User is safe!');
      }
      // setTimeout(function(){ location.reload(); }, 3000); 
      // window.location.reload(true);
      // e.preventDefault();
    });
});
function checkValidation(percentage, amount){
  if(percentage.length > 0){
    if(percentage < 100 && percentage > 0){
      return true;
    }
    else{
      return 'Percentage Should Be Greater than 0 & less than 100';
    }
  }
  if(amount.length > 0){
    if(amount > 0){
      return true;
    }
    else{
      return 'Amount should be Greater than 0';
    }
  }
}
$('.ordSubmit').click(function(){
  var statusDetails = {};
  statusDetails['order_id'] = $(this).attr('orderId');
  statusDetails['date'] = $('#date_'+statusDetails['order_id']).val();
  statusDetails['status'] = $('#status_'+statusDetails['order_id']).val();
  $.ajax({
          data: statusDetails,
          type: 'POST',
          url: '../change_status',
          success: function(response){
            // swal('Done! User Successfully Updated!', {
            //   icon: 'success',
            // });
          setTimeout(function(){ location.reload(); }, 1500);}
        });
});

$('#changeAll').click(function(){
  var statusDetails = {};
  statusDetails['order_id'] = $('#order_id').val();
  statusDetails['status'] = $('#orderStatus').val();
  statusDetails['date'] = $('#deliveryDate').val();
  $.ajax({
          data: statusDetails,
          type: 'POST',
          url: '../change_whole_status',
          success: function(response){
            // swal('Done! User Successfully Updated!', {
            //   icon: 'success',
            // });
          setTimeout(function(){ location.reload(); }, 1500);}
        });
});
$('#newStatus').click(function(){
  if($('#statusName').val().length > 0){
    $.ajax({
          type: 'GET',
          url: './get_all_status',
          success: function(response){
            var statusNameArray=[];
            var allStatus = JSON.parse(response);
            for (var key in allStatus) {
              statusNameArray.push(allStatus[key]['status_name']);
            }
            if(statusNameArray.includes($('#statusName').val())){
              swal('This Status Name Already Available', {
                icon: 'error',
              });
            }
            else{
              var statusDetails = {};
              statusDetails['status_name'] = $('#statusName').val();
              $.ajax({
                data: statusDetails,
                type: 'POST',
                url: './create_new_status',
                success: function(response){
                setTimeout(function(){ location.reload(); }, 1500);}
              });
            }
          }
    });
  }
  else{
    swal('Enter valid name!', {
              icon: 'error',
            });
  }
});

$('#newCommission').click(function(){
  if($('#commissionPercent').val().length > 0 && $('#commissionAmount').val().length > 0){
    swal('Please Select Either Amount OR Percentage!', {
              icon: 'error',
            });
  }
  else if($('#commissionName').val().length > 0){
    var validation = checkValidation($('#commissionPercent').val(), $('#commissionAmount').val());
    debugger;
    if(validation == true){
      $.ajax({
          type: 'GET',
          url: './get_all_commission',
          success: function(response){
            var statusNameArray=[];
            var allStatus = JSON.parse(response);
            for (var key in allStatus) {
              statusNameArray.push(allStatus[key]['com_name']);
            }
            if(statusNameArray.includes($('#commissionName').val())){
              swal('This Commission Name Already Available', {
                icon: 'error',
              });
            }
            else{
              var commissionDetails = {};
              commissionDetails['com_name'] = $('#commissionName').val();
              commissionDetails['com_percent'] = $('#commissionPercent').val();
              commissionDetails['com_amount'] = $('#commissionAmount').val();
              $.ajax({
                data: commissionDetails,
                type: 'POST',
                url: './create_new_commission',
                success: function(response){
                setTimeout(function(){ location.reload(); }, 100);}
              });
            }
          }
      });
    }
    else{
      swal( validation, {
              icon: 'error',
            });
    }
  }
  else{
    swal('Enter valid Commission name!', {
              icon: 'error',
            });
  }
});

$('.statusUpdateButton').click(function(){
  $('#updateStatusName').val($(this).attr('statusValue'));
  $('#updateStatusId').val($(this).attr('statusId'));
});

$('.commissionUpdateButton').click(function(){
  $('#updateCommissionName').val($(this).attr('commissionValue'));
  $('#updateCommissionId').val($(this).attr('commissionId'));
  if($(this).attr('comAmount') == 0){
    $('#updateCommissionAmount').val('');
  }
  if($(this).attr('comAmount') > 0){
    $('#updateCommissionAmount').val($(this).attr('comAmount'));
  }
  if($(this).attr('comPercent') == 0){
    $('#updateCommissionPercent').val('');
  }
  if($(this).attr('comPercent') > 0){
    $('#updateCommissionPercent').val($(this).attr('comPercent'));
  }
});

$('#updateStatus').click(function(){
  if($('#updateStatusName').val().length > 0){
    $.ajax({
          type: 'GET',
          url: './get_all_status',
          success: function(response){
            var statusNameArray=[];
            var allStatus = JSON.parse(response);
            for (var key in allStatus) {
              statusNameArray.push(allStatus[key]['status_name']);
            }
            if(statusNameArray.includes($('#updateStatusName').val())){
              swal('This Status Name Already Available', {
                icon: 'error',
              });
            }
            else{
              var statusDetails = {};
              statusDetails['status_name'] = $('#updateStatusName').val();
              statusDetails['ors_id'] = $('#updateStatusId').val();
              $.ajax({
                data: statusDetails,
                type: 'POST',
                url: './update_status',
                success: function(response){
                  setTimeout(function(){ location.reload(); }, 100);}
                });
            }
          }
    });
  }
});

$('#updateCommission').click(function(){
  if($('#updateCommissionPercent').val().length > 0 && $('#updateCommissionAmount').val().length > 0){
    swal('Please Select Either Amount OR Percentage!', {
              icon: 'error',
            });
  }
  else if($('#updateCommissionName').val().length > 0){
    var validation = checkValidation($('#updateCommissionPercent').val(), $('#updateCommissionAmount').val());
    debugger;
    if(validation == true){
      $.ajax({
          type: 'GET',
          url: './get_all_commission',
          success: function(response){
            var statusNameArray=[];
            var allStatus = JSON.parse(response);
            for (var key in allStatus) {
              if(allStatus[key]['com_id'] != $('#updateCommissionId').val()){
                statusNameArray.push(allStatus[key]['com_name']);
              }
            }
            if(statusNameArray.includes($('#updateCommissionName').val())){
              swal('This Commission Name Already Available', {
                icon: 'error',
              });
            }
            else{
              var commissionDetails = {};
              commissionDetails['com_name'] = $('#updateCommissionName').val();
              commissionDetails['com_percent'] = $('#updateCommissionPercent').val();
              commissionDetails['com_amount'] = $('#updateCommissionAmount').val();
              commissionDetails['com_id'] = $('#updateCommissionId').val();
              $.ajax({
                data: commissionDetails,
                type: 'POST',
                url: './update_commission',
                success: function(response){
                setTimeout(function(){ location.reload(); }, 100);}
              });
            }
          }
      });
    }
    else{
      swal( validation, {
              icon: 'error',
            });
    }
  }
  else{
    swal('Enter valid Commission name!', {
              icon: 'error',
            });
  }
});
