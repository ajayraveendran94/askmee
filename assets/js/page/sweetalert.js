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