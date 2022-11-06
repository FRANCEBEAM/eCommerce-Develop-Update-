
$(document).ready(function() {

// Send product details in the server
$(".addItemBtn").click(function(e) {
  e.preventDefault();
  var $form = $(this).closest(".form-submit");
  var id = $form.find(".id").val();
  var product = $form.find(".product").val();
  var price = $form.find(".price").val();
  var supplier = $form.find(".supplier").val();
  var image_file = $form.find(".image_file").val();
  var image_path = $form.find(".image_path").val();
  var serialnumber = $form.find(".serialnumber").val();

  var quantity = $form.find(".quantity").val();

  $.ajax({
    url: 'config/action.php',
    method: 'post',
    data: {
      id: id,
      product: product,
      supplier: supplier,
      price: price,
      quantity: quantity,
      image_file: image_file,
      image_path: image_path,
      serialnumber: serialnumber
    },
    success: function(response) {
      $("#message").html(response);
      // window.scrollTo(0, 0);
      load_cart_item_number();
    }
  });
});

// Load total no.of items added in the cart and display in the navbar
load_cart_item_number();

function load_cart_item_number() {
  $.ajax({
    url: '/pages/customer/config/action.php',
    method: 'get',
    data: {
      cartItem: "cart_item"
    },
    success: function(response) {
      $("#cart-item").html(response);
    }
  });
}


  $(".btnRemove").on('click', function(e) {
      e.preventDefault();

      const href = $(this).attr('href')

      Swal.fire({
      title: 'Remove from the cart?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Remove'
    }).then((result) => {
      if (result.value) {
          document.location.href = href;
      }
    })
  });

      // Sending Form data to the server
      $("#placeOrder").submit(function(e) {
        e.preventDefault(); 
  
        $.ajax({
          url: '/pages/customer/config/action.php',
          method: 'post',
          data: $('form').serialize() + "&action=order",
          success: function(response) {
            $("#order").html(response);
            window.scrollTo(0, 0);
            load_cart_item_number();
          }
        });
      });

      $('#modalOrder').on('hidden.bs.modal', function () {
        location.reload();
       })
  
});


// function updcart(id){
// $.ajax({
//   url:'/pages/customer/updqty.php',
//   type:'POST',
//   data:$("#frm"+id).serialize(),
//   success:function(res){
//     location.reload(true);
//     // $("#cartcart").html(res);
//   }
// });
// }


//BUTTON QUANTITY
$(document).ready(function (){

  $('.incrementBtn').click(function(e){
    e.preventDefault()

    var inputQty = $(this).closest('.product_data').find('.itemQty').val();
    var maxQty = $(this).closest('.product_data').find('.prodQty').val();
    
    
    var value = parseInt(inputQty);
    var maxVal = parseInt(maxQty);
    // var maxVal = parseInt(maxQty);

    value = isNaN(value) ? 0 : value;

    if(value < maxVal){
      value++;
      $(this).closest('.product_data').find('.itemQty').val(value);
    }
  })


  $('.decrementBtn').click(function(e){
    e.preventDefault()

    var inputQty = $(this).closest('.product_data').find('.itemQty').val();
    
    var value = parseInt(inputQty, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1){
      value--;
   
      $(this).closest('.product_data').find('.itemQty').val(value);
    }
  })

  

  $(document).on('click', '.updateQty', function(){
    var inputQty = $(this).closest('.product_data').find('.itemQty').val();
    // var id = $(this).val();

    var id = $(this).closest('.product_data').find('.cart_id').val();

    $.ajax({
      method: "POST",
      url: '/pages/customer/updqty.php',
      data: {
        id: id,
        quantity: inputQty,
        scope: "update",
      },
      success: function(response){
          // alert(response);
          location.reload(true);
          $("#message").html(response);
      }
    })


  })

});

