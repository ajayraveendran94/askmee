var totalAmount = 0;
var singlePrice = 0;
$("#selectProduct").click(function () {
	var product = {};
	product['id'] = $("#productName").val();
	$.ajax({
      data: product, 
      type: 'POST',
      url: '../admin/order/get_product_data',
      success: function(response){
      	var placedProductData = JSON.parse(response)["product"][0];
      	if($('#'+ placedProductData['p_id']).length == 0){
      		var productData = `<div class="form-row" id="`+placedProductData['p_id']+`" > <div class="form-group col-md-4"> <label>Product Name</label> 
      				 <input type="hidden" class="form-control" name="order_product_id[]" value="`+placedProductData['p_id']+`">
  					 <input type="text" class="form-control" name="order_product_name[]" value="`+placedProductData['product_name']+`" readonly> </div> 
  					 <div class="form-group col-md-2"> <label>Vendor Name</label> 
  					 <input type="text" class="form-control" name="vendor[]" value="`+placedProductData['name']+`" readonly>
  					 <input type="hidden" class="form-control" name="vendor_id[]" value="`+placedProductData['user_id']+`" readonly> </div> 
					 <div class="form-group col-md-2"> <label>Price</label> 
					 <input type="number" class="form-control" name="offer_price[]" value="`+parseFloat(placedProductData['offer_price'])+`" readonly> </div> 
					 <div class="form-group col-md-2"> <label>Select Quantity</label> 
					 <input type="number" class="form-control orderQuantity" name="quantity[]" id="q_`+placedProductData['p_id']+`" value=1 readonly> </div>
					 <div class="form-group col-md-2"> <label>Total</label> 
					 <input type="number" class="form-control totalPrice" id="totalPrice_`+placedProductData['p_id']+`" name="total_price[]" value=`+placedProductData['offer_price']+`> </div> </div>`;
    	   $("#addedProduct").append(productData);
    	   singlePrice = parseFloat(placedProductData['offer_price']);
       }
       else{
       	var singlePrice = parseFloat(placedProductData['offer_price']);
       	var quantity = $('#'+placedProductData['p_id']+' .orderQuantity').val();
       	$('#'+placedProductData['p_id']+' .orderQuantity').val(parseInt(quantity)+1);
       	price = singlePrice * $('#'+placedProductData['p_id']+' .orderQuantity').val();
       	$('#'+placedProductData['p_id']+' .totalPrice').val(parseFloat(price));
       }
       totalAmount = totalAmount + parseFloat(singlePrice);
       $('#totalAmount').val(parseFloat(totalAmount));
       $('.card-footer').removeClass('d-none');
       $('#addedAddress').removeClass('d-none');
      }
    });
});

// $( document ).ready(function() {
// 	$("body").on('change', '.orderQuantity', function(){
//       		debugger;
//     });
// });

$("#productSubmit").click(function () {

});
