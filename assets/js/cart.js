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
$(".cartQuantity").on('input',function(e) { 
  debugger;
});