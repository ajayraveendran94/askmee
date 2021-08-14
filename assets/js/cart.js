$("#addToCart").click(function(e) {
  debugger;
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
          $("#goToCart").removeClass('d-none');
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

$("#cartQuantity").on('input',function(e) { 
  debugger;
});