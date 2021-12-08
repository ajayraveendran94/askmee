$(".addToCartBtn").click(function(e) {
  var cartData = {};
  cartData['product_id'] = $("#product_id").val();
  cartData['user_id'] = $("#user_id").val();
  cartData['quantity'] = $("#quantity").val();
  if(cartData['user_id'] > 0){
    if(cartData['quantity'] > 0){
      $.ajax({
        data: cartData, 
        type: 'POST',
        url: '../../cart/add_to_cart',
        success: function(response){
          if(response == "1"){ 
            $("#goToCart").removeClass('d-none');
            $("#addToCart").addClass('d-none');
            $("#buyNow").addClass('d-none');
          }
          else{
            alert("Maximum Quantity Available is "+ response);
          }
        }
      });
    }
    else{
      alert("Quantity Should Select");
    }
  }
  else{
    alert("Please Login or Signup First");
  }
});

$('.addToCartBtnNew').click(function(){
  if(typeof $("#user_id").val() == "undefined"){
    alert("Please Login First");
  }
  else{
    var cartData = {};
    cartData['product_id'] = $(this).attr('productId');
    debugger;
    cartData['user_id'] = $("#user_id").val();
    cartData['quantity'] = 1;
    $.ajax({
        data: cartData, 
        type: 'POST',
        url: $('#baseUrl').val()+'cart/add_to_cart',
        success: function(response){
          $("#addToCart_"+cartData['product_id']).addClass('d-none');
          $("#goToCart_"+cartData['product_id']).removeClass('d-none');
        }
    });
  }
});

$(".removeCart").click(function() { 
  var cartData = {};
  cartData['cart_id'] = $(this).attr('Id');
  $.ajax({
        data: cartData, 
        type: 'POST',
        url: 'cart/delete_cart',
        success: function(response){
          location.reload();
        }
      });
});

$(".cartQuantity").on('change',function(e) { 
  var cartData = {};
  var productId = $(this).attr('Id');
  cartData['product_id'] = productId;
  cartData['user_id'] = $('#userId').val();
  cartData['quantity'] = $('#'+productId).val();
  if(cartData['user_id'] > 0){
    if(cartData['quantity'] <= 0){
      cartData['quantity'] = 1;
    }
    $.ajax({
        data: cartData, 
        type: 'POST',
        url: 'cart/add_to_cart',
        success: function(response){
          if(response == "1"){ 
             location.reload();
          }
          else{
            alert("Maximum Quantity Available is "+ response);
            location.reload();
          }
        }
      });
  }
  else{
    alert("Please Login or Signup First");
  }
});

$("#clearCart").click(function() { 
  var cartData = {};
  cartData['user_id'] = $(this).attr('dataTarget');
  $.ajax({
        data: cartData, 
        type: 'POST',
        url: 'cart/delete_user_cart',
        success: function(response){
          location.reload();
        }
      });
});

$(".buyQuantity").on('change',function(e) { 
  var cartData = {};
  var productId = $(this).attr('Id');
  var quantity = $('#'+productId).val();
  var user_id = $('#userId').val();
  var productPrice = $("#actualPrice").val();

  if(user_id > 0){
    if(quantity <= 0){
      quantity = 1;
      $('#'+productId).val('1');
    }
    var totalAmount = productPrice * quantity;
    $('#totalAmount').html('₹ '+totalAmount);
  }
  else{
    alert("Please Login or Signup First");
  }
});

$('#checkout_1').click(function() {
  var cartData = {};
  cartData['product_id'] = $("#productId").val();
  cartData['user_id'] = $("#userId").val();
  cartData['quantity'] = $("#quantity").val();
  if(cartData['user_id'] > 0){
    if(cartData['quantity'] > 0){
      $.ajax({
        data: cartData, 
        type: 'POST',
        url: '../../buynow/checkout_now',
        success: function(response){
          if(response == "1"){ 
            $(location).attr('href', '../../order/quick_order');
          }
          else{
            alert("Maximum Quantity Available is "+ response);
          }
        }
      });
    }
    else{
      alert("Quantity Should Select");
    }
  }
  else{
    alert("Please Login or Signup First");
  }
});

$('#toggle').click(function() {
  $('.circle-loader').toggleClass('load-complete');
  $('.checkmark').toggle();
});
setTimeout(function() {
  $('#toggle').trigger('click');
  var today=new Date(); //Today's Date
  var requiredDate = new Date(today.getFullYear(),today.getMonth(),today.getDate()+7)
  $('#orderPlaced').html("<b style='color: #ea8a27;'>Congratulations!! </b> <br>Your Order Placed Successfully <br> <b>Expected Delivery: "+requiredDate.toDateString()+"</b> <br>");
  $('#backHome').removeClass('checkmark');
}, 5000);