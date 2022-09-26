$(document).ready(function(){

  //Search product .searchInput
  load_data();
    function load_data(query)
    {
      $.ajax({
        url:"../pages/customer/indexsearch.php",
        method:"post",
        data:{query:query},
        success:function(data)
        {
          $('#item-list').html(data);
        }
      });
    }
    
    $('.searchInput').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
        load_data(search);
      }
      else
      {
        load_data(search);
      }
    });
  });