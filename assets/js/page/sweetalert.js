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
          }
        });
      } 
      else {
        swal('No problem Product is safe!');
      }
      
    window.location.href = window.location.href;
    //e.preventDefault();
    });
});

$(".disable-prod").click(function () {
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
          }
        });
      } 
      else {
        swal('No problem Product is safe!');
      }
      setTimeout(function(){ location.reload(); }, 3000); 
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
          }
        });
      } 
      else {
        swal('No problem Product is safe!');
      }
      setTimeout(function(){ location.reload(); }, 3000); 
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
          }
        });
      } 
      else {
        swal('No problem Category is safe!');
      }
      setTimeout(function(){ location.reload(); }, 3000); 
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
          }
        });
      } 
      else {
        swal('No problem Category is safe!');
      }
      setTimeout(function(){ location.reload(); }, 3000); 
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
          }
        });
      } 
      else {
        swal('No problem Category is safe!');
      }
      setTimeout(function(){ location.reload(); }, 3000); 
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