// function readURL(input, imgControlName) {
//     if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       reader.onload = function(e) {
//         $(imgControlName).attr('src', e.target.result);
//       }
//       reader.readAsDataURL(input.files[0]);
//     }
//   }
  
//   $("#imag1").change(function() {
//     // add your logic to decide which image control you'll use
//     var imgControlName = "#ImgPreview1";
//     readURL(this, imgControlName);
//     $('.preview1').addClass('it');
//     $('.btn-rmv1').addClass('rmv');
//   });
//   $("#imag2").change(function() {
//     // add your logic to decide which image control you'll use
//     var imgControlName = "#ImgPreview2";
//     readURL(this, imgControlName);
//     $('.preview2').addClass('it');
//     $('.btn-rmv2').addClass('rmv');
//   });
//   $("#imag3").change(function() {
//     // add your logic to decide which image control you'll use
//     var imgControlName = "#ImgPreview3";
//     readURL(this, imgControlName);
//     $('.preview3').addClass('it');
//     $('.btn-rmv3').addClass('rmv');
//   });
//   $("#imag4").change(function() {
//     // add your logic to decide which image control you'll use
//     var imgControlName = "#ImgPreview4";
//     readURL(this, imgControlName);
//     $('.preview4').addClass('it');
//     $('.btn-rmv4').addClass('rmv');
//   });
// //   $("#imag5").change(function() {
// //     // add your logic to decide which image control you'll use
// //     var imgControlName = "#ImgPreview5";
// //     readURL(this, imgControlName);
// //     $('.preview5').addClass('it');
// //     $('.btn-rmv5').addClass('rmv');
// //   });
  
//   $("#removeImage1").click(function(e) {
//     var productImage = {};
//     productImage['img'] = $("#ImgPreview1").attr('src').split('/').pop();
//     productImage['id'] = parseInt($("#ImgPreview1").attr('src').split('/').slice(-2, -1)[0]);
//     $.ajax({
//       data: productImage, 
//       type: 'POST',
//       url: '../delete_image',
//       success: function(response){
//         //debugger;
//         e.preventDefault();
//         $("#imag1").prop("disabled", false);
//         $("#imag1").parent().children('.custom-file-label').text("Choose image");
//         $("#imag1").val("");
//         $("#ImgPreview1").attr("src", "");
//         $('.preview1').removeClass('it');
//         $('.btn-rmv1').removeClass('rmv');
//       }
//     });
//   });
//   $("#removeImage2").click(function(e) {
//     var productImage = {};
//     productImage['img'] = $("#ImgPreview2").attr('src').split('/').pop();
//     productImage['id'] = parseInt($("#ImgPreview2").attr('src').split('/').slice(-2, -1)[0]);
//     $.ajax({
//       data: productImage, 
//       type: 'POST',
//       url: '../delete_image',
//       success: function(response){
//         e.preventDefault();
//         $("#imag2").prop("disabled", false);
//         $("#imag2").parent().children('.custom-file-label').text("Choose image");
//         $("#imag2").val("");
//         $("#ImgPreview2").attr("src", "");
//         $('.preview2').removeClass('it');
//         $('.btn-rmv2').removeClass('rmv');
//       }
//     });
//   });
//   $("#removeImage3").click(function(e) {
//     var productImage = {};
//     productImage['img'] = $("#ImgPreview3").attr('src').split('/').pop();
//     productImage['id'] = parseInt($("#ImgPreview3").attr('src').split('/').slice(-2, -1)[0]);
//     $.ajax({
//       data: productImage, 
//       type: 'POST',
//       url: '../delete_image',
//       success: function(response){
//         e.preventDefault();
//         $("#imag3").prop("disabled", false);
//         $("#imag3").parent().children('.custom-file-label').text("Choose image");
//         $("#imag3").val("");
//         $("#ImgPreview3").attr("src", "");
//         $('.preview3').removeClass('it');
//         $('.btn-rmv3').removeClass('rmv');
//       }
//     });
//   });
//   $("#removeImage4").click(function(e) {
//     var productImage = {};
//     productImage['img'] = $("#ImgPreview4").attr('src').split('/').pop();
//     productImage['id'] = parseInt($("#ImgPreview4").attr('src').split('/').slice(-2, -1)[0]);
//     $.ajax({
//       data: productImage, 
//       type: 'POST',
//       url: '../delete_image',
//       success: function(response){
//         e.preventDefault();
//         $("#imag4").prop("disabled", false);
//         $("#imag4").parent().children('.custom-file-label').text("Choose image");
//         $("#imag4").val("");
//         $("#ImgPreview4").attr("src", "");
//         $('.preview4').removeClass('it');
//         $('.btn-rmv4').removeClass('rmv');
//       }
//     });
//   });
//   $("#removeImage5").click(function(e) {
//     e.preventDefault();
//     $("#imag5").val("");
//     $("#ImgPreview5").attr("src", "");
//     $('.preview5').removeClass('it');
//     $('.btn-rmv5').removeClass('rmv');
//   });


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