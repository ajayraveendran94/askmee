$(document).ready(function(){
$('.modal-backdrop').remove();
$('.search-panel .dropdown-menu').find('a').click(function (e) {
      e.preventDefault();
      var param = $(this).attr("href").replace("#", "");
      var concept = $(this).text();
      $('.search-panel span#search_concept').text(concept);
      $('.input-group #search_param').val(param);
});
function getProducts($search){
  var searchData = {};
  searchData['category_id'] = $('#catSelect').val();
  debugger;
  $.ajax({
        data: searchData, 
        type: 'POST',
        url: $('#baseUrl').val()+'product/get_product',
        success: function(response){
          debugger;
          // var myArray = [];
          // $.each($.parseJSON(response), function (index, order) {
          //   myArray.push([order.product_name]);
          // });
          console.log($.parseJSON(response)[0].product_name);
          $return = [];
            strInArray($search, $.parseJSON(response));
        }
      });
}
  
function strInArray(str, strArray) {
  for (var j=0; j<strArray.length; j++) {
    if ((strArray[j].product_name).match(new RegExp(str, "i")) && $return.length < 5) {
      var $h = (strArray[j].product_name).replace(str, '<strong>'+str+'</strong>');
      $return.push('<a href="'+$('#baseUrl').val()+"product/view_product/"+strArray[j].id+'"><li class="prediction-item"><span class="prediction-text">' + $h + '</span></li></a>');
    }
  }
}
  
function nextItem(kp) {
  if ( $('.focus').length > 0 ) {
    var $next = $('.focus').next(),
        $prev = $('.focus').prev();
  }
  
  if ( kp == 38 ) { // Up
  
    if ( $('.focus').is(':first-child') ) {
      $prev = $('.prediction-item:last-child');
    }
    
    $('.prediction-item').removeClass('focus');
    $prev.addClass('focus');
    
  } else if ( kp == 40 ) { // Down
  
    if ( $('.focus').is(':last-child') ) {
      $next = $('.prediction-item:first-child');
    }
    
    $('.prediction-item').removeClass('focus');
    $next.addClass('focus');
  }
}

$(function(){  
  $('#search-box').keydown(function(e){
    $key = e.keyCode;
    if ( $key == 38 || $key == 40 ) {
      nextItem($key);
      return;
    }
    
    setTimeout(function() {
      var $search = $('#search-box').val();
      getProducts($search);
      if ( $search == '' || ! $('input').val ) {
        $('.output').html('').slideUp();
      } else {
        $('.output').html($return).slideDown();
      }
  
      $('.prediction-item').on('click', function(){
        $text = $(this).find('span').text();
        $('.output').slideUp(function(){
          $(this).html('');
        });
        $('#search-box').val($text);
      });
      
      $('.prediction-item:first-child').addClass('focus');
      
    }, 50);
  });
});
  
  $('#search-box').focus(function(){
    if ( $('.prediction-item').length > 0 ) {
      $('.output').slideDown();
    }
    
    $('#searchform').submit(function(e){
      e.preventDefault();
      $text = $('.focus').find('span').text();
      $('.output').slideUp();
      $('#search-box').val($text);
      $('input').blur();
    });
  });
  
  $('#search-box').blur(function(){
    if ( $('.prediction-item').length > 0 ) {
      $('.output').slideUp();
    }
  });
  
});