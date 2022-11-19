$(document).ready(function(){

    load_data(1);
  
    function load_data(page, query = '')
    {
      $.ajax({
        url:"config/shopPage.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#pagination-container').html(data);
        }
      });
    }
  
  
    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('.searchInput').val();
      load_data(page, query);
    });
  
    $('.searchInput').keyup(function(){
      var query = $('.searchInput').val();
      load_data(1, query);
    });
  
  
  });