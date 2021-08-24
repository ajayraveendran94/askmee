$("#addToCart").click(function(e) {
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

$('.addToCartBtn').click(function(){
  if(typeof $("#user_id").val() == "undefined"){
    alert("Please Login First");
  }
  else{
    var cartData = {};
    cartData['product_id'] = $(this).attr('productId');
    cartData['user_id'] = $("#user_id").val();
    cartData['quantity'] = 1;
    $.ajax({
        data: cartData, 
        type: 'POST',
        url: 'cart/add_to_cart',
        success: function(response){
          debugger;
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