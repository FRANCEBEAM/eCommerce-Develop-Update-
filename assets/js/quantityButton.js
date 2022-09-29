$(document).ready(function (){

  $('.incrementBtn').click(function(e){
    e.preventDefault()

    var inputQty = $(this).closest('.product_data').find('.itemQty').val();
    
    var value = parseInt(inputQty, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 10){
      value++;
   
      $(this).closest('.product_data').find('.itemQty').val(value);
    }
  })

  $('.decrementBtn').click(function(e){
    e.preventDefault()

    var inputQty = $(this).closest('.product_data').find('.itemQty').val();
    
    var value = parseInt(inputQty, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 0){
      value--;
   
      $(this).closest('.product_data').find('.itemQty').val(value);
    }
  })



  $(document).on('click', '.updateQty', function(){
    
    var inputQty = $(this).closest('.product_data').find('.itemQty').val();
    var productId = $(this).value();

    alert(qty);


  })




});